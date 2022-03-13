@extends('layouts.admin')

@section('title','eRestaurant Sepetler Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Sepetler Listesi
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Sepetler</li>
                    </ol>
                </nav>
            </div>

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
                                <th>Kullanıcı Bilgileri</th>
                                <th>Ürün Bilgileri</th>
                                <th>Fiyat Bilgileri</th>
                                <th>Ekleme Tarihi</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataList as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>
                                        @if(!empty($rs->user))
                                        <strong>ID: </strong>{{$rs->user_id}}<br>
                                        <strong>Ad Soyad: </strong>{{$rs->user->name}}<br>
                                        <strong>IP Adres: </strong>{{$rs->ip}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($rs->product))
                                        <strong>ID: </strong>{{$rs->product_id}}<br>
                                        <strong>Ad: </strong>{{$rs->product->name}}<br>
                                        <strong>Fiyat: </strong>{{number_format($rs->price, 2, ',', '.')}} &#8378;<br>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>Adet: </strong>{{$rs->amount}}<br>
                                        <strong>Toplam Tutar: </strong>{{number_format(($rs->price * $rs->amount), 2, ',', '.')}} &#8378;
                                    </td>
                                    <td>{{$rs->created_at}}</td>
                                    <td><a href="{{route('destroy_basket',['id' => $rs->id])}}" onclick="return confirm('{{$rs->id}} numaralı ürünü silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td>
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
