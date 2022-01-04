@extends('layouts.admin')

@section('title','Nesil Cafe Ayarlar Sayfası')

@section('headerjs')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Ayarlar</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Ayarlar</li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form class="row g-3 needs-validation was-validated" novalidate="" action="{{route('update_setting')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-primary" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxs-home font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Ana Bilgiler</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#ticari" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxs-envelope-open font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Ticari Bilgiler</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxl-twitter font-18 me-1"></i>
                                </div>
                                <div class="tab-title">Sosyal Medya</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#contact-info" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bxs-contact font-18 me-1"></i>
                                </div>
                                <div class="tab-title">KVKK</div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content py-3">
                    <div class="tab-pane fade active show" id="general" role="tabpanel">
                        <div class="col-md-12">
                            <input type="hidden" id="id" name="id" value="{{$data->id}}">
                            <label for="company_name" class="form-label">Şirket Ad</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required="" value="{{$data->company_name}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="brand_name" class="form-label">Marka Ad</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required="" value="{{$data->brand_name}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">Adres</label>
                            <textarea class="form-control" id="address" name="address" required>{{$data->address}}</textarea>
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" name="phone" id="phone" required="" value="{{$data->phone}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" required="" value="{{$data->fax}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required="" value="{{$data->email}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ticari" role="tabpanel">
                        <div class="col-md-12">
                            <label for="sicil_no" class="form-label">Sicil No</label>
                            <input type="text" class="form-control" name="sicil_no" id="sicil_no" required="" value="{{$data->sicil_no}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="vergi_no" class="form-label">Vergi No</label>
                            <input type="text" class="form-control" name="vergi_no" id="vergi_no" required="" value="{{$data->vergi_no}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="vergi_dairesi" class="form-label">Vergi Dairesi</label>
                            <input type="text" class="form-control" name="vergi_dairesi" id="vergi_dairesi" required="" value="{{$data->vergi_dairesi}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="mersis_no" class="form-label">Mersis No</label>
                            <input type="text" class="form-control" name="mersis_no" id="mersis_no" required="" value="{{$data->mersis_no}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="social" role="tabpanel">
                        <div class="col-md-12">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook" required="" value="{{$data->facebook}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="twitter" required="" value="{{$data->twitter}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="instagram" required="" value="{{$data->instagram}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                        <div class="col-md-12">
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin" required="" value="{{$data->linkedin}}">
                            <div class="valid-feedback">Başarılı!</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact-info" role="tabpanel">
                        <div class="col-md-12">
                            <label for="kvkk" class="form-label">KVKK</label>
                            <textarea id="kvkk" name="kvkk">{{$data->kvkk}}</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Güncelle</button>
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@section('footerjs')
    <script>
        CKEDITOR.replace('kullanici_sozlesme');
        CKEDITOR.replace('kvkk');
    </script>
@endsection
