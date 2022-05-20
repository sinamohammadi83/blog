@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-3 text-center text-lg-end">پشتیبانی</h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-10 col-12 pt-5">
            <form action="{{route('client.mysupport.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="">عنوان</label>
                    <input type="text" name="title" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">پیام</label>
                    <textarea type="text" name="message" id="editor1" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group text-start mt-5">
                    <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="ثبت">
                </div>
            </form>
        </div>
    </div>


@endsection

@section('js')
    <script src="/website/js/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection
