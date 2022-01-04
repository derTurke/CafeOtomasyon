@extends('layouts.admin')

@section('title','eRestaurant Ürünler Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Ürünler Listesi
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ürünler</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{route('create_product')}}" class="btn btn-dark px-5 float-end"><i class="bx bx-add-to-queue mr-1"></i>Ürün Ekle</a>
        </div>


    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Resim</th>
                            <th>Kategori</th>
                            <th>Ad</th>
                            <th>Fiyat</th>
                            <th>Malzemeler</th>
                            <th>Durum</th>
                            <th>Resim Galerisi</th>
                            <th>Yorumlar</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataList as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td><img src="{{Storage::url($rs->image)}}" alt="{{$rs->name}}" width="50px"></td>
                                <td>
                                    {{\App\Http\Controllers\web\CategoryController::getParentsTree($rs->category,$rs->category->name)}}
                                </td>
                                <td>{{$rs->name}}</td>
                                <td>{{number_format($rs->price, 2, ',', '.')}} &#8378;</td>
                                <td>{{$rs->contents}}</td>
                                <td>@if($rs->status == 1) Evet @else Hayır @endif</td>
                                <td><a href="{{route('create_image',['product_id' => $rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><i class='bx bx-images text-success font-24'></i></a></td>
                                <td><a href="{{route('comment',['product_id' => $rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><i class='bx bx-comment text-warning font-24'></i></a></td>
                                <td><a href="{{route('edit_product',['id' => $rs->id])}}"><i class="bx bx-pencil" style="color:#0a53be;font-size: 1.25rem"></i></a>
                                    <a href="{{route('destroy_product',['id' => $rs->id])}}" onclick="return confirm('{{$rs->id}} numaralı ürünü silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerjs')
    <script src="{{asset('assets')}}/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
