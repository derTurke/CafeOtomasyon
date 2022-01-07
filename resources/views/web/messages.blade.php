@extends('layouts.admin')

@section('title','eRestaurant Mesaj Sayfası')


@section('content')
    <div class="row">
        <div class="col-md-8 page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                Mesaj Listesi
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mesaj</li>
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
                            <th>User Id</th>
                            <th>Konu</th>
                            <th>Mesaj</th>
                            <th>E-Posta</th>
                            <th>Durum</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dataList as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->user_id}}</td>
                                <td>{{$rs->subject}}</td>
                                <td>{{$rs->message}}</td>
                                <td><a href="mailto:{{$rs->email}}">{{$rs->email}}</a></td>
                                <td>
                                    @if($rs->status == 1)
                                        {{ "Okundu" }}
                                    @else
                                        {{ "Okunmadı" }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('update_message',['id' => $rs->id])}}" onclick="return confirm('{{$rs->id}} numaralı mesajı okundu olarak değiştirmeyi onaylıyor musunuz?')"><i class="bx bx-show text-primary" style="font-size: 1.25rem;"></i></a>
                                </td>
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
