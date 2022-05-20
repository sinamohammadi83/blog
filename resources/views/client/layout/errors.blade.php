@if($errors->all())
    <ul class="errors mx-auto col-xl-10 col-lg-10 col-12">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
