@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Authentification')])
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
                            <div class="socialLogin">
                                        <h5>{{__('Connectez-vous avec les réseaux sociaux')}}</h5>
                                        <a href="{{ url('login/jobseeker/facebook')}}" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="{{ url('login/jobseeker/twitter')}}" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                <div class="formpanel">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Adresse e-mail')}}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('mot de passe')}}">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>            
                                    <input type="submit" class="btn" value="{{__('Se connecter')}}">
                                </div>
                                <!-- login form  end--> 
                            </form>
                            <!-- sign up form -->
                    <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Nouvel utilisateur')}}? <a href="{{route('register')}}">{{__('Inscrivez-vous')}}</a></div>
                    <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Mot de passe oublié')}}? <a href="{{ route('password.request') }}">{{__('Cliquez ici')}}</a></div>
                    <!-- sign up form end-->
                        </div>
                        <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active':''}}">
                            <div class="socialLogin">
                                        <h5>{{__('Connectez-vous avec les réseaux sociaux')}}</h5>
                                        <a href="{{ url('login/employer/facebook')}}" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="{{ url('login/employer/twitter')}}" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>
                            <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="employer" />
                                <div class="formpanel">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('adresse e-mail')}}">
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('mot de passe')}}">
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>            
                                    <input type="submit" class="btn" value="{{__('Se connecter')}}">
                                </div>
                                <!-- login form  end--> 
                            </form>
                            <!-- sign up form -->
                    <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('Nouvel Utilisateur')}}? <a href="{{route('register')}}">{{__('Inscrivez-vous')}}</a></div>
                    <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> {{__('mot de passe oublié')}}? <a href="{{ route('company.password.request') }}">{{__('Cliquez ici')}}</a></div>
                    <!-- sign up form end-->
                        </div>
                    </div>
                    <!-- login form -->

                     

                </div>
            </div>
        
    </div>
</div>
@include('includes.footer')
@endsection
