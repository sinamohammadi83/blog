@if($errors->all())
    <ul class="errors col-xl-12 col-12">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
