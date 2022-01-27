<div class="paypackages"> 
    <!---four-paln-->
    <div class="four-plan">
        <h3>{{__('Nos forfaits')}}</h3>
        <div class="row"> @foreach($packages as $package)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="boxes">
                    <li class="plan-name">{{$package->package_title}}</li>
                    <li>
                        <div class="main-plan">
                            <div class="plan-price1-2">{{$package->package_price}}</div>
                            <div class="plan-price1-1">{{ $siteSetting->default_currency_code }}</div>

                            <div class="clearfix"></div>
                        </div>
                    </li>
                    <li class="plan-pages">{{__('Peut publier des offres')}} : {{$package->package_num_listings}}</li>
                    <li class="plan-pages">{{__('Durée du forfait')}} : {{$package->package_num_days}} {{__('jours')}}</li>           
					
					<li class="order paypal"><a href="javascript:void(0)" data-toggle="modal" data-target="#buypack{{$package->id}}" class="reqbtn">{{__('Achecher maintenant')}}</a></li>
					
                    
                </ul>
				
				
				<div class="modal fade" id="buypack{{$package->id}}" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<div class="modal-body">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<i class="fa fa-times"></i>
		</button>
		<div class="invitereval">
		<h3>Veuillez choisir votre mode de paiement pour payer</h3>	
			
		<div class="totalpay">{{__('Montant total à payer est')}}: <strong>{{$package->package_price}}</strong></div>
			
		<ul class="btn2s">
		@if($package->package_price > 0)                        
		@if((bool)$siteSetting->is_paypal_active)
		<li class="order paypal"><a href="{{route('order.package', $package->id)}}"><i class="fa fa-cc-paypal" aria-hidden="true"></i> {{__('payer avec paypal')}}</a></li>
		@endif
		@if((bool)$siteSetting->is_stripe_active)
		<li class="order"><a href="{{route('stripe.order.form', [$package->id, 'new'])}}"><i class="fa fa-cc-stripe" aria-hidden="true"></i> {{__('payer avec stripe')}}</a></li>
		@endif

		@if((bool)$siteSetting->is_payu_active)
		   <li class="order payu"><a href="{{route('payu.order.package', ['package_id='.$package->id, 'type=new'])}}">{{__('payer avec PayU')}}</a></li>
		@endif
                        
		@else
		<li class="order paypal"><a href="{{route('order.free.package', $package->id)}}"> {{__('Abonnez-vous au forfait gratuit')}}</a></li>
		@endif
		</ul>
		</div>
		</div>
		</div>
		</div>
		</div>
				
				
            </div>
            @endforeach </div>
    </div>
    <!---end four-paln--> 
</div>
