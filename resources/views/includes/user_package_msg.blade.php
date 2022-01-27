<div class="instoretxt">
    <div class="credit">{{__('Votre forfaits est')}}: <strong>{{$package->package_title}} - {{$package->package_price}}GNF</strong></div>
    <div class="credit">{{__('Durée de forfaits')}} : <strong>{{Auth::user()->package_start_date->format('d M, Y')}}</strong> - <strong>{{Auth::user()->package_end_date->format('d M, Y')}}</strong></div>
    <div class="credit">{{__('Quota Valide')}} : <strong>{{Auth::user()->availed_jobs_quota}}</strong> / <strong>{{Auth::user()->jobs_quota}}</strong></div>

</div>
