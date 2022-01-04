@extends('layouts.admin')

@section('title','eRestaurant Kategori Güncelleme Sayfası')


@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Kategori Güncelle</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">Kategori</a>
                    </li>
                    <li class="breadcrumb-item active">Kategori Güncelle</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('update_category',['id' => $data->id])}}" method="post">
                        @csrf
                        <div class="col-md-12">
                            <label for="parent_id" class="form-label">Ana Kategori</label>
                            <select class="form-select is-invalid" name="parent_id" id="parent_id" aria-describedby="parentFeedBack" required="">
                                <option value="">Kategori Seçiniz!</option>
                                <option value="0">Ana Kategori</option>
                                @foreach($dataList as $rs)
                                    <option value="{{$rs->id}}" @if($rs->id == $data->parent_id) selected="selected" @endif>{{\App\Http\Controllers\web\CategoryController::getParentsTree($rs,$rs->name)}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="title" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required="">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Resim</label>
                            <input type="file" class="form-control" name="image" id="image" required="">
                            <div class="valid-feedback">Başarılı!</div>

                            @if($data->image)
                                <img src="{{\Illuminate\Support\Facades\Storage::url($data->image)}}" height="50px">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select is-invalid" name="status" id="status" aria-describedby="validationServer04Feedback" required="">
                                <option value="{{$data->status}}">@if($data->status == 1) Evet @else Hayır @endif</option>
                                <option value="">Durum Seçiniz!</option>
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
                            </select>

                        </div>



                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Kategori Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footerjs')

@endsection


