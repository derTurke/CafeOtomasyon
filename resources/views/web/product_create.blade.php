@extends('layouts.admin')

@section('title','Nesil Cafe Ürün Ekleme Sayfası')


@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ürün Ekle</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">Ürünler</a>
                    </li>
                    <li class="breadcrumb-item active">Ürün Ekle</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="parent_id" class="form-label">Kategori</label>
                            <select class="form-select is-invalid" name="category_id" id="category_id" aria-describedby="parentFeedBack" required="">
                                <option value="">Lütfen Kategori Seçiniz!</option>
                                @foreach($dataList as $rs)
                                    <option value="{{$rs->id}}">{{\App\Http\Controllers\web\CategoryController::getParentsTree($rs,$rs->name)}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="name" name="name" required="">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Resim</label>
                            <input type="file" class="form-control" name="image" id="image" required="">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="contents" class="form-label">Malzemeler</label>
                            <input type="text" class="form-control" id="contents" name="contents" placeholder="Domates,Patates, vb." required="">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="detail" class="form-label">Detay</label>
                            <textarea name="detail" id="detail"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="price" class="form-label">Fiyat</label>
                            <input type="number" class="form-control" id="price" name="price" required="">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="status" class="form-label">Uygulamada Görünsün mü?</label>
                            <select class="form-select is-invalid" name="status" id="status" aria-describedby="validationServer04Feedback" required="">
                                <option value="">Durum Seçiniz!</option>
                                <option value="0">Hayır</option>
                                <option value="1">Evet</option>
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
        CKEDITOR.replace( 'detail' );
    </script>
@endsection
