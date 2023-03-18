@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Категории товаров</div>
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
                                <a href="{{route('categories.create')}}" class="btn-sm btn btn-primary"><i class="fas fa-plus"></i> Добавить
                                    товар</a>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><a href="{{route('categories.show', $category)}}"
                                               class="link-primary">{{$category->slug}}</a>
                                        </td>
                                        <td>
                                            <div class="row float-right">
                                                <div class="col-auto">
                                                    <form method="post" action="{{route('categories.destroy', $category)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" style="background: transparent; border: none">
                                                            <i class="fas fa-trash-alt text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="{{route('categories.edit', $category)}}"><i
                                                            class="fas fa-edit"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination pagination-sm float-left">
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
