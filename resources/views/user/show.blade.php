@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Пользователь "{{$user->name}}"</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @php
                $reset_password_success = \Illuminate\Support\Facades\Session::get('reset_password')
            @endphp
            @if($reset_password_success)
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Уведомление</h5>
                    {{$reset_password_success}}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-auto"><a href="{{route('users.index')}}" class="link-primary">Все пользователи</a></div>
                            </div>
                        </div>
                        <div class="card-body p-0 col-auto">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Логин</th>
                                    <th>Имя пользователя</th>
                                    <th>Дата регистрации</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->login}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->created_at->format('d.m.Y')}}</td>
                                    <td>
                                        <div class="row float-right">
                                            <div class="col-auto">
                                                <form method="post" action="{{route('users.destroy', $user)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="background: transparent; border: none">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{route('users.edit', $user)}}"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    Роли пользователя
                                </div>
                                <div class="card-body">
                                    @if($user->roles->count() === 0)
                                        <div>
                                            У пользователя нет ролей. <a href="{{route('users.edit')}}"
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
                                            @foreach($user->roles as $role)
                                                <tr>
                                                    <td>
                                                        {{$role->id}}
                                                    </td>
                                                    <td>
                                                        {{$role->name}}
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
                                    @if($user->permissions->count() === 0)
                                        <div>
                                            У пользователя нет уровней доступа. <a href="{{route('users.edit')}}"
                                                                         class="brand-link">Добавить уровни доступа</a>
                                        </div>
                                    @else
                                        <table class="table-sm" id="table-paging2">
                                            <thead>
                                            <tr>
                                                <th style="width: 10%">ID</th>
                                                <th style="width: 30%">Уровень доступа</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->permissions as $permission)
                                                <tr>
                                                    <td>
                                                        {{$permission->id}}
                                                    </td>
                                                    <td>
                                                        {{$permission->name}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
