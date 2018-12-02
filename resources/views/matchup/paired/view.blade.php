@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Puanlama</b>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- eğer takım puanları girilmişse hangi takımın kaç farkla yeniyor olduğunu basıyoruz --}}
                            @if (!empty($team_sums))
                                <div class="alert alert-danger text-center">
                                    <h2>
                                        @if ($team_sums[$matchup->teams{0}->id]->sum > $team_sums[$matchup->teams{1}->id]->sum)
                                            <strong>
                                                {{ $matchup->teams{1}->name }}
                                            </strong>
                                            takımı,
                                            <strong>
                                                {{ $team_sums[$matchup->teams{0}->id]->sum - $team_sums[$matchup->teams{1}->id]->sum}}
                                            </strong>
                                            farkla kazandı!
                                        @elseif ($team_sums[$matchup->teams{1}->id]->sum > $team_sums[$matchup->teams{0}->id]->sum)
                                            <strong>
                                                {{ $matchup->teams{0}->name }}
                                            </strong>
                                            takımı,
                                            <strong>
                                                {{ $team_sums[$matchup->teams{1}->id]->sum - $team_sums[$matchup->teams{0}->id]->sum}}
                                            </strong>
                                            farkla kazandı
                                        @else
                                            <strong>Maç Berabere!</strong>
                                        @endif
                                    </h2>
                                </div>
                            @endif
                            <form class="form-horizontal" method="post" action="/matchup/addPoint" id="addPoints">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="matchup_id" value="{{ $matchup->id }}">
                                    {{-- maç objesinin içindeki takım objelerini geziyoruz --}}
                                    @foreach ($matchup->teams as $team)
                                        <div class="col-md-6 team-div">
                                            @if ($loop->first)
                                                <div class="panel panel-info">
                                            @else
                                                <div class="panel panel-success">
                                            @endif
                                                <div class="panel-heading text-center">
                                                    <strong>{{ $team->name }}</strong>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        {{-- takım objesi içindeki üye objelerini geziyoruz --}}
                                                        @foreach ($team->members as $member)
                                                            <div class="col-md-6">
                                                                <div class="panel-group" id="member{{ $member->id }}" role="tablist">
                                                                    <div class="panel panel-warning text-center">
                                                                        <div class="panel-heading panel-heading-collapse" data-toggle="collapse" data-target="#collapse{{ $member->id }}">
                                                                            <h4 class="panel-title">
                                                                                <strong>{{ $member->name }}</strong>
                                                                                <br>
                                                                                @if (isset($ind_sums[$member->id]))
                                                                                    Puan Toplamı: {{ $ind_sums[$member->id] }}
                                                                                @endif
                                                                            </h4>
                                                                            <i class="fa fa-plus fa-lg accordion-icon"></i>
                                                                        </div>
                                                                        <div id="collapse{{ $member->id }}" class="panel-collapse collapse collapse-member">
                                                                            <div class="panel-body">
                                                                                {{-- üye objeleri içinde puan objelerini geziyoruz, girilmiş puanları bastırıyoruz --}}
                                                                                @forelse ($member->points as $point)
                                                                                    <div class="form-group">
                                                                                        <div class="input-group">
                                                                                            <input disabled class="form-control prev-point" type="text" value="{{ $point->point }}" placeholder="{{ $member->name }}" id="{{ $point->id }}">
                                                                                            <span class="input-group-addon save-point" style="display:none"><i class="fa fa-floppy-o"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                @empty
                                                                                    Puan Girişi Yapılmamış
                                                                                @endforelse
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- yeni eklenecek olan puan için input fieldı --}}

                                                                <div class="row" id="additionals{{ $member->id }}" style="display:none">
                                                                    <div class="form-group">
                                                                        <label class="col-md-12">Ceza Sayısı</label>
                                                                        <div class="col-md-12">
                                                                            <div class="input-group">
                                                                                {{-- ceza azaltma butonu --}}
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-danger change-penalty decrement" data-field="#penalty{{ $member->id }}" type="button">
                                                                                        <i class="fa fa-minus"></i>
                                                                                    </button>
                                                                                </span>

                                                                                {{-- ceza fieldı --}}
                                                                                <input class="form-control" id="penalty{{ $member->id }}" placeholder="Ceza Sayısı" value="0" type="number" name="point[{{ $member->id }}][penalty]">

                                                                                {{-- ceza arttırma butonu --}}
                                                                                <span class="input-group-btn">
                                                                                    <button class="btn btn-success change-penalty increment" data-field="#penalty{{ $member->id }}" type="button">
                                                                                        <i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                    <input value="1" type="checkbox" name="point[{{ $member->id }}][doubles]">Çifte Gidiyor
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center">
                                                    {{-- toplam takım puanları --}}
                                                    @if (!empty($team_sums))
                                                        <strong>Takım Toplam Puanı: {{ $team_sums[$team->id]->sum }}</strong>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- puan girişlerinde bir hata meydana geldiyse hataları gösterir --}}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript">
    </script>
    @if (App::isLocale('tr'))
        <script src="{{ asset('js/validate/messages_tr.js') }}"></script>
    @endif
    <script type="text/javascript" src="{{ asset('js/matchup/edit.js') }}"></script>
@endsection

@section('css')
    <style type="text/css" media="screen">
        @-webkit-keyframes error-shake {
            from {-webkit-transform:translateX(-5px)} to {-webkit-transform:translateX(5px)}
        }
        @-ms-keyframes error-shake {
            from {-ms-transform:translateX(-5px)} to {-ms-transform:translateX(5px)}
        }
        @-moz-keyframes error-shake {
            from {-moz-transform:translateX(-5px)} to {-moz-transform:translateX(5px)}
        }
        @-o-keyframes error-shake {
            from {-o-transform:translateX(-5px)} to {-o-transform:translateX(5px)}
        }
        @keyframes error-shake {
            from{transform:translateX(-5px)} to {transform:translateX(5px)}
        }

        .error {
            -webkit-animation: error-shake 50ms linear 10 alternate;
            -moz-animation: error-shake 50ms linear 10 alternate;
            -o-animation: error-shake 50ms linear 10 alternate;
            -ms-animation: error-shake 50ms linear 10 alternate;
            animation: error-shake 50ms linear 10 alternate;
        }
        .help-block {
            font-weight: bold;
        }
        /*.points {
            margin-bottom: 15px;
        }*/
        .form-group {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        .text-info {
            color: #31708f;
        }
        .edit-point,
        .save-point {
            cursor: pointer;
        }
        h2 {
            margin: 5px 0;
        }
        .panel-heading-collapse {
            cursor: pointer;
        }
        /*.team-div {
            border: 1px solid transparent;
            border-radius: 4px;
            border-color: black;
        }*/
        .additionals {
            margin-top: 10px;
        }
        .accordion-icon {
            position: absolute;
            right: 3px;
            top: 39%;
        }
        .panel-heading-collapse {
            position: relative;
        }
        .note {
            resize: vertical;
            min-height: 50px;
        }
    </style>
@endsection
