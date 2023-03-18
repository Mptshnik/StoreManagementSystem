@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Категория "{{$category->name}}"</div>
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
                                <div class="col-auto"><a href="{{route('categories.index')}}" class="link-primary">Все категории</a></div>
                            </div>
                        </div>
                        <div class="card-body p-0 col-auto">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Категория</th>
                                    <th>Описание</th>
                                    <th class="text-right">Действия</th>
                                </tr>
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
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
                                                <a href="{{route('categories.edit', $category)}}"><i class="fas fa-edit"></i></a>
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
        </div>
    </section>
@endsection
