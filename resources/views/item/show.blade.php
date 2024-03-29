@extends('layouts.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Карточка товара</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{\Illuminate\Support\Facades\Storage::url($item->preview_image)}}"
                                 class="product-image" alt="Product Image">
                        </div>
                        <div class="product-image-thumbs">
                            <div class="product-image-thumb active">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($item->preview_image)}}" alt="Product Image">
                            </div>

                            @foreach($item->images as $image)
                                <div class="product-image-thumb">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($image->url)}}" alt="Product Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{$item->name}}</h3>
                        <p>{{$item->description}}</p>

                        <hr>
                        <h4>Категории</h4>
                        <div>
                            @foreach($item->categories as $index => $category)
                                <div>
                                    {{++$index}}) <a
                                        href="{{route('categories.show', $category)}}">{{$category->name}}</a>
                                </div>
                            @endforeach
                        </div>

                        <h4 class="mt-3">Производитель</h4>
                        <div>
                            <a href="{{route('manufacturers.show', $item->manufacturer)}}">{{$item->manufacturer->name}}</a>
                        </div>

                        <div class="bg-gray rounded py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Цена товара: {{$item->price_per_unit}} ₽
                            </h2>
                            <h4 class="mt-0">
                                <small>Закупочная цена: {{$item->base_price_per_unit}} ₽ </small>
                            </h4>
                        </div>
                        <div class="mt-4">
                            <a class="btn btn-primary btn" href="{{route('items.edit', $item)}}">
                                <i class="fas fa-edit fa-lg mr-2"></i>
                                Изменить
                            </a>

                            <div class="btn btn-danger btn">
                                <i class="fas fa-minus fa-lg mr-2"></i>
                                Удалить
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                               href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Описание</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                               href="#product-comments" role="tab" aria-controls="product-comments"
                               aria-selected="false">Комментарии</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                               href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Рейтинг</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                             aria-labelledby="product-desc-tab">{{$item->description}}</div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                             aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                            condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                            commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla
                            turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar
                            mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex
                            elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a
                            sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel
                            id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum.
                        </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel"
                             aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere
                            elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus
                            efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie,
                            purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et
                            erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur
                            lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio,
                            malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan
                            urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at
                            mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec
                            varius massa at semper posuere. Integer finibus orci vitae vehicula placerat.
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
