@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto d-inline-block">Пользователи</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <a href="{{route('users.create')}}" class="btn-sm btn btn-primary"><i
                                        class="fas fa-plus"></i> Добавить
                                    пользователя</a>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            @if($users->count() === 0)
                                <div class="col-auto">
                                    <h5>
                                        Пока нет данных.
                                    </h5>
                                </div>
                            @else
                                <table id="index-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>Имя пользователя</th>
                                        <th data-orderable="false" class="text-right">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td><a href="{{route('users.show', $user)}}"
                                                   class="link-primary">{{$user->login}}</a>
                                            </td>
                                            <td>{{$user->name}}</td>

                                            <td>
                                                <div class="row float-right">
                                                    <div class="col-auto">
                                                        <form method="post"
                                                              action="{{route('users.destroy', $user)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    style="background: transparent; border: none">
                                                                <i class="fas fa-trash-alt text-danger"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="{{route('users.edit', $user)}}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination pagination-sm float-left">
                                    {{$users->links()}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
