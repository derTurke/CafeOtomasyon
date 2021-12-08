@extends('layouts.admin')

@section('title','Nesil Cafe Masalar Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Masa Listesi
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Masalar</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{route('create_table')}}" class="btn btn-dark px-5 float-end"><i class="bx bx-add-to-queue mr-1"></i>Masa Ekle</a>
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
                            <th>Ad</th>
                            <th>QR Code</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataList as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>Masa {{$rs->name}}</td>
                                <td>{!! QrCode::size(100)->generate($rs->qr_code) !!}</td>
                                <td>@if($rs->status == 1) Dolu @else Boş @endif</td>
                                <td><a href="{{route('destroy_table',['id' => $rs->id])}}" onclick="return confirm('{{$rs->id}} numaralı masayı silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td>
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
