@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Поставщики</div>
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
                                <a href="{{route('providers.create')}}"
                                   class="btn-sm btn btn-primary col-auto w-auto"><i class="fas fa-plus"></i> Добавить поставщика</a>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <table id="index-table" class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th data-orderable="false"  class="text-right">Действия</th>
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
        </div>
    </section>
@endsection
