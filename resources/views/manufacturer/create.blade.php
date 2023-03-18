@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Добавление производителя</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto"><a href="{{route('manufacturers.index')}}" class="link-primary">Все производители</a>
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
                <form method="post" action="{{route('manufacturers.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Наименование</label>
                            <input type="text" class="form-control" name="name" placeholder="Наименование производителя">
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <input type="tel" class="form-control" name="description" placeholder="Описание">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-sm w-auto mb-3">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>

@endsection
