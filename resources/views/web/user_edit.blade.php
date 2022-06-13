@extends('layouts.admin')

@section('title','eRestaurant Kullanıcı Güncelleme Sayfası')


@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Kullanıcı Güncelle</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('users')}}">Kullanıcı Listesi</a>
                    </li>
                    <li class="breadcrumb-item active">Kullanıcı Güncelle</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            @include('web.message')
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('update_user',["id" => $data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" required="" autocomplete="off" value="{{$data->name}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">E-Posta Adres</label>
                            <input type="text" class="form-control" id="email" name="email" required="" autocomplete="off" value="{{$data->email}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="birthdate" class="form-label">Doğum Tarihi</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required="" autocomplete="off" value="{{$data->birthdate}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="sex" class="form-label">Cinsiyet</label>
                            <select class="form-select is-invalid" name="sex" id="sex" aria-describedby="validationServer04Feedback" required="">
                                <option value="Erkek" @if($data->sex == 'Erkek') selected @endif>Erkek</option>
                                <option value="Kadın" @if($data->sex == 'Kadın') selected @endif>Kadın</option>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="role" class="form-label">Rol</label>
                            <select class="form-select is-invalid" name="role" id="role" aria-describedby="validationServer04Feedback" required="">
                                <option value="0" @if($data->role == 0) selected @endif>Kullanıcı</option>
                                <!-- <option value="3" @if($data->role == 3) selected @endif>Garson</option> -->
                                <option value="4" @if($data->role == 4) selected @endif>Admin</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerjs')
@endsection
