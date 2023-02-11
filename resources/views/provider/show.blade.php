@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="h3 col-auto mb-3">Поставщик "{{$provider->name}}"</div>
                    </div>
                    <div class="row">
                        <div class="col-auto"><a href="{{route('providers.index')}}" class="link-primary">Все поставщики</a></div>
                    </div>
                </div>
                <div class="card-body p-0 col-auto">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Поставщик</th>
                            <th>Адрес</th>
                            <th>Номер телефона</th>
                            <th>ИНН</th>
                            <th class="text-right">Действия</th>
                        </tr>
                        <tr>
                            <td>{{$provider->id}}</td>
                            <td>{{$provider->name}}</td>
                            <td>{{$provider->address}}</td>
                            <td>{{$provider->phone_number}}</td>
                            <td>{{$provider->tax_number}}</td>
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
                                        <a href="{{route('providers.edit', $provider)}}"><i class="fas fa-edit"></i></a>
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
@endsection
