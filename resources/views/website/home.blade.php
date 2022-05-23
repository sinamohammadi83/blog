@extends('website.layout.master')


@section('content')

    <section class="section">
    <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">پست های جدید</h2>
    <livewire:website.new-post />
    <h2 class="new-post col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12 text-center mx-auto shadow-lg rounded-3 p-xl-2 p-2 mt-3">پست های محبوب</h2>
    <livewire:website.popular-post />
</section>

@endsection
