<ul class="row profilestat">
    <li class="col-md-4 col-6">
        <div class="inbox"> <i class="fa fa-clock-o" aria-hidden="true"></i>
            <h6><a href="{{route('posted.jobs')}}">{{Auth::guard('company')->user()->countOpenJobs()}}</a></h6>
            <strong>{{__('Emplois ouverts')}}</strong> </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox"> <i class="fa fa-user-o" aria-hidden="true"></i>
            <h6><a href="{{route('company.followers')}}">{{Auth::guard('company')->user()->countFollowers()}}</a></h6>
            <strong>{{__('Suiveurs')}}</strong> </div>
    </li>
    <li class="col-md-4 col-6">
        <div class="inbox"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <h6><a href="{{route('company.messages')}}">{{Auth::guard('company')->user()->countCompanyMessages()}}</a></h6>
            <strong>{{__('Messages')}}</strong> </div>
    </li> 
</ul>