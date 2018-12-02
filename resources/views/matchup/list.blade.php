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
                            <div class = "  {{ $status !== 'Aktif' ? 'deletable-team' : ''}}">
                                <a class="btn btn-success btn-lg btn-block  {{ $status !== 'Aktif' ? 'view-big-button' : '' }}" href="/matchup/{{ $status == 'Aktif' ? 'edit' : 'view' }}/{{ $matchup->id }} ">
                                    <div class="row">
                                        <div class="col-md-{{ $status == 'Aktif' ? '5' : '3' }} {{ $status !== 'Aktif' ? 'team-name col-md-offset-2' : ''}}">
                                            {{ $matchup->teams{0}->name }}
                                        </div>
                                        <div class="col-md-2 {{ $status !== 'Aktif' ? 'versus' : ''}}">
                                            VS
                                        </div>
                                        <div class="col-md-{{ $status == 'Aktif' ? '5' : '3' }} {{ $status !== 'Aktif' ? 'team-name' : ''}}">
                                            {{ $matchup->teams{1}->name }}
                                        </div>
                                    </div>
                                </a>
                                @if($status !== "Aktif")
                                    <div class="pull-right delete">
                                        <a role="button" href = "/matchup/deleteMatch/{{ $matchup->id }}" class="pull-right btn btn-danger delete-match">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                            SİL
                                        </a>
                                    </div>
                                @endif
                            </div>
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
 --}}
@section('javascript')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script>
        $(".delete-match").confirm({
            title:"Maçı silmek istediğinizden emin misiniz?",
            content:"Silinen maçlar geri alınamaz!",
            buttons:{
                formSubmit: {
                    text: 'SİL',
                    content:'',
                    btnClass: 'btn-danger delete-confirm',
                    action: function() {
                        location.href = this.$target.attr('href');
                    }
                },
                cancel:  {
                    text:"Vazgeç"
                },
            }
        });

    </script>
@endsection
@section('css')
    <style type="text/css" media="screen">
        .alert {
            margin-top: 20px;
        }
        .team-name{
            margin-top : 6px;
        }
        .versus{
            top:7px;
        }
        .view-big-button {
            display:inline-block;
            width:82%;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }
        .delete-match {
            height:51px;
            width:76px;
            padding:14px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
        }
        .deletable-team{
            margin-bottom:5px;
        }
        .delete{
             width:72px;
        }
    </style>

@endsection
