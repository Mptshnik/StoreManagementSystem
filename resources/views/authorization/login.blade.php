<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>Авторизация</b></a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Вход в систему</p>
            @error('auth_error')<span class="text-danger">{{$message}}</span>@enderror
            <form action="{{route('authorize')}}" method="post">
                @csrf
                @method('post')
                @error('login')<span class="text-danger">{{$message}}</span>@enderror
                <div class="input-group mb-3">
                    <input type="text" name="login" class="form-control" placeholder="Введите логин">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-alt"></span>
                        </div>
                    </div>
                </div>
                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Введите пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">
                                Запомнить аккаунт
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
</body>
</html>
