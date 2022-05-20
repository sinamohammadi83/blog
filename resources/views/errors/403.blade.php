@extends('website.layout.master')



@section('content')

    <div class="row text-center my-5">
        <img src="/website/image/403.png" class="col-2 mt-5 mx-auto" alt="">
        <p class="p-5">{{$exception->getMessage()?:'ممنوع'}}</p>
    </div>

@endsection
