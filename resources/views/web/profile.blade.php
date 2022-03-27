@extends('layouts.admin')

@section('title','eRestaurant Profil Sayfası')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            @include('web.message')
            <div class="card-body">
                <form action="{{route('profile_update')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Ad Soyad</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="name" id="name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">E-Posta</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="email" id="email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Kaydet">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('password_update')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mevcut Şifre</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" name="sifre" id="sifre" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Yeni Şifre</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" class="form-control" id="yeni_sifre" name="yeni_sifre" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Yeni Şifre (Tekrar)</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="password" class="form-control" id="yeni_sifre_tekrar" name="yeni_sifre_tekrar" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Kaydet">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
