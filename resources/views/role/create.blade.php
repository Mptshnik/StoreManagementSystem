@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Добавление роли</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post" action="{{route('roles.store')}}">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6"><a href="{{route('roles.index')}}" class="link-primary">Все
                                    роли</a></div>
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
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" class="form-control" name="name" placeholder="Введите название роли">
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
                                            <input class="form-check-input" name="permissions[]" type="checkbox"
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
            </form>
        </div>
    </section>
@endsection
