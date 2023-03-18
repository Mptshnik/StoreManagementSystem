@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Добавление пользователя</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6"><a href="{{route('users.index')}}" class="link-primary">Все
                                    пользователи</a></div>
                            <div class="col-lg-6">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" class="form-control" autocomplete="off" name="name"
                                           placeholder="Введите имя пользователя">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="login">Логин</label>
                                    <input type="text" class="form-control" autocomplete="off" name="login"
                                           placeholder="Введите логин пользователя">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" autocomplete=off" class="form-control" name="password"
                                           placeholder="Введите пароль пользователя">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Подтверждение пароля</label>
                                    <input type="password" autocomplete=off" class="form-control"
                                           name="password_confirmation"
                                           placeholder="Повторите пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                @if($roles->count() === 0)
                                    <div>
                                        Нет доступных ролей. <a href="{{route('roles.create')}}"
                                                                class="brand-link">Добавить роль</a>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label>Роли пользователя</label>
                                        <select class="select2" name="roles[]" multiple="multiple"
                                                data-placeholder="Выберите роль" style="width: 100%;">
                                            @foreach($roles as $role)
                                                <option value="{{$role->slug}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Уровни доступа</label>
                                    <select class="select2" name="permissions[]" multiple="multiple"
                                            data-placeholder="Выберите уровни доступа" style="width: 100%;">
                                        @php
                                            $data = \Illuminate\Support\Facades\Session::get('data') ?? [];
                                        @endphp
                                        @foreach($permissions as $permission)
                                            <option
                                                @if(isset($data['permissions']) && in_array($permission->slug, $data['permissions'])) selected
                                                @endif value="{{$permission->slug}}">{{$permission->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>

        </div>

    </section>
@endsection

