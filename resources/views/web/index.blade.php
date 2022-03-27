@extends('layouts.admin')

@section('title',"eRestaurant Anasayfa")


@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Yeni Siparişler</p>
                            <h4 class="my-1 text-danger">{{$new}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="bx bxs-alarm bx-tada"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Onaylanan Siparişler</p>
                            <h4 class="my-1 text-primary">{{$accepted}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-deepblue text-white ms-auto"><i class="bx bxs-like"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Hazırlanan Siparişler</p>
                            <h4 class="my-1 text-warning">{{$prepared}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="bx bxs-wine"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Tamamlanan Siparişler</p>
                            <h4 class="my-1 text-success">{{$completed}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Günlük Ciro</p>
                            <h4 class="my-1 text-info">{{number_format($daily_sum, 2, ',', '.')}} &#8378;</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-dark">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Toplam Ciro</p>
                            <h4 class="my-1 text-dark">{{number_format($total_sum, 2, ',', '.')}} &#8378;</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-moonlit text-white ms-auto"><i class="bx bxs-wallet-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
