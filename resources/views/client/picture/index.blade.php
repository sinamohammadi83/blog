@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0">
        @can('create-picture')
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">
                    <form action="{{route('client.picture.store',$gallery)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">عکس</label>
                            <input type="file" name="image" class="col-12" id="" >
                        </div>
                        <div class="form-group text-start mt-5">
                            <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="افزودن">
                        </div>
                    </form>
                </div>
            </div>
        @endcan
        @foreach($gallery->pictures as $picture)
            <div class="col-xl-5 col-lg-6 col-md-6 col-sm-9 col-11 m-2 float-start color-5 rounded-7 p-3">
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mx-auto my-2">
                    <img src="{{str_replace('public','/storage',$picture->image)}}" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rounded-7" alt="">
                </div>
                <div>
                    <input type="text" id="text-{{$picture->id}}" class="form-control" value="{{str_replace('public','/storage',$picture->image)}}">
                    <input type="button" id="{{$picture->id}}" class="btn btn-secondary btn-copy mt-3 col-12" value="کپی لینک تصویر">
                </div>
                @can('delete-picture')
                    <div class="mt-3 rounded-7 color-7 ">
                        <form action="{{route('client.picture.destroy',['picture' => $picture , 'gallery' => $gallery])}}" method="post">
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

@section('js')
    <script src="/client/js/picture.js"></script>
@endsection
