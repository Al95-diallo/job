<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		<div class="row srcsubfld additional_fields">
        <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 6:3}}">
            {!! Form::select('functional_area_id[]', ['' => __('Sélectionnez la zone fonctionnelle')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        </div>

        @if((bool)$siteSetting->country_specific_site)
        {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
        @else
        <div class="col-md-3">
            {!! Form::select('country_id[]', ['' => __('Selectionnez le pays')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
        </div>
        @endif

        <div class="col-md-3">
            <span id="state_dd">
                {!! Form::select('state_id[]', ['' => __('Selectionez la Région')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
            </span>
        </div>
        <div class="col-md-3">
            <span id="city_dd">
                {!! Form::select('city_id[]', ['' => __('Selectionnez la ville')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
            </span>
        </div>
		</div>
		
		
		<div class="input-group">
		  <input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Entrez les compétences ou le titre du poste')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Rechercher')}}">
		  </span>
		</div>
		</div>
      
		
		
		
		
    </div>
</form>