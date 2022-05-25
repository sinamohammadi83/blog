
<div class="news-letters float-start col-xl-6 col-lg-6 col-md-8 col-sm-12 ps-sm-5 col-12 text-end text-sm-center mt-sm-2 mt-5">
    <form method="post" class="text-sm-center pe-2">
        <input type="email" class="input-email-news col-xl-7 col-lg-10 col-md-7 col-sm-7 col-9" id="" placeholder="عضویت در خبرنامه" wire:model="email">
        <input type="button" value="عضویت" class="button-news " wire:click="subscribe()">
        <div class="tooltip-newsletter text-sm-center col-sm-12 text-md-center me-md-4 col-12 ">برای اطلاع از اخبار جدید ایمیل خود را برای عضویت وارد نمایید.</div>
    </form>
    @if ($errors->all())
        <div class="error-news-letters bg-danger col-9 mt-3 rounded p-2 text-white ms-5 float-start">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
    @if ($success)
        <div class="success-news-letters bg-success col-9 mt-3 rounded p-2 text-white ms-5 float-start">
            ایمیل با موفقیت ثبت شد
        </div>
    @endif
</div>

