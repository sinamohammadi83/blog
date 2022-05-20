@extends('client.layout.master')



@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="p-3 text-center text-lg-end">ویرایش گالری {{$gallery->title}}</h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-10 col-12 pt-5">
            <form action="{{route('client.gallery.update',$gallery)}}" method="post" class="pt-5">
                @csrf
                @method('PATCH')
                <div class="form-group mt-3">
                    <label for="">عنوان گالری</label>
                    <input type="text" name="title" value="{{$gallery->title}}" class="form-control" id="">
                </div>
                <div class="form-group text-start mt-5">
                    <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="ثبت">
                </div>
            </form>
        </div>
    </div>

@endsection
