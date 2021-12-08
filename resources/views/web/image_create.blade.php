<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Hotel Add Image Page</title>
    <link href="{{asset('assets')}}/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/css/icons.css" rel="stylesheet">
</head>
<body>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="card">
        <div class="card-body">
            <div class="p-4 border rounded">
                Resim Galerisi
                <hr>
                <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('store_image',['product_id' => $data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label for="image" class="form-label">Resim</label>
                        <input type="file" class="form-control" name="image" id="image" required="">
                        <div class="valid-feedback">Başarılı!</div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="images" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ürün Ad</th>
                        <th>Resim</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td>{{$data->id.' - '.$data->name}}</td>
                            <td>
                                @if($image->image)
                                    <img src="{{Storage::url($image->image)}}" height="50px">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('destroy_image',["id" => $image->id,"product_id" => $data->id])}}" onclick="return confirm('{{$data->id}} numaralı ürünün {{$image->id}} numaralı resmini silmek istediğinize emin misiniz?')"><i class="bx bx-trash text-danger font-24"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

