@extends('partials.app')

@section('page-contents')
<div class="terms-area bg-default-7">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-11">
        <div class="section-title text-center">
            <h2 class="section-title__heading">Terms &amp;
            Conditions</h2>
        </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xxl-8 col-xl-9 col-lg-10">
        <div class="terms-content">
            {!! \App\Models\Page::findItem('terms')->content !!}
        </div>
        </div>
    </div>
    </div>
</div>
@endsection
