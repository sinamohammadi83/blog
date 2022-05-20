<div class="d-inline-block mt-5 p-3 col-12 category-dropdown">
    دسته بندی ها<img id="icon-dropdown" class="icon-dropdown-menu" src="/website/icon/icon_sort_down.png"/>
</div>
<div class="dropdown bg-white col-12" style="display: none;">
    @foreach($categories as $category)
    <div id="category-{{$category->id}}" class="dropdown-items-menu col-12 p-3">
        {{$category->title}}
        <img id="icon-dropdown-{{$category->id}}" class="icon-dropdown-menu" src="/website/icon/icon_sort_down.png"/>
    </div>
        <div id="item-menu-{{$category->id}}" class="bg-white col-12" style="display: none;">
        <div class="col-12 pe-3">
            <a href="{{route('website.category.show',$category)}}" class="text-secondary text-decoration-none font-13 alert-link">همه موارد این دسته بندی></a>
        </div>
        @foreach($category->categories as $children)
            <div id="category-{{$children->id}}" class="dropdown-items-menu col-12 p-3 pe-5">
                {{$children->title}}
                <img id="icon-dropdown-{{$children->id}}" class="icon-dropdown-menu" src="/website/icon/icon_sort_down.png"/>
            </div>
            <div id="item-menu-{{$children->id}}" class="bg-white col-12 pe-5" style="display: none;">
            <div class="col-12 pe-3">
                <a href="{{route('website.category.show',$children)}}" class="text-secondary text-decoration-none font-13 alert-link">همه موارد این دسته بندی></a>
            </div>
            @foreach($children->categories as $child)
                <div class="col-12 p-3">
                    <a href="{{route('website.category.show',$child)}}" class=" text-dark text-decoration-none">{{$child->title}}</a>
                </div>
            @endforeach
        </div>
        @endforeach
    </div>
    @endforeach
</div>
