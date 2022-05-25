@extends('client.layout.master')

@section('css')
    <link rel="stylesheet" href="/client/css/post.css">
    <link rel="stylesheet" href="/client/css/comment.css">
@endsection

@section('content')

    <div class="d-inline-block text-center col-12 pt-5 pt-lg-0">
        <h3 class="text-end p-3 ">نظرات پست {{$post->title}}</h3>
        <livewire:client.post.comment :post="$post" />
    </div>

@endsection

@section('js')
    <script src="/client/js/comment.js"></script>
@endsection

