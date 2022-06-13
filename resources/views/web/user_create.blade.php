@extends('layouts.admin')

@section('title','eRestaurant Kullanıcı Ekleme Sayfası')


@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Kullanıcı Ekle</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('users')}}">Kullanıcı Listesi</a>
                    </li>
                    <li class="breadcrumb-item active">Kullanıcı Ekle</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            @include('web.message')
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('store_user')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" required="" autocomplete="off">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">E-Posta Adres</label>
                            <input type="text" class="form-control" id="email" name="email" required="" autocomplete="off">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="password" required="" autocomplete="off">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="birthdate" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required="" autocomplete="off">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="sex" class="form-label">Cinsiyet</label>
                            <select class="form-select is-invalid" name="sex" id="sex" aria-describedby="validationServer04Feedback" required="">
                                <option value="">Cinsiyet Seçiniz!</option>
                                <option value="Erkek">Erkek</option>
                                <option value="Kadın">Kadın</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="role" class="form-label">Rol</label>
                            <select class="form-select is-invalid" name="role" id="role" aria-describedby="validationServer04Feedback" required="">
                                <option value="">Rol Seçiniz!</option>
                                <option value="0">Kullanıcı</option>
                                <option value="4">Admin</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerjs')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'answer' );
    </script>
@endsection
