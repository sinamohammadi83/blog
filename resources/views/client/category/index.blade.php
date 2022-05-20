@extends('client.layout.master')

@section('css')

    <link rel="stylesheet" href="/client/css/post.css">

@endsection

@section('content')

    <div class="text-center pt-5 pt-lg-0 ">
        <h3 class="text-end p-2">لیست همه دسته بندی ها</h3>
        @foreach($categories as $category)
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-md-start color-5 rounded-7 p-3">
                <div class="text-center">
                    عنوان دسته بندی:
                    <div>{{$category->title}}</div>
                </div>
                <div class="text-center m-3">
                    دسته والد:
                    <div>{{optional($category->category)->title}}</div>
                </div>
                @can('update-category')
                    <div class="mt-3 rounded-7 color-6 p-1">
                        <a href="{{route('client.category.edit',$category)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                    </div>
                @endcan
                @can('delete-category')
                    <div class="mt-3 rounded-7 color-7">
                        <form action="{{route('client.category.destroy',$category)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-decoration-none text-dark color-7 border-0 text-white py-1" type="submit">
                                <img src="/website/icon/delete.png" class="icon-delete " alt="حذف">
                                حذف
                            </button>
                        </form>
                    </div>
                @endcan
            </div>
        @endforeach
    </div>

@endsection
