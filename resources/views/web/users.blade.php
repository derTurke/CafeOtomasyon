@extends('layouts.admin')

@section('title','eRestaurant Kullanıcı Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Kullanıcı Listesi
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Listesi</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="col-md-4">
            <a href="{{route('create_user')}}" class="btn btn-dark px-5 float-end"><i class="bx bx-add-to-queue mr-1"></i>Kullanıcı Ekle</a>
        </div>


    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2">
            <div class="card">
                @include('web.message')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ad Soyad</th>
                                <th>E-Posta Adres</th>
                                <th>Doğum Tarihi</th>
                                <th>Cinsiyet</th>
                                <th>Rol</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataList as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>@if(!empty($rs->birthdate)){{date('d/m/Y',strtotime($rs->birthdate))}}@endif</td>
                                    <td>{{$rs->sex}}</td>
                                    <td>@if($rs->role == 4) Admin @elseif($rs->role == 3) Garson @else Kullanıcı @endif </td>
                                    <td><a href="{{route('edit_user',['id' => $rs->id])}}"><i class="bx bx-pencil" style="color:#0a53be;font-size: 1.25rem"></i></a>
                                    <a href="{{route('destroy_user',['id' => $rs->id])}}" onclick="return confirm('{{$rs->id}} numaralı kullanıcıyı silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td>
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
