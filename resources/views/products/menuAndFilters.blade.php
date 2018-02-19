<div class="col-md-3">

    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Категории</h3>
        </div>

        <div class="panel-body" id="start">
            <ul class="nav nav-pills nav-stacked category-menu">
                @foreach(\App\Categories::where('status', 1)->get() as $category)

                    <li class="{{strpos(url()->current(), '/'.$category->id) === false ?: 'active'}}">
                        <a class="sidebarLink" href="/category/{{$category->id}}">
                            {{$category->name}}
                            <span class="badge pull-right">
                                 {{App\Goods::where('category_id', '=', $category->id)->count()}}
                            </span>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

    </div>

</div>
