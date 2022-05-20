@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
@endsection

@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <h3 class="p-3 text-center text-lg-end">ایجاد پست جدید</h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-10 col-12 pt-5">
            <form action="{{route('client.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="">عنوان پست</label>
                    <input type="text" name="title" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">دسته بندی</label>
                    <select name="category" class="form-control" id="">
                        <option selected disabled>-- دسته بندی مرد نظر خود را انتخاب کنید --</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="">عکس شاخص</label>
                    <input type="file" name="image" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">محتوا</label>
                    <textarea type="text" name="content" id="editor1" rows="8" class="form-control"></textarea>
                </div>
                <div class="form-group mt-5">
                    <div>
                        <label for="">نظرات</label>
                    </div>
                    <label for="">غیر فعال</label>
                    <input type="checkbox" checked class="newcheckbox" name="comment">
                    <label for=""> فعال</label>
                </div>
                <div class="form-group mt-5">
                    <div>
                        <label for="">وضعیت</label>
                    </div>
                    <label for="">غیر فعال</label>
                    <input type="checkbox" class="newcheckbox" name="published">
                    <label for=""> فعال</label>
                    <div class="font-13 p-2">با غیر فعال کردن این گزینه پست شما نمایش داده نمی شود</div>
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
