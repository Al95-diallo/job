@if($packages->count())

<div class="paypackages"> 

    <!---four-paln-->

    <div class="four-plan">

        <h3>{{__('Forfait de mise à niveau')}}</h3>

        <div class="row"> @foreach($packages as $package)

            <div class="col-md-4 col-sm-6 col-xs-12">

                <ul class="boxes">

                    <li class="plan-name">{{$package->package_title}}</li>

                    <li>

                        <div class="main-plan">
                            <div class="plan-price1-2">{{$package->package_price}}</div>
                            <div class="plan-price1-1">GNF</div>
                            <div class="clearfix"></div>

                        </div>

                    </li>

                    <li class="plan-pages">{{__('Peut publier des offres d\'emploi')}} : {{$package->package_num_listings}}</li>

                    <li class="plan-pages">{{__('Durée du forfait')}} : {{$package->package_num_days}} {{__('jours')}}</li>

                    <li class="order paypal"><a href="javascript:void(0)" data-toggle="modal" data-target="#buypack{{$package->id}}" class="reqbtn">{{__('Acheter maintenant')}}</a></li>

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
			
		<div class="totalpay">{{__('Montant total à payer')}}: <strong>{{$package->package_price}}</strong></div>
			
		<ul class="btn2s">
		@if((bool)$siteSetting->is_paypal_active)
		<li class="order paypal"><a href="{{route('order.upgrade.package', $package->id)}}"><i class="fa fa-cc-paypal" aria-hidden="true"></i> {{__('Paypal')}}</a></li>
		@endif
		@if((bool)$siteSetting->is_stripe_active)
		<li class="order"><a href="{{route('stripe.order.form', [$package->id, 'upgrade'])}}"><i class="fa fa-cc-stripe" aria-hidden="true"></i> {{__('Stripe')}}</a></li>
		@endif
		@if((bool)$siteSetting->is_payu_active)
		   <li class="order payu"><a href="{{route('payu.order.package', ['package_id='.$package->id, 'type=upgrade'])}}">{{__('PayU')}}</a></li>
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

@endif