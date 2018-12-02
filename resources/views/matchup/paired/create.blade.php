@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" method="post"  id="createMatch" action="/matchup/store">
                {{ csrf_field() }}
                <input type="hidden" name="is_paired" value="1">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>1. Takım Bilgisi</b>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Takım Adı</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team1[name]" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="member1" class="col-md-3 control-label">1. Üye</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team1[member1]" value="{{ old('member1') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="member2" class="col-md-3 control-label">2. Üye</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team1[member2]" value="{{ old('member2') }}" required>
                                </div>
                            </div>

                            @if ($errors->has('team1.*'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('team1.*') as $error)
                                        <li>{!! $error[0] !!}</li>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <b>2. Takım Bilgisi</b>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Takım Adı</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team2[name]" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="member1" class="col-md-3 control-label">1. Üye</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team2[member1]" value="{{ old('member1') }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="member2" class="col-md-3 control-label">2. Üye</label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="team2[member2]" value="{{ old('member2') }}" required>
                                </div>
                            </div>

                            @if ($errors->has('team2.*'))
                                <div class="alert alert-danger">
                                    @foreach ($errors->get('team2.*') as $error)
                                        <li>{!! $error[0] !!}</li>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
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
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
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
