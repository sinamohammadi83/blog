@extends('client.layout.master')



@section('content')

    <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h3 class="p-3 text-center text-lg-end">ایجاد دسته بندی جدید</h3>
        <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-10 col-12 pt-5">
            <form action="{{route('client.category.store')}}" method="post" class="pt-5">
                @csrf
                <div class="form-group mt-3">
                    <label for="">عنوان دسته بندی</label>
                    <input type="text" name="title" class="form-control" id="">
                </div>
                <div class="form-group mt-3">
                    <label for="">دسته والد</label>
                    <select type="text" name="category" class="form-control" id="">
                        <option selected disabled>-- دسته والد را انتخاب کنید --</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group text-start mt-5">
                    <input type="submit" class="color-8 border-0 px-3 py-2 rounded shadow text-white" value="ثبت">
                </div>
            </form>
        </div>
    </div>

@endsection
