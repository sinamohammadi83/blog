
    <div class="d-flex justify-content-center">
    <div id="dropdown" class="dropdown-light col-xl-10 col-lg-11" style="display: none;">
        <div class="nav-r col-xl-2 col-lg-2 float-end">
            @foreach($categories as $category)
                <a class="text-decoration-none text-dark" href="{{route('website.category.show',$category)}}">
                    <div id="category-{{$category->id}}" class="dropdown-items col-xl-12 col-lg-12 p-2">
                        {{$category->title}}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="nav-l col-xl-10 col-lg-10 float-start">
            @foreach($categories as $category)
                <div class="dropdown-category" id="item-{{$category->id}}" >
                    @foreach($category->categories as $children)
                        <div class="float-end">
                            <a href="{{route('website.category.show',$children)}}" class="item-category">
                                <span class="font-bold font-18 color-black-hover">
                                    -{{$children->title}}
                                </span>
                            </a>
                            @foreach($children->categories as $child)
                                <div class="sub-category">
                                    <a href="{{route('website.category.show',$child)}}" class="color-black-hover">{{$child->title}}</a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
            <div class="dropdown-category" id="item-2">aaa1</div>
            <div class="dropdown-category" id="item-3">aaa2</div>
            <div class="dropdown-category" id="item-4">aaa3</div>
            <div class="dropdown-category" id="item-5">aaa4</div>
            <div class="dropdown-category" id="item-6">aaa5</div>
        </div>
    </div>
</div>

