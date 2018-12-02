@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Maçı Başlat!</b>
                </div>
                <div class="panel-body">
                    <button type="submit" class="btn btn-success btn-lg btn-block">
                        Maçı Başlat
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    @if (App::isLocale('tr'))
        <script src="{{ asset('js/validate/messages_tr.js') }}"></script>
    @endif
    <script src="{{ asset('js/matchup/create.js') }}"></script>
@endsection

@section('css')
    <style type="text/css" media="screen">
        .help-block {
            font-weight: bold;
        }
        .alert {
            margin-bottom: 0;
        }
    </style>
@endsection
