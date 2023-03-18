@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Изменение роли "{{$role->name}}"</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto"><a href="{{route('roles.index')}}" class="link-primary">Все роли</a>
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
                <form method="post" action="{{route('roles.update', $role)}}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" value="{{$role->name}}" name="name" placeholder="Введите название роли">
                        </div>
                        <label>Выберите права доступа</label>
                        <table class="table-sm" id="index-table">
                            <thead>
                            <tr>
                                <th style="min-width: 25px; max-width: 100px">ID</th>
                                <th>Право доступа</th>
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
                                            <input class="form-check-input" name="permissions[]" @if($role->hasPermission($permission->slug)) checked @endif type="checkbox" value="{{$permission->slug}}"
                                                   id="flexCheck{{$permission->id}}">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{$permission->name}}
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                      {{--  <div class="row">
                            <div class="pagination pagination-sm float-left">
                                {{$permissions->links()}}
                            </div>
                        </div>--}}
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-sm w-auto mb-3">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
