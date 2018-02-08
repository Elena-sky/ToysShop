<div class="col-md-3">


    <div class="panel panel-default sidebar-menu">

        <div class="panel-heading">
            <h3 class="panel-title">Категории</h3>
        </div>

        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked category-menu">
                @foreach(\App\Categories::where('status', 1)->get() as $category)

                    <li>
                        <a href="/category/{{$category->id}}">{{$category->name}} <span
                                    class="badge pull-right">42</span></a>
                    </li>
                @endforeach

                <li class="active">
                    <a href="category.html">Ladies <span class="badge pull-right">123</span></a>
                </li>
            </ul>
        </div>
    </div>

</div>
