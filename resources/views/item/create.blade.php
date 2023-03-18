@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h3 col-auto">Добавление товара</div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto"><a href="{{route('items.index')}}" class="link-primary">Все
                                товары</a></div>
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
                <form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Наименование товара">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">Артикул</label>
                                    <input type="text" class="form-control" name="number"
                                           placeholder="Артикул товара">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea type="text" class="form-control" name="description"
                                      placeholder="Описание товара"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">Цена</label>
                                    <input type="text" class="form-control" name="price_per_unit"
                                           placeholder="Цена за единицу товара">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">Закупочная цена</label>
                                    <input type="text" class="form-control" name="base_price_per_unit"
                                           placeholder="Закупочная цена за единицу товара">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">Количество</label>
                                    <input type="text" class="form-control" name="quantity"
                                           placeholder="Количество товара на складе">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="description">Процент скидки</label>
                                    <input type="text" class="form-control" name="discount"
                                           placeholder="Скидка на товар">
                                </div>
                            </div>
                        </div>
                        @php
                            $data = \Illuminate\Support\Facades\Session::get('data') ?? [];
                        @endphp
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Категории</label>
                                    <select class="select2" name="categories[]" multiple="multiple"
                                            data-placeholder="Выберите категории товара" style="width: 100%;">
                                        @foreach($categories as $category)
                                            <option
                                                @if(isset($data['categories']) && in_array($category->slug, $data['categories'])) selected
                                                @endif value="{{$category->slug}}">{{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Производитель</label>
                                    <select class="form-control select2" name="manufacturer_id"
                                            style="width: 100%;">
                                        @foreach($manufacturers as $manufacturer)
                                            <option selected value="">Выберите производителя</option>
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Фото товара</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="previewImgInput"
                                                   accept="image/*" type="file" class="custom-file-input"
                                                   name="preview_image">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                фото</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="image_output_container" style="display: none;">
                                    <div class="parent mt-2">
                                        <img class="mb-1" height="150px" id="output_preview_image" src="#" alt=""/>
                                        <div class="child">
                                            <a id="rm_button" style="color: white" onclick="removeImage()"
                                               href="javascript:;">
                                                <i class="far fa-times-circle"
                                                   style="background: rgba(70,70,70,0.63)"></i>
                                            </a>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Дополнительные фото товара</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" multiple
                                                   name="extra_images[]">
                                            <label class="custom-file-label" for="exampleInputFile">Выберите
                                                дополнительные фото</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary btn-sm w-auto mb-3">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <style>
        .child {
            position: absolute;
            top: 0;
            left: 0;
        }

        .parent {
            position: relative;
        }
    </style>
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript">

        function removeImage() {
            image_output_container.setAttribute('style', 'display: none')
            previewImgInput.value = ''
            output_preview_image.src = '#'
        }

        previewImgInput.onchange = evt => {
            const [file] = previewImgInput.files
            if (file) {
                image_output_container.setAttribute('style', 'display: flex')
                output_preview_image.src = URL.createObjectURL(file)
            }
        }


    </script>
@endsection
