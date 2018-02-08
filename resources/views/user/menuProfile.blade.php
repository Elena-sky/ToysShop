<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">Меню пользователя</h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="{{ route('viewOldOrders') }}"><i class="fa fa-list"></i> Мои заказы</a>
            </li>
            <li>
                <a href="{{ route('profile') }}"><i class="fa fa-user"></i> Мой профиль</a>
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