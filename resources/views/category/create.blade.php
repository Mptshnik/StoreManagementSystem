@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="h3 col-auto mb-3">Добавление категории</div>
            </div>
            <div class="row">
                <div class="col-auto"><a href="{{route('categories.index')}}" class="link-primary">Все категории</a></div>
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
        <form method="post" action="{{route('categories.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Название</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Категория товара">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Описание категории товара"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-sm w-auto mb-3">Добавить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
