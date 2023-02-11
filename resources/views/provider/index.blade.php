@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="h3 col-auto mb-3">Поставщики</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="{{route('providers.create')}}"
                               class="btn-sm btn btn-primary col-auto w-auto">Добавить поставщика</a>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group input-group-sm float-right" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control" placeholder="Поиск">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th class="text-right">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($providers as $provider)
                            <tr>
                                <td>{{$provider->id}}</td>
                                <td><a href="{{route('providers.show', $provider)}}"
                                       class="link-primary">{{$provider->name}}</a>
                                </td>
                                <td>
                                    <div class="row float-right">
                                        <div class="col-auto">
                                            <form method="post" action="{{route('providers.destroy', $provider)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="background: transparent; border: none">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{route('providers.edit', $provider)}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </div>
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
@endsection
