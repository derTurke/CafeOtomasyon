@extends('layouts.admin')

@section('title','eRestaurant Siparişler Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                {{$slug_tr}} Siparişler
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Siparişler</li>
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
                            <th>Masa || Adres</th>
                            <th>Toplam Tutar</th>
                            <th>Not</th>
                            <th>Ekleme Tarihi</th>
                            <th>Durum</th>
                            <th>Detay</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataList as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>
                                    @if($rs->user)
                                        <strong>ID: </strong>{{$rs->user->id}}<br>
                                        <strong>Ad Soyad: </strong>{{$rs->user->name}}
                                    @endif
                                </td>
                                <td>
                                    @if($rs->table)
                                    {{'Masa '.$rs->table->name}}
                                    @elseif($rs->address_id)
                                        <strong>Adres: </strong>{{$rs->address->address}}
                                        <br>
                                        <strong>Telefon: </strong>{{$rs->address->phone}}
                                    @endif
                                </td>
                                <td>{{number_format($rs->total, 2, ',', '.')}} &#8378;</td>
                                <td>{{$rs->note}}</td>
                                <td>{{$rs->created_at}}</td>
                                <td>
                                    @if($rs->status == 1)
                                        Onay Bekliyor
                                    @elseif($rs->status == 2)
                                        Hazırlanıyor
                                    @elseif($rs->status == 3)
                                        <a class="btn btn-sm btn-success" href="{{route('edit_order',['id' => $rs->id,'slug' => $slug])}}">Tamamlandı</a>
                                    @elseif($rs->status == 4)
                                        Tamamlandı
                                        @endif
                                </td>
                                <td><a class="btn btn-sm btn-primary" href="{{route('order_detail',['order_id' => $rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">Detay</a></td>
                                <td><a href="{{route('destroy_order',['id' => $rs->id,'slug' => $slug])}}" onclick="return confirm('{{$rs->id}} numaralı siparişi silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td></td>
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
