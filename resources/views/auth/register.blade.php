@extends('layouts.app')

@section('content') 

<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> 

<!-- Inner Page Title start --> 

@include('includes.inner_page_title', ['page_title'=>__('Inscription')]) 

<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
           <div class="useraccountwrap">

                <div class="userccount">

                    <div class="userbtns">

                        <ul class="nav nav-tabs">

                            <?php

                            $c_or_e = old('candidate_or_employer', 'candidate');

                            ?>

                            <li class="nav-item"><a class="nav-link {{($c_or_e == 'candidate')? 'active':''}}" data-toggle="tab" href="#candidate" aria-expanded="true">{{__('Candidat')}}</a></li>

                            <li class="nav-item"><a class="nav-link {{($c_or_e == 'employer')? 'active':''}}" data-toggle="tab" href="#employer" aria-expanded="false">{{__('Employeur')}}</a></li>

                        </ul>

                    </div>

                    <div class="tab-content">

                        <div id="candidate" class="formpanel tab-pane {{($c_or_e == 'candidate')? 'active':''}}">

                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="candidate" />

                                <div class="formrow{{ $errors->has('first_name') ? ' has-error' : '' }}">

                                    <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('Votre prénom')}}" value="{{old('first_name')}}">

                                    @if ($errors->has('first_name')) <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('middle_name') ? ' has-error' : '' }}">

                                    <input type="text" name="middle_name" class="form-control" placeholder="{{__('Deuxiéme nom')}}" value="{{old('middle_name')}}">

                                    @if ($errors->has('middle_name')) <span class="help-block"> <strong>{{ $errors->first('middle_name') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('last_name') ? ' has-error' : '' }}">

                                    <input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Nom')}}" value="{{old('last_name')}}">

                                    @if ($errors->has('last_name')) <span class="help-block"> <strong>{{ $errors->first('last_name') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('mot de passe')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Confirmer le mot de passe')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif </div>

                                    

                                    <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

    <?php

	$is_checked = '';

	if (old('is_subscribed', 1)) {

		$is_checked = 'checked="checked"';

	}

	?>

                                    

<input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
{{__('Abonnez-vous à la Newsletter')}}

@if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif </div>
<div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

<input type="checkbox" value="1" name="terms_of_use" />

<a href="{{url('cms/terms-of-use')}}">{{__('J’accepte les conditions d’utilisation')}}</a>
@if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>

<!-- <div
class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
{!! app('captcha')->display() !!}
@if ($errors->has('g-recaptcha-response')) <span class="help-block">
    <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
</div> -->

<input type="submit" class="btn" value="{{__('Enregistrer')}}">

                            </form>

                        </div>

                        <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active':''}}">

                            <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">

                                {{ csrf_field() }}

                                <input type="hidden" name="candidate_or_employer" value="employer" />

                                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                                    <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Nom')}}" value="{{old('name')}}">

                                    @if ($errors->has('name')) <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Mot de passe')}}" value="">

                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>

                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                    <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Confirmé le mot de passe')}}" value="">

                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif </div>

                                    <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

    <?php

	$is_checked = '';

	if (old('is_subscribed', 1)) {

		$is_checked = 'checked="checked"';

	}

	?>

                                    

                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                                    {{__('Abonnez-vous à la Newsletter')}}

                                    @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif </div> 

                                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                                    <input type="checkbox" value="1" name="terms_of_use" />

                                    <a href="{{url('terms-of-use')}}">{{__(' J’accepte les conditions d’utilisation')}}</a>



                                    @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>

                            <!-- <div
                                    class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div> -->

                                <input type="submit" class="btn" value="{{__('Enregistrer')}}">

                            </form>

                        </div>

                    </div>

                    <!-- sign up form -->

                    <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Vous avez un compte')}}? <a href="{{route('login')}}">{{__('connectez-vous')}}</a></div>

                    <!-- sign up form end--> 



                </div>

            </div>

        

    </div>

</div>

@include('includes.footer')

@endsection 