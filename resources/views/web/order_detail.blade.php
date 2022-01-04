<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eRestaurant Ürün Detay Sayfası</title>
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/icons.css" rel="stylesheet">
</head>
<body>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card mt-2">
        <div class="card-body">
            <h3>{{$order_id}} Numaralı Sipariş Detay</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ürün</th>
                        <th>Fiyat</th>
                        <th>Adet</th>
                        <th>Toplam Tutar</th>
                        <th>Not</th>
                        <th>Ip Adres</th>
                        <th>Ekleme Tarihi</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataList as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>{{$rs->product->name}}</td>
                            <td>{{number_format($rs->price, 2, ',', '.')}} &#8378;</td>
                            <td>{{$rs->amount}}</td>
                            <td>{{number_format($rs->total, 2, ',', '.')}} &#8378;</td>
                            <td>{{$rs->note}}</td>
                            <td>{{$rs->ip}}</td>
                            <td>{{$rs->created_at}}</td>
                            <td>
                                <a href="{{route('destroy_order_detail',['id' => $rs->id,'order_id' => $rs->order_id])}}" onclick="return confirm('{{$rs->id}} numaralı ürünü silmek istediğinize emin misiniz?')"><i class="bx bx-trash" style="color: red;font-size: 1.25rem;"></i></a></td>
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

