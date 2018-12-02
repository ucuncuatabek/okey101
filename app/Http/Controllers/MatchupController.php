<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Auth;
use App;
use DB;

class MatchupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPaired()
    {
        return view('matchup.paired.create');
    }

    public function createUnpaired()
    {
        return view('matchup.unpaired.create');
    }

    public function store(Request $request)
    {
        if ($request->is_paired === "1") {
            $this->validate($request, [
                'team1.*'    => 'required',
                'team2.*'    => 'required',
            ]);

            $matchup = App\Matchup::create([
                'user_id'   => Auth::user()->id,
                'is_paired' => 1,
            ]);

            foreach ($request->only('team1', 'team2') as $team){
                // ilk üye yaratıldı
                $member1_id = App\Member::create([
                    'name' => $team['member1']
                ])->id;

                // ikinci üye yaratıldı
                $member2_id = App\Member::create([
                    'name' => $team['member2']
                ])->id;

                // takım yaratıldı
                $team = App\Team::create([
                    'name' => $team['name'],
                ]);

                // takım ve üyeler bağlandı
                $team->members()->attach([$member1_id, $member2_id]);

                // maç ve takım bağlandı
                // $matchup->teams()->attach($team->id);
                $matchup->teams()->save($team);
            }

            return redirect('/matchup/edit/' . $matchup->id);
        }
    }

    protected function storePaired()
    {
    }

    protected function storeUnpaired()
    {
    }

    public function show($id)
    {

    }

    public function list($status)
    {
        if (!in_array($status, ['0', '1'])) {
            abort(404);
        }

        $matchups = \App\Matchup::with('teams')->where([
            ['is_over', $status],
            ['user_id', Auth::user()->id]
        ])->get();

        $status = $status ? 'Geçmiş' : 'Aktif';

        return view('matchup.list', compact('matchups', 'status'));
    }

    public function listComplete() {
        $complete_matchups = \App\Matchup::with('teams')->where([
            ['is_over', 1],
            ['user_id', Auth::user()->id]
        ])->get();

        $incomplete_matchups = null;

        return view('home', compact('complete_matchups', 'incomplete_matchups'));
    }

    public function view($id) {
        return view('matchup.paired.view', $this->getMatchupData($id, 1));
    }

    public function edit($id)
    {
        return view('matchup.paired.edit', $this->getMatchupData($id, 0));
    }

    private function getMatchupData($id, $status)
    {
        $matchup = App\Matchup::with([
            'teams.members.points' => function ($query) use ($id) {
                $query->where('matchup_id', $id);
            }
        ])
        ->where('user_id', Auth::user()->id)
        ->where('is_over', $status)
        ->findOrFail($id);
        // echo '<pre>';
        // // print_r($matchup);
        // // echo '</pre>';
        // // exit();

        $ind_sums = App\Point::where('matchup_id', $id)
        ->groupBy('member_id')
        ->selectRaw('sum(point) as sum, member_id')
        ->pluck('sum', 'member_id');

        $raw_team_sums = DB::table('points')
            ->where('points.matchup_id', $id)
            ->select('teams.id', DB::raw('SUM(points.point) as sum'))
            ->groupBy('teams.id')
            ->join('members', 'members.id', '=', 'points.member_id')
            ->join('member_team', 'member_team.member_id', '=', 'members.id')
            ->join('teams', 'teams.id', '=', 'member_team.team_id')
            ->get();

        // üstteki methodun düz query hali
        // ---------------------------------
        // $raw_sums = DB::select(
        //     'select sum(p.point) as sum, t.id
        //     from points p
        //     inner join members m
        //     on m.id = p.member_id
        //     inner join member_team mt
        //     on mt.member_id = m.id
        //     inner join teams t
        //     on mt.team_id = t.id
        //     where p.matchup_id = ?
        //     group by t.id', [$id]
        // );

        // takım puan toplamları array'ini takım id'si key olucak şekilde
        // tekrar formatladım
        foreach ($raw_team_sums as $id => $sum) {
            $team_sums[$sum->id] = $sum;
        }

        return compact('matchup', 'ind_sums', 'team_sums');
    }

    public function addPoint(Request $request)
    {
        // print_ra($request->all());
        // exit();
        $this->validate($request, [
            'point.*.point'   => 'required|numeric',
            'point.*.penalty' => 'required|numeric|min:0',
            'matchup_id'      => 'required|numeric',
        ]);

       /* echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        exit();*/
        $matchup = App\Matchup::where('is_over', 0)
        ->findOrFail($request->matchup_id);

        foreach ($request->point as $member_id => $fields) {
            $point = $fields['point'];

            // ceza sayisi * 100 ile topluyoruz puanı
            $point = $point + ($fields['penalty'] * 100);

            // Cifte gidiyorsa iki ile carp
            if (isset($fields['doubles']) && $fields['doubles'] == 1) {
                $point = $point * 2;
            }

            App\Point::create([
                'matchup_id' => $matchup->id,
                'member_id'  => $member_id,
                'point'      => $point,
                'note'       => $fields['note'],
                'round'      => $matchup->current_round,
            ]);
        }

        // maçın oynandığı round'ı güncelle
        $matchup->current_round = $matchup->current_round + 1;
        $matchup->save();

        return redirect('/matchup/edit/' . $request->matchup_id);
    }

    public function editPoint(Request $request)
    {
        $this->validate($request, [
            'id'    => 'required|numeric',
            'point' => 'required|numeric',
        ]);

        $point = App\Point::find($request->id);

        $point->point = $request->point;
        $point->save();

        return response()->json(array('success' => true));
    }
    public function endMatch($id) {
        $matchup = App\Matchup::where('is_over',0)
                ->findOrFail($id);

        $matchup->is_over = 1;
        $matchup->save();

        return redirect('/matchup/list/1');
    }
}
