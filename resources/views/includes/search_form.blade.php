@if(Auth::guard('company')->check())
<h3 class="seekertxt">{{__('Découvrez nos conseils pour trouver du travail en Guinée avec Guinéewally')}}. <span>{{__('Rechercher des demandeurs d\'emploi aujourd\'hui')}}.</span></h3>
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox seekersrch">		
		<div class="input-group">
		  <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Entrez les compétences ou les détails du demandeur d\'emploi')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Chercher un demandeur d\'emploi')}}">
		  </span>
		</div>
		</div>
		
       
        
    </div>
</form>
@else
<h3>{{__('Découvrez tous les services que nous offrons aux entreprise qui travail avec Guinéewally')}}. <span>{{__('Commencez le vôtre aujourd\'hui')}}.</span></h3>
<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<label for=""> {{__('Mots-clés / Titre du poste')}}</label>
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Entrez les compétences ou le titre du poste')}}" autocomplete="off" /></div>
			<div class="col-lg-3 col-md-4">
				<label for="">&nbsp;</label>
				<input type="submit" class="btn" value="{{__('Rechercher')}}"></div>
		</div>
				
		<div class="srcsubfld additional_fields">
			<div class="row">
        <div class="col-lg-{{((bool)$siteSetting->country_specific_site)? 6:3}}">
			<label for="">{{__('Sélectionnez la zone fonctionnelle')}}</label>
            {!! Form::select('functional_area_id[]', ['' => __('Sélectionnez la zone fonctionnelle')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        </div>

        @if((bool)$siteSetting->country_specific_site)
        {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
        @else
        <div class="col-lg-3">
			<label for="">{{__('Selectioner le pays')}}</label>
            {!! Form::select('country_id[]', ['' => __('Selectioner le pays')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
        </div>
        @endif

        <div class="col-lg-3">
			<label for="">{{__('Selectionnez la Region')}}</label>
            <span id="state_dd">
                {!! Form::select('state_id[]', ['' => __('Selectionnez la Region')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
            </span>
        </div>
        <div class="col-lg-3">
			<label for="">{{__('ville')}}</label>
            <span id="city_dd">
                {!! Form::select('city_id[]', ['' => __('Selectioner la ville')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
            </span>
        </div>
		</div>
		</div>	
			
			
			
		</div>
      
		
		
		
		
    </div>
</form>
@endif