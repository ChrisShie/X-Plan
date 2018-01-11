<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - {{ config('app.name', 'X-Plan') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/modified.css') }}">
</head>
<body class="bg-page" style="background-image: url('./images/home.jpg');">
    <div id="app"> 
        <main class="full-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 app-info">
                            <a href="/"><img src="./images/app_logo.png" alt="Logo"></a>
                            <h1><strong><i>Find out</i></strong> amazing destination<br>and<br><strong><i>Schedule</i></strong> your travelling plan to Indonesia</h1>
                    </div>
                    <div class="col-md-6">
                        <div id="register" class="bg-transwhite form">
                            <div class="header">
                                <h1>Register</h1>
                                <p>Already have account? <a href="login">Login here</a></p>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="radio col-md-6">
                                                <label>
                                                    <input type="radio" name="gender" id="male" value="male" required> Male
                                                </label>
                                            </div>
                                            <div class="radio  col-md-6">
                                                <label>
                                                    <input type="radio" name="gender" id="female" value="female" required> Female
                                                </label>
                                            </div>
                                            @if ($errors->has('gender'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div> 
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
                                    <label for="birthdate" class="col-md-4 control-label">Birth Date</label>

                                    <div class="col-md-6">
                                        <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}" required>

                                        @if ($errors->has('birthdate'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('birthdate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                    <label for="country" class="col-md-4 control-label">Country</label>

                                    <div class="col-md-6">
                                        <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-cyan">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
