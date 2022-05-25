<div class="panel_right @if($minipanel) text-center @endif pe-2 col-xl-4 col-lg-4 color-2 m-2 d-inline-block d-none d-lg-block p-2 rounded-3 justify-content-center" @if($minipanel) style="width: 50px;" @endif>
    <div>
        <img src="/website/icon/icon_menu.png" class="width-30 icon_menu_panel @if($minipanel) active @endif" alt="">
    </div>
    <div class="text-center mt-3 option_panel @if($minipanel) d-none @endif" >
        <img src="{{$authUser->ImagePath}}" class="col-xl-5 col-lg-5 rounded-circle " alt="">
    </div>
    <div class="text-center p-2 col-xl-12 option_panel  @if($minipanel) d-none @endif">{{$authUser->name}} {{$authUser->family}}</div>
    <div class="mt-5"><a href="{{route('client.home')}}" class="text-decoration-none text-dark"><img src="/website/icon/home.png" alt="صفحه اصلی" class="width-30"><span class="option_panel @if($minipanel) d-none @endif">صفحه اصلی</span></a></div>
    <div class="mt-3 p-1 rounded @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.profile.edit') color-8 @endif"><a href="{{route('client.profile.edit')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.profile.edit') text-white @endif text-dark"><img src="/website/icon/edit-profile.png" alt="ویرایش اطلاعات کاربری" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">ویرایش اطلاعات کاربری</span></a></div>
    @canany(['read-post','create-post','read-self-post'])
    <div class="mt-3 menu-dropdown" id="menu-1"><img src="/website/icon/post.png" alt="پست" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">پست</span><img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdown-menu icon-dropdowm-1 width-20 @if($minipanel) d-none @endif" alt=""></div>
    <div id="dropdown-1" class="dropdown @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index' && !$minipanel) active @endif @if($minipanel) position-absolute bg-white border border-dark rounded-3 @endif" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.post.create' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.post.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.myposts.index' || $minipanel)  style="display: none;" @endif>
        @can('read-self-post')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') color-8 @endif text-center">
                <a href="{{route('client.myposts.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست پست های من</a>
            </div>
        @endcan
        @can('create-post')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create') color-8 @endif text-center">
                <a href="{{route('client.post.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create') text-white @endif  text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن پست جدید</a>
            </div>
        @endcan
        @can('read-post')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index') color-8 @endif text-center">
                <a href="{{route('client.post.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه پست ها</a>
            </div>
        @endcan
    </div>
    @endcanany
    @canany(['read-category','create-category'])
        <div class="mt-3 menu-dropdown" id="menu-2"><img src="/website/icon/categories.png" alt="دسته بندی" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">دسته بندی</span><img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdown-menu @if($minipanel) d-none @endif icon-dropdowm-2 width-20" alt=""></div>
    <div id="dropdown-2" class="dropdown @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index' && !$minipanel) active @endif @if($minipanel) position-absolute bg-white border border-dark rounded-3 @endif" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.category.create' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.category.index' || $minipanel)  style="display: none;" @endif >
        @can('create-category')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create') color-8 @endif text-center">
                <a href="{{route('client.category.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن دسته بندی جدید</a>
            </div>
        @endcan
        @can('read-category')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') color-8 @endif text-center">
                <a href="{{route('client.category.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه دسته بندی ها</a>
            </div>
        @endcan
    </div>
    @endcanany
    @canany(['read-user','create-user'])
        <div class="mt-3 menu-dropdown" id="menu-3"><img src="/website/icon/user.png" alt="کاربران" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">کاربران</span><img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdown-menu @if($minipanel) d-none @endif icon-dropdowm-3 width-20" alt=""></div>
    <div id="dropdown-3" class="dropdown @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index' && !$minipanel) active @endif @if($minipanel) position-absolute bg-white border border-dark rounded-3 @endif" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.user.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.user.create' || $minipanel)  style="display: none;" @endif>
        @can('create-user')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create') color-8 @endif text-center">
                <a href="{{route('client.user.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن کاربر جدید</a>
            </div>
        @endcan
        @can('read-user')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') color-8 @endif text-center">
                <a href="{{route('client.user.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه کاربران</a>
            </div>
        @endcan
    </div>
    @endcanany
    @canany(['read-role','create-role'])
        <div class="mt-3 menu-dropdown" id="menu-4"><img src="/website/icon/role.png" alt="نقش" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">نقش</span><img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdown-menu @if($minipanel) d-none @endif icon-dropdowm-4 width-20" alt=""></div>
    <div id="dropdown-4" class="dropdown @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index' && !$minipanel) active @endif @if($minipanel) position-absolute bg-white border border-dark rounded-3 @endif" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.role.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.role.create' || $minipanel)  style="display: none;" @endif>
        @can('create-role')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create') color-8 @endif text-center">
                <a href="{{route('client.role.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن نقش جدید</a>
            </div>
        @endcan
        @can('read-role')
            <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') color-8 @endif text-center">
                <a href="{{route('client.role.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه نقش ها</a>
            </div>
        @endcan
    </div>
    @endcanany
    @canany(['read-gallery','create-gallery'])
        <div class="mt-3 menu-dropdown" id="menu-5"><img src="/website/icon/gallery.png" alt="گالری ها" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">گالری</span> <img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdown-menu @if($minipanel) d-none @endif icon-dropdowm-5 width-20" alt=""></div>
        <div id="dropdown-5" class="dropdown @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index' && !$minipanel) active @endif @if($minipanel) position-absolute bg-white border border-dark rounded-3 @endif" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.gallery.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.gallery.create' || $minipanel)  style="display: none;" @endif>
            @can('create-gallery')
                <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create') color-8 @endif text-center">
                    <a href="{{route('client.gallery.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن گالری جدید</a>
                </div>
            @endcan
            @can('read-gallery')
                <div class="p-1 me-4 m-3 rounded @if(!$minipanel) col-xl-9 @endif color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') color-8 @endif text-center">
                    <a href="{{route('client.gallery.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه گالری ها</a>
                </div>
            @endcan
        </div>
    @endcanany
    <div class="mt-3">
        <a href="{{route('client.save.index')}}" class="text-decoration-none text-dark">
            <img src="/website/icon/save.png" alt="پست های ذخیره شده" class="width-20"><span class="option_panel @if($minipanel) d-none @endif">پست های ذخیره شده</span>
        </a>
    </div>

    <div class="mt-3">
        <a href="{{route('client.mysupport.index')}}" class="text-decoration-none text-dark">
            <img src="/website/icon/support.png" alt="پشتیبانی" class="width-20"><span class="option_panel @if($minipanel) d-none @endif">پشتیبانی</span>
        </a>
    </div>

    @can('read-support')
        <div class="mt-3">
            <a href="{{route('client.support.index')}}" class="text-decoration-none text-dark">
                <img src="/website/icon/support1.png" alt="لیست درخواست های پشتیبانی" class="width-20"><span class="option_panel @if($minipanel) d-none @endif">لیست درخواست های پشتیبانی</span>
            </a>
        </div>
    @endcan


    <div class="mt-3"><a href="/" class="text-decoration-none text-dark"><img src="/website/icon/back.png" alt="بازگشت به سایت" class="width-20"><span class="option_panel @if($minipanel) d-none @endif">بازگشت به سایت</span></a></div>

    <div class="mt-3">
        <form action="{{route('website.logout')}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-dark btn p-0"><img src="/website/icon/logout.png" alt="بازگشت به سایت" class="width-25"><span class="option_panel @if($minipanel) d-none @endif">خروج از حساب کاربری</span></button>
        </form>
    </div>
</div>
