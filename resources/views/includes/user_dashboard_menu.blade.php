<div class="col-lg-3">
	<div class="usernavwrap">
    <div class="switchbox">
        <div class="txtlbl">{{__('Disponible immédiatement')}} <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="{{__('Êtes-vous disponible immédiatement')}}?" data-original-title="{{__('Êtes-vous disponible immédiatement')}}?" title="{{__('Êtes-vous disponible immédiatement')}}?"></i>
        </div>
        <div class="">
            <label class="switch switch-green"> @php
                $checked = ((bool)Auth::user()->is_immediate_available)? 'checked="checked"':'';
                @endphp
                <input type="checkbox" name="is_immediate_available" id="is_immediate_available" class="switch-input" {{$checked}} onchange="changeImmediateAvailableStatus({{Auth::user()->id}}, {{Auth::user()->is_immediate_available}});">
                <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>
        </div>
        <div class="clearfix"></div>
    </div>
    <ul class="usernavdash">
        <li class="{{ Request::url() == route('home') ? 'active' : '' }}"><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Tableau de bord')}}</a>
        </li>
        <li class="{{ Request::url() == route('my.profile') ? 'active' : '' }}"><a href="{{ route('my.profile') }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{__('Editer le Profile')}}</a>
        </li>
        <li><a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('Voir le Profile Public ')}}</a>
        </li>
        <li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}"><a href="{{ route('my.job.applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Mes Candidatures ')}}</a>
        </li>
        <li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}"><a href="{{ route('my.favourite.jobs') }}"><i class="fa fa-heart" aria-hidden="true"></i> {{__('Mes emplois préférés')}}</a>
        </li>
        <li class="{{ Request::url() == route('my-alerts') ? 'active' : '' }}"><a href="{{ route('my-alerts') }}"><i class="fa fa-bullhorn" aria-hidden="true"></i> {{__('Mes alerts d\'emplois')}}</a>
        </li>
        <li><a href="{{url('my-profile#cvs')}}"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Gérer le CV')}}</a>
        </li>
        <li class="{{ Request::url() == route('my.messages') ? 'active' : '' }}"><a href="{{route('my.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Mes Messages')}}</a>
        </li>
        <li class="{{ Request::url() == route('my.followings') ? 'active' : '' }}"><a href="{{route('my.followings')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('Mes Suiveurs')}}</a>
        </li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('se déconnecter')}}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
		</div>
    <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
		
</div>