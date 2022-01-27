@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Contactez-nous')])
<!-- Inner Page Title end -->
<div class="inner-page">
    <div class="container">
        <div class="contact-wrap">
            <div class="title"> <span>&nbsp;</span>
                <h2>{{__('Merci d\'être génial')}}</h2>
                <p>{{__('Nous avons bien reçu votre message et vous remercions de nous avoir écrit. Si votre demande est urgente, veuillez utiliser le numéro de téléphone pour parler à l\'un de nos membres du personnel. Sinon, nous vous répondrons par email dans les plus brefs délais')}}<br /><br />
                    {{__('A bientôt')}}<br />
                    {{ $siteSetting->site_name }}</p>
            </div>      
        </div>
    </div>
</div>
@include('includes.footer')
@endsection