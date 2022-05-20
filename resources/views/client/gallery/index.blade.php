@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center pt-5 col-12 pt-lg-0">
        <h3 class="text-end p-2">لیست همه گالری ها</h3>
        @foreach($user as $gallery)
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
                <div class="bg-white p-3 rounded-7">
                    <div>
                        <div>عنوان گالری:
                            <div>
                                {{$gallery->title}}
                            </div>
                        </div>
                        <hr>
                        <div>تعداد عکس:
                            <div>
                                {{$gallery->pictures_count}}
                            </div>
                        </div>
                    </div>
                    @can('read-picture')
                        <div class="mt-3 rounded-7 bg-info p-1">
                            <a href="{{route('client.picture.index',$gallery)}}" class="text-decoration-none text-white rounded-7"><img src="/website/icon/view.png" class="icon-view ms-1">مشاهده</a>
                        </div>
                    @endcan
                    @can('update-gallery')
                        <div class="mt-3 rounded-7 color-6 p-1">
                            <a href="{{route('client.gallery.edit',$gallery)}}" class="text-decoration-none text-dark" ><img src="/website/icon/edit.png" class="icon-edit" alt="ویرایش">ویرایش</a>
                        </div>
                    @endcan
                    @can('delete-gallery')
                        <div class="mt-3 rounded-7 color-7 ">
                            <form action="{{route('client.gallery.destroy',$gallery)}}" method="post">
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
            </div>
        @endforeach

    </div>

@endsection
