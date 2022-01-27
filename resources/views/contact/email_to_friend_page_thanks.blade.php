@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Envoyer un e-mail à un ami')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="userccount">
                    <h5>{{__('merci')}}!</h5>
                    <p>{{__('Un e-mail a été envoyé à votre ami')}},<br /><br />{{ $siteSetting->site_name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection