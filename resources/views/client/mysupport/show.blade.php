@extends('client.layout.master')



@section('content')
        <h4 class="p-2 ">لیست درخواست های پشتیبانی من</h4>
        <div class="shadow-lg rounded-7 col-10 text-white color-8 p-2 my-5 mx-auto">
            <div class="p-3">
                <img src="{{$startsupport->support->user->ImagePath}}" class="rounded-circle col-2" alt="">
                {{$startsupport->support->user->name}} {{$startsupport->support->user->family}}
            </div>
            <div class="p-3 ">عنوان : {{$startsupport->title}}</div>
            <div class="p-3 text-break">
                @php echo $startsupport->support->message @endphp
            </div>
        </div>
            @foreach($supports as $support)
                <div class="shadow-lg rounded-7 col-8  @if(auth()->user()->id == $support->user_send) color-9 float-start @else float-end @endif p-2 my-5">
                    <div class="p-3">
                        <img src="{{$support->user->ImagePath}}" class="rounded-circle col-2" alt="">
                        {{$support->user->name}} {{$support->user->family}}
                    </div>
                    <div class="p-3 text-break">
                        @php echo $support->message @endphp
                    </div>
                </div>
            @endforeach
        <div class="d-inline-block col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="mx-auto col-xl-9 col-lg-10 col-md-10 col-sm-10 col-12 pt-5">
                <form action="{{route('client.mysupport.reply',$startsupport)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="">پاسخ</label>
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
