@if(!Auth::user() && !Auth::guard('company')->user())
<div class="emploginbox">
	<div class="container">		
		<div class="titleTop">
			<div class="subtitle">{{__('Cherchez-vous des candidats!')}}</div>
           <h3>{{__('Publiez une offre d\'emploi aujourd\'hui')}}  </h3>
			<h4>{{__('et embauchez les bons candidats')}}</h4>
        </div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel felis ut, vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod suscipit. Sed at libero ante. Vestibulum nec odio lacus.</p>
		<div class="viewallbtn"><a href="{{route('register')}}">{{__('Publier une offre')}}</a></div>
	</div>
</div>
@endif