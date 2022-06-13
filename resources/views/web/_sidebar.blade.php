<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <h4 class="logo-text">eRestaurant</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('home')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Anasayfa</div>
            </a>
        </li>
        <li>
            <a href="{{route('category')}}">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Kategori</div>
            </a>
        </li>
        <li>
            <a href="{{route('product')}}">
                <div class="parent-icon"><i class='bx bx-food-menu'></i>
                </div>
                <div class="menu-title">Ürünler</div>
            </a>
        </li>
        <li>
            <a href="{{route('table')}}">
                <div class="parent-icon"><i class='bx bx-table'></i>
                </div>
                <div class="menu-title">Masalar</div>
            </a>
        </li>
        <li>
            <a href="{{route('basket')}}">
                <div class="parent-icon"><i class='bx bx-basket'></i>
                </div>
                <div class="menu-title">Sepetler</div>
            </a>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-alarm"></i>
                </div>
                <div class="menu-title">Siparişler</div>
            </a>
            <ul class="mm-collapse">
                <li> <a href="{{route('order',['slug' => 'New'])}}"><i class="bx bx-right-arrow-alt"></i><i class="badge text-white bg-danger float-end">Yeni</i></a>
                </li>
                <li> <a href="{{route('order',['slug' => 'Accepted'])}}"><i class="bx bx-right-arrow-alt"></i><i class="badge text-white bg-primary float-end">Onaylanan</i></a>
                </li>
                <li> <a href="{{route('order',['slug' => 'Prepared'])}}"><i class="bx bx-right-arrow-alt"></i><i class="badge text-white bg-warning float-end">Hazırlanan</i></a>
                </li>
                <li> <a href="{{route('order',['slug' => 'Completed'])}}"><i class="bx bx-right-arrow-alt"></i><i class="badge text-white bg-success float-end">Tamamlanan</i></a>
                </li>
            </ul>
        </li>
        {{--<li>
            <a href="{{route('order')}}">
                <div class="parent-icon"><i class='bx bx-money'></i>
                </div>
                <div class="menu-title">Siparişler</div>
            </a>
        </li>--}}
        <li>
            <a href="{{route('messages')}}">
                <div class="parent-icon"><i class='bx bx-message'></i>
                </div>
                <div class="menu-title">Mesajlar</div>
            </a>
        </li>
        <li>
            <a href="{{route('sss')}}">
                <div class="parent-icon"><i class='bx bx-question-mark'></i>
                </div>
                <div class="menu-title">S.S.S.</div>
            </a>
        </li>
        <li>
            <a href="{{route('users')}}">
                <div class="parent-icon"><i class='bx bxs-user-account'></i>
                </div>
                <div class="menu-title">Kullanıcılar</div>
            </a>
        </li>
        <li>
            <a href="{{route('setting')}}">
                <div class="parent-icon"><i class='bx bx-wrench'></i>
                </div>
                <div class="menu-title">Ayarlar</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
