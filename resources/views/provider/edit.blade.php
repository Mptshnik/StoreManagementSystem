@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Изменение поставщика "{{$provider->name}}"</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto"><a href="{{route('providers.index')}}" class="link-primary">Все поставщики</a>
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
                <form method="post" action="{{route('providers.update', $provider)}}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Наименование</label>
                            <input type="text" value="{{$provider->name}}" class="form-control" name="name" placeholder="Наименование поставщика">
                        </div>
                        <div class="form-group">
                            <label>Номер телефона</label>
                            <input type="tel" value="{{$provider->phone_number}}" class="form-control" name="phone_number" placeholder="Номер телефона">
                        </div>
                        <div class="form-group">
                            <label>ИНН</label>
                            <input type="text" value="{{$provider->tax_number}}" class="form-control" name="tax_number" placeholder="ИНН поставщика">
                        </div>
                        <div class="form-group">
                            <label>Адрес</label>
                            <textarea type="text" class="form-control" name="address"
                                      placeholder="Юридический и физический адрес поставщика">{{$provider->address}}</textarea>
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
