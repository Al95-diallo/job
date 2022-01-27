<div class="instoretxt">
    <div class="credit">{{__('Votre forfait est')}}: <strong>{{$package->package_title}} - {{$package->package_price}}{{ $siteSetting->default_currency_code }}</strong></div>
    <div class="credit">{{__('Durée du forfait')}} : <strong>{{Auth::guard('company')->user()->package_start_date->format('d M, Y')}}</strong> - <strong>{{Auth::guard('company')->user()->package_end_date->format('d M, Y')}}</strong></div>
    <div class="credit">{{__('Quota disponible')}} : <strong>{{Auth::guard('company')->user()->availed_jobs_quota}}</strong> / <strong>{{Auth::guard('company')->user()->jobs_quota}}</strong></div>

</div>
