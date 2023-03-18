@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Изменение категории "{{$category->name}}"</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto"><a href="{{route('categories.index')}}" class="link-primary">Все
                                категории</a></div>
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
                <form method="post" action="{{route('categories.update', $category)}}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" value="{{$category->name}}" class="form-control" name="name" id="name"
                                   placeholder="Категория товара">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea type="text" class="form-control" name="description" id="description"
                                      placeholder="Описание категории товара">{{$category->description}}</textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm w-auto mb-3">Изменить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
