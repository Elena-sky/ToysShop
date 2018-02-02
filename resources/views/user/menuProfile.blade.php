<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Customer section</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="customer-orders.html"><i class="fa fa-list"></i> My orders</a>
            </li>
            <li>
                <a href="customer-wishlist.html"><i class="fa fa-heart"></i> My wishlist</a>
            </li>
            <li>
                <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Мой профиль</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-key"></i> Изменить пароль</a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out"></i> Выйти
                </a>

                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST"> {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>

</div>
<!-- /.col-md-3 -->