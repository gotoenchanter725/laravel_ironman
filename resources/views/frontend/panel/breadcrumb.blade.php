<!-- .breadcumb-area start -->
<div class="breadcumb-area ptb-100"
style="background: url({{ asset('uploads/category_photos') }}/1.jpg) no-repeat center center / cover;"
>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>{{ $pageName }}</h2>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><span>{{ $pageTitle }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->