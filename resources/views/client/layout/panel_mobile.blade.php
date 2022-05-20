<div style="background-color: rgba(0, 0, 0, 0.534);position: fixed;width: 100%;height: 100%;top: 0;z-index: 1;" class="col-12 background-menu d-none">
    <div class="float-start m-3 close-menu"><img src="/website/icon/close.png" alt="بستن"></div>
    <div class="color-10 col-md-12 m-2 d-inline-block p-2 py-5 rounded-3 overflow-scroll h-100 menu" style="width: 0px;z-index: 2;">
        <div class="text-center mt-3">
            <img src="{{$authUser->ImagePath}}" class="col-xl-5 col-lg-5 col-md-7 col-sm-7 col-6 rounded-circle" alt="">
        </div>
        <div class="text-center p-2 col-xl-12">{{$authUser->name}} {{$authUser->family}}</div>
        <div class="mt-5"><a href="{{route('client.home')}}" class="text-decoration-none text-dark"><img src="/website/icon/home.png" alt="صفحه اصلی" class="width-30">صفحه اصلی</a></div>
        <div class="mt-3 p-1 rounded @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.profile.edit') color-8 @endif"><a href="{{route('client.profile.edit')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.profile.edit') text-white @endif text-dark"><img src="/website/icon/edit-profile.png" alt="ویرایش اطلاعات کاربری" class="width-25">ویرایش اطلاعات کاربری</a></div>
        @canany(['read-post','create-post','read-self-post'])
            <div class="mt-3 menu-dropdown-sm" id="menu-1"><img src="/website/icon/post.png" alt="پست" class="width-25">پست<img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdowm-1 width-20" alt=""></div>
            <div id="dropdown-sm-1" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.post.create' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.post.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.myposts.index')  style="display: none;" @endif>
                @can('read-self-post')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') color-8 @endif text-center">
                        <a href="{{route('client.myposts.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.myposts.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست پست های من</a>
                    </div>
                @endcan
                @can('create-post')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create') color-8 @endif text-center">
                        <a href="{{route('client.post.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.create') text-white @endif  text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن پست جدید</a>
                    </div>
                @endcan
                @can('read-post')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index') color-8 @endif text-center">
                        <a href="{{route('client.post.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.post.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه پست ها</a>
                    </div>
                @endcan
            </div>
        @endcanany
        @canany(['read-category','create-category'])
            <div class="mt-3 menu-dropdown-sm" id="menu-2"><img src="/website/icon/categories.png" alt="دسته بندی" class="width-25">دسته بندی<img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdowm-2 width-20" alt=""></div>
            <div id="dropdown-sm-2" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.category.create' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.category.index')  style="display: none;" @endif>
                @can('create-category')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create') color-8 @endif text-center">
                        <a href="{{route('client.category.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن دسته بندی جدید</a>
                    </div>
                @endcan
                @can('read-category')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') color-8 @endif text-center">
                        <a href="{{route('client.category.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.category.index') text-white @endif text-dark"><img src="/website/icon/list.png" class="width-25" alt="">لیست همه دسته بندی ها</a>
                    </div>
                @endcan
            </div>
        @endcanany
        @canany(['read-user','create-user'])
            <div class="mt-3 menu-dropdown-sm" id="menu-3"><img src="/website/icon/user.png" alt="کاربران" class="width-25">کاربران<img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdowm-3 width-20" alt=""></div>
            <div id="dropdown-sm-3" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.user.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.user.create')  style="display: none;" @endif>
                @can('create-user')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create') color-8 @endif text-center">
                        <a href="{{route('client.user.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن کاربر جدید</a>
                    </div>
                @endcan
                @can('read-user')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') color-8 @endif text-center">
                        <a href="{{route('client.user.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.user.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه کاربران</a>
                    </div>
                @endcan
            </div>
        @endcanany
        @canany(['read-role','create-role'])
            <div class="mt-3 menu-dropdown-sm" id="menu-4"><img src="/website/icon/role.png" alt="نقش ها" class="width-25">نقش ها<img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdowm-4 width-20" alt=""></div>
            <div id="dropdown-sm-4" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.role.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.role.create')  style="display: none;" @endif>
                @can('create-role')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create') color-8 @endif text-center">
                        <a href="{{route('client.role.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن نقش جدید</a>
                    </div>
                @endcan
                @can('read-role')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') color-8 @endif text-center">
                        <a href="{{route('client.role.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.role.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه نقش ها</a>
                    </div>
                @endcan
            </div>
        @endcanany
        @canany(['read-gallery','create-gallery'])
            <div class="mt-3 menu-dropdown-sm" id="menu-5"><img src="/website/icon/gallery.png" alt="گالری ها" class="width-25 ms-1">گالری <img src="/website/icon/icon_sort_down.png" @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create' || \Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') style="transform: rotate(180deg)" @endif class="float-start icon-dropdowm-5 width-20" alt=""></div>
            <div id="dropdown-sm-5" @if(\Illuminate\Support\Facades\Route::currentRouteName() != 'client.gallery.index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'client.gallery.create')  style="display: none;" @endif>
                @can('create-gallery')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create') color-8 @endif text-center">
                        <a href="{{route('client.gallery.create')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.create') text-white @endif text-dark"><img src="/website/icon/add.png" class="width-25" alt="">افزودن گالری جدید</a>
                    </div>
                @endcan
                @can('read-gallery')
                    <div class="p-1 me-4 m-3 rounded col-xl-9 color-4 @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') color-8 @endif text-center">
                        <a href="{{route('client.gallery.index')}}" class="text-decoration-none @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index') text-white @endif text-dark"><img src="@if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.gallery.index')/website/icon/active-list.png @else /website/icon/list.png @endif" class="width-25" alt="">لیست همه گالری ها</a>
                    </div>
                @endcan
            </div>
        @endcanany
        <div class="mt-2 p-1 rounded @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.save.index') color-8 @endif">
            <a href="{{route('client.save.index')}}" class="text-decoration-none text-dark @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.save.index') text-white @endif">
                <img src="/website/icon/save.png" alt="پست های ذخیره شده" class="width-20 ms-1">پست های ذخیره شده
            </a>
        </div>

        <div class="mt-2 p-1 rounded @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.mysupport.index') color-8 @endif">
            <a href="{{route('client.mysupport.index')}}" class="text-decoration-none text-dark">
                <img src="/website/icon/support.png" alt="پشتیبانی" class="width-20 ms-1">پشتیبانی
            </a>
        </div>

        @can('read-support')
            <div class="mt-2 p-1 rounded @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'client.support.index') color-8 @endif">
                <a href="{{route('client.support.index')}}" class="text-decoration-none text-dark">
                    <img src="/website/icon/support1.png" alt="لیست درخواست های پشتیبانی" class="width-20 ms-1">لیست درخواست های پشتیبانی
                </a>
            </div>
        @endcan

        <div class="mt-3"><a href="/" class="text-decoration-none text-dark"><img src="/website/icon/back.png" alt="بازگشت به سایت" class="width-20 ms-2">بازگشت به سایت</a></div>

        <div class="mt-3">
            <form action="{{route('website.logout')}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-dark btn p-0"><img src="/website/icon/logout.png" alt="بازگشت به سایت" class="width-25 ms-2">خروج از حساب کاربری</button>
            </form>
        </div>
    </div>
</div>
