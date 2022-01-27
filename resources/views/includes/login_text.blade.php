
<div class="userloginbox">
	<div class="container">		
		<div class="titleTop">
           <h3>{{__('Est ce que vous cherchez un emploi!')}} </h3>
        </div>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nunc ex, maximus vel felis ut, vestibulum tristique enim. Proin eu nulla est. Maecenas tempor euismod suscipit. Sed at libero ante. Vestibulum nec odio lacus.</p>
		
		@if(!Auth::user() && !Auth::guard('company')->user())
		<div class="viewallbtn"><a href="{{route('register')}}"> {{__('Commencer aujourd\'hui')}} </a></div>
		@else
		<div class="viewallbtn"><a href="{{url('my-profile')}}">{{__('Construisez votre CV')}} </a></div>
		@endif
	</div>
</div>
