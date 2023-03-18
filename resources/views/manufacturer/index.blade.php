@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Производители</div>
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
                                <a href="{{route('manufacturers.create')}}" class="btn-sm btn btn-primary"><i
                                        class="fas fa-plus"></i> Добавить
                                    производителя</a>
                            </div>
                        </div>

                        <div class="card-body p-2">
                            <table id="index-table" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Подробнее</th>
                                    <th data-orderable="false" class="text-right">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($manufacturers as $manufacturer)
                                    <tr>
                                        <td>{{$manufacturer->id}}</td>
                                        <td>{{$manufacturer->name}}</td>
                                        <td><a href="{{route('manufacturers.show', $manufacturer)}}"
                                               class="link-primary">{{$manufacturer->slug}}</a>
                                        </td>
                                        <td>
                                            <div class="row float-right">
                                                <div class="col-auto">
                                                    <form method="post"
                                                          action="{{route('manufacturers.destroy', $manufacturer)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                                style="background: transparent; border: none">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="{{route('manufacturers.edit', $manufacturer)}}"><i
                                                            class="fas fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination pagination-sm float-left">
                                {{$manufacturers->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
