<link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Страница 404</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Ошибка 404.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="error-page">
            <h2 class="headline text-warning"> 404</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Что-то пошло не так. Страница не найдена.
                </h3>
                <p>
                    Нам не удалось найти запрашиваемую вами страницу.
                    Однако, вы можете <a href="{{route('home')}}">перейти на Главую</a> или воспользоваться поиском.
                </p>
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Поиск">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>

    </section>
</div>
