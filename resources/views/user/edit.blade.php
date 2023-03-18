@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Изменение пользователя "{{$user->login}}"</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post" action="{{route('users.update', $user)}}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6"><a href="{{route('users.index')}}" class="link-primary">Все
                                    пользователи</a></div>
                            <div class="col-lg-6">
                                <div class="float-right">
                                    <button type="submit" class="mr-1 btn btn-success btn-sm">
                                        Сохранить
                                    </button>
                                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal"
                                            data-target="#resetPassword">
                                        Сменить пароль
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
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name"
                                           placeholder="Введите имя пользователя">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="login">Логин</label>
                                    <input type="text" class="form-control" value="{{$user->login}}" name="login"
                                           placeholder="Введите логин пользователя">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Роли пользователя
                            </div>
                            <div class="card-body">
                                @if($roles->count() === 0)
                                    <div>
                                        Нет доступных ролей. <a href="{{route('roles.create')}}"
                                                                class="brand-link">Добавить роль</a>
                                    </div>
                                @else
                                    <table class="table-sm" id="table-paging1">
                                        <thead>
                                        <tr>
                                            <th style="width: 10%">ID</th>
                                            <th style="width: 30%">Роль</th>
                                            <th style="width: 30%">Подробнее</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>
                                                    {{$role->id}}
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input"
                                                               @if($user->hasRole($role->slug)) checked
                                                               @endif name="roles[]" type="checkbox"
                                                               value="{{$role->slug}}"
                                                               id="flexCheck{{$role->slug}}">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{$role->name}}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><a href="{{route('roles.show', $role)}}"
                                                       class="link-primary">{{$role->slug}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Уровни доступа
                            </div>
                            <div class="card-body">
                                <table class="table-sm" id="table-paging2">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">ID</th>
                                        <th style="width: 30%">Уровень доступа</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>
                                                {{$permission->id}}
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input"
                                                           @if($user->hasPermission($permission->slug)) checked
                                                           @endif name="permissions[]" type="checkbox"
                                                           value="{{$permission->slug}}"
                                                           id="flexCheck{{$permission->slug}}">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        {{$permission->name}}
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- Modal -->
            <div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Изменение пароля пользователя</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('users.reset-password', $user)}}">
                                @csrf
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="password">Новый пароль</label>
                                        <input type="password" class="form-control form-control-sm" name="password"
                                               placeholder="Введите пароль пользователя">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group">
                                        <label for="password_confirmation">Подтверждение пароля</label>
                                        <input type="password" class="form-control form-control-sm"
                                               name="password_confirmation"
                                               placeholder="Повторите пароль">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Изменить пароль</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

