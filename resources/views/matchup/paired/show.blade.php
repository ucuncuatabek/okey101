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

        #teamModal.error {
            -webkit-animation: error-shake 50ms linear 10 alternate;
            -moz-animation: error-shake 50ms linear 10 alternate;
            -o-animation: error-shake 50ms linear 10 alternate;
            -ms-animation: error-shake 50ms linear 10 alternate;
            animation: error-shake 50ms linear 10 alternate;
        }
        .help-block {
            font-weight: bold;
        }
        .alert {
            margin-bottom: 0;
        }
    </style>
@endsection
