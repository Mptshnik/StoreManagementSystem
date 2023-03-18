@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Роль "{{$role->name}}"</div>
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
                                <div class="col-auto"><a href="{{route('roles.index')}}" class="link-primary">Все
                                        роли</a></div>
                            </div>
                        </div>
                        <div class="card-body p-0 col-auto">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="row float-right">
                                            <div class="col-auto">
                                                <form method="post" action="{{route('roles.destroy', $role)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="background: transparent; border: none">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{route('roles.edit', $role)}}"><i class="fas fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <label>Права доступа</label>
                        </div>
                        <div class="card-body">
                            @foreach($role->permissions as $index => $value)
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{++$index . ") " . $value->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
