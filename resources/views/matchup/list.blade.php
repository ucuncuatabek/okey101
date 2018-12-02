@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {{-- <a href="/matchup/createPaired" title="Maç Yarat"><button class="btn btn-lg">EŞLİ 101 PUANLAMA</button></a>
             --}}

            @if (count($matchups) > 0)
                <div class="alert alert-{{ $status == 'Aktif' ? 'danger' : 'success' }} text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ $status }} Maçlarınız Bulunuyor</h2>
                            <br>
                        </div>
                        <div class="col-md-offset-3 col-md-6">
                            @foreach ($matchups as $matchup)
                                <a class="btn btn-success btn-lg btn-block"
                                href="/matchup/{{ $status == 'Aktif' ? 'edit' : 'view' }}/{{ $matchup->id }}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            {{ $matchup->teams{0}->name }}
                                        </div>
                                        <div class="col-md-2">
                                            VS
                                        </div>
                                        <div class="col-md-5">
                                            {{ $matchup->teams{1}->name }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger text-center">
                    <h2>{{ $status }} Maçınız Bulunmuyor</h2>
                    <br>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

{{-- @section('javascript')
    @if (App::isLocale('tr'))
        <script src="{{ asset('js/validate/messages_tr.js') }}"></script>
    @endif
@endsection --}}

@section('css')
    <style type="text/css" media="screen">
        .alert {
            margin-top: 20px;
        }
    </style>
@endsection
