<form action="{{route('job.list')}}" method="get">
	<!-- Page Title start -->
	<div class="pageSearch">
<div class="container">
				<div class="searchform">
					<div class="row">
						<div class="col-lg-9">
							<input type="text" name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Entrez les compétences, le titre du poste ou l\'emplacement')}}" />
						</div>

						<div class="col-lg-3">
							<button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> {{__('Rechercher')}}</button>
						</div>

					</div>
				</div>
</div>
	</div>
	<!-- Page Title end -->
</form>
