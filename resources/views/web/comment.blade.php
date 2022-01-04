<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eRestaurant Değerlendirme</title>
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/icons.css" rel="stylesheet">
</head>
<body>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mt-2">
        <div class="card-body">
            <h3>{{$data->name.' Yorumları'}}</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Kullanıcı Bilgileri</th>
                        <th>Yorum</th>
                        <th>Puan</th>
                        <th>Ekleme Tarihi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataList as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>
                                <strong>ID: </strong>{{$rs->user->id}}<br>
                                <strong>Ad Soyad</strong>{{$rs->user->name}}
                            </td>
                            <td>{{$rs->comment}}</td>
                            <td>{{$rs->rate}}</td>
                            <td>{{$rs->created_at}}</td>
                            <td>
                                <a href="{{route('destroy_comment',["id" => $rs->id,"product_id" => $data->id])}}" onclick="return confirm('{{$data->id}} numaralı ürünün {{$rs->id}} numaralı yorumunu silmek istediğinize emin misiniz?')"><i class="bx bx-trash text-danger font-24"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="{{asset('assets')}}/admin/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('assets')}}/admin/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/admin/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
    } );
</script>
</body>
</html>

