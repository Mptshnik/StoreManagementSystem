@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Товары</div>
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
                                <a href="{{route('items.create')}}" class="btn-sm btn btn-primary"><i
                                        class="fas fa-plus"></i> Добавить
                                    товар</a>
                            </div>
                        </div>

                        <div class="card-body p-2">
                            @if($items->count() > 0)
                                <table id="index-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th>Подробнее</th>
                                        <th data-orderable="false">Фото</th>
                                        <th data-orderable="false" class="text-right">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td><a href="{{route('items.show', $item)}}"
                                                   class="link-primary">{{$item->slug}}</a>
                                            </td>
                                            <td>
                                                <img height="100px" alt="Изображение не найдено"
                                                     src="{{\Illuminate\Support\Facades\Storage::url($item->preview_image)}}">
                                            </td>
                                            <td>
                                                <div class="row float-right">
                                                    <div class="col-auto">
                                                        <form method="post"
                                                              action="{{route('items.destroy', $item)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                    style="background: transparent; border: none">
                                                                <i class="fas fa-trash-alt text-danger"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="{{route('items.edit', $item)}}"><i
                                                                class="fas fa-edit"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination pagination-sm float-left">
                                    {{$items->links()}}
                                </div>
                            @else
                                <h4 class="col-auto">
                                    Товаров пока нет.
                                </h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
