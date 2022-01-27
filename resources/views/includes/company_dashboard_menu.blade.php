<div class="col-md-3 col-sm-4">
	<div class="usernavwrap">
    <ul class="usernavdash">
        <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}"><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Tableau de bord')}}</a></li>
        <li class="{{ Request::url() == route('company.profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{__('Editer le Profile')}}</a></li>
        <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Profile public de l\'entreprise')}}</a></li>
        <li class="{{ Request::url() == route('post.job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Publier une emploi')}}</a></li>
        <li class="{{ Request::url() == route('posted.jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}"><i class="fa fa-black-tie" aria-hidden="true"></i> {{__('emplois en entreprise')}}</a></li>

        <li class="{{ Request::url() == route('company.packages') ? 'active' : '' }}"><a href="{{ route('company.packages') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Forfaits de récherche de CV')}}</a></li>
        
        <li class="{{ Request::url() == route('company.unloced-users') ? 'active' : '' }}"><a href="{{ route('company.unloced-users') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Utilisateurs dévérrouillés')}}</a></li>

        <li class="{{ Request::url() == route('company.messages') ? 'active' : '' }}"><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Messages de l\'entreprise')}}</a></li>
        <li class="{{ Request::url() == route('company.followers') ? 'active' : '' }}"><a href="{{route('company.followers')}}"><i class="fa fa-users" aria-hidden="true"></i> {{__('Abonnés de l\'entreprise')}}</a></li>
        <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Se déconnecter')}}</a>
            <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
	</div>
    <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
</div>