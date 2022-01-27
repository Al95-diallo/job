@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__($page_title)]) 
<?php $true = FALSE; ?>

<?php 
if(Auth::guard('company')->user()){
$package = Auth::guard('company')->user();
if(null!==($package)){
    $array_ids = explode(',',$package->availed_cvs_ids);
    if(in_array($user->id, $array_ids)){
        $true = TRUE;
    }
}
}
?>
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">  
        @include('flash::message')  
        

		<div class="usercoverimg">

		 {{$user->printUserCoverImage()}}
		
			
			<div class="userMaininfo">
                
						<div class="userPic">{{$user->printUserImage()}}</div>
					
					<div class="title">
                                <h3>{{$user->getName()}}
                                @if((bool)$user->is_immediate_available)
                                <span>{{__('Disponible immédiatement pour le travail')}}</span>
                                @endif
								</h3>
						<div class="desi"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->getLocation()}}</div>
						
						<div class="membersinc"><i class="fa fa-history" aria-hidden="true"></i> {{__('Membre depuis le')}}, {{$user->created_at->format('M d, Y')}}</div>
						
                            </div>
					
					
                        
            </div>
			
		</div>
		
		<!-- Buttons -->
            <div class="userlinkstp">  
                          
                <?php if($true == TRUE){ ?>

                @if(isset($job) && isset($company))               

                @if(Auth::guard('company')->check() && Auth::guard('company')->user()->isHiredApplicant($user->id, $job->id, $company->id))
                <a href="{{route('remove.hire.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Retirer de la liste des embauchés')}} </a>
                @else
                @if(Auth::guard('company')->check() && Auth::guard('company')->user()->isFavouriteApplicant($user->id, $job->id, $company->id))

                <a href="{{route('remove.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Présélectionné')}} </a>

                @if(isset($is_applicant)) 
                <a style="color:#fff" href="{{route('reject.applicant.profile', [$job_application->id])}}" class="btn btn-warning"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Rejeter')}}</a>    
                @endif   

                @else

                <a href="{{route('add.to.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Liste restreinte')}}</a>

                @endif


                <a href="{{route('hire.from.favourite.applicant', [$job_application->id, $user->id, $job->id, $company->id])}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Embaucher ce candidat')}} </a>
                @endif

                
                @endif



                @if(null !== $profileCv)<a href="{{asset('cvs/'.$profileCv->cv_file)}}" class="btn"><i class="fa fa-download" aria-hidden="true"></i> {{__('Télécharger le CV')}}</a>@endif

                <a href="javascript:;" onclick="send_message()" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Envoyer un Message')}}</a>
				
				<?php } ?>
                @if(Auth::guard('company')->user())
                
                 <?php if($true == FALSE){?>
                <a href="{{route('company.unlock', $user->id)}}" class="btn btn-default report"><i class="fa fa-lock" aria-hidden="true"></i> {{__('Profil verrouillé')}}</a>
                <span>Déverrouillez le profil pour afficher le CV et les coordonnées du candidat</span>
                <?php } ?>
                @endif


            </div>
		

		
        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-8">               
                
                <!-- About Employee start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('À propos de moi')}}</h3>
                        <p>{{$user->getProfileSummary('summary')}}</p>
						
                    </div>
					
					<div class="ptsklbx">
					<h3>{{__('Compétences')}}</h3>
                    <div id="skill_div"></div>
					</div>
					
                </div>
	
				<!-- Profile Video start -->
                @if($user->video_link !=='' && null!==($user->video_link))
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('Video Profile')}}</h3>
                        <iframe src="{{$user->video_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                @endif

                <!-- Experience start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('De l\'experience')}}</h3>
                        <div class="" id="experience_div"></div>            
                    </div>
                </div>

                
            </div>
            <div class="col-md-4"> 
                <?php if($true == TRUE){?>
                 <!-- Candidate Contact -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Contact candidat')}}</h3>
                        <div class="candidateinfo">            
                            @if(!empty($user->phone))
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$user->phone}}">{{$user->phone}}</a></div>
                            @endif
                            @if(!empty($user->mobile_num))
                            <div class="loctext"><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:{{$user->mobile_num}}">{{$user->mobile_num}}</a></div>
                            @endif
                            @if(!empty($user->email))
                            <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
                            @endif
                            <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->street_address}}</div>
                        </div>  
                    </div>
                </div>
                <?php } ?>
                
                <!-- Candidate Detail start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Détail du candidat')}}</h3>
                        <ul class="jbdetail">

                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('L\'e-mail est-il vérifié')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->verified)? 'Oui':'Non'}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Disponible immédiatement')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{((bool)$user->is_immediate_available)? 'Oui':'Non'}}</span></div>
                            </li>

                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Age')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getAge()}} ans</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Sexe')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getGender('gender')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('état Civil')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getMaritalStatus('marital_status')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('De l\'expérience')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getJobExperience('job_experience')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Niveau de carrière')}}</div>
                                <div class="col-md-6 col-xs-6"><span>{{$user->getCareerLevel('career_level')}}</span></div>
                            </li>             
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Salaire actuel')}}</div>
                                <div class="col-md-6 col-xs-6"><span class="permanent">{{$user->current_salary}} {{$user->salary_currency}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">{{__('Pretentions')}}</div>
                                <div class="col-md-6 col-xs-6"><span class="freelance">{{$user->expected_salary}} {{$user->salary_currency}}</span></div>
                            </li>              
                        </ul>
                    </div>
                </div>

                <!-- Education start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('Éducation')}}</h3>
                        <div class="" id="education_div"></div>            
                    </div>
                </div>

                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Langues')}}</h3>
                        <div id="language_div"></div>            
                    </div>
                </div>
               
            </div>
        </div>
		
		<!-- Portfolio start -->
		<div class="job-header">
			<div class="contentbox">
				<h3>{{__('Portefeuille')}}</h3>
				<div class="" id="projects_div"></div>            
			</div>
		</div>
		
		
		
		
		
		
		
    </div>
</div>
<div class="modal fade" id="sendmessage" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="" id="send-form">
                @csrf
                <input type="hidden" name="seeker_id" id="seeker_id" value="{{$user->id}}">
                <div class="modal-header">                    
                    <h4 class="modal-title">Envoyer le Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" name="message" id="message" cols="10" rows="7"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
        </div>

    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
    $(document).on('click', '#send_applicant_message', function () {
    var postData = $('#send-applicant-message-form').serialize();
    $.ajax({
    type: 'POST',
            url: "{{ route('contact.applicant.message.send') }}",
            data: postData,
            //dataType: 'json',
            success: function (data)
            {
            response = JSON.parse(data);
            var res = response.success;
            if (res == 'success')
            {
            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
            $('#alert_messages').html(errorString);
            $('#send-applicant-message-form').hide('slow');
            $(document).scrollTo('.alert', 2000);
            } else
            {
            var errorString = '<div class="alert alert-danger" role="alert"><ul>';
            response = JSON.parse(data);
            $.each(response, function (index, value)
            {
            errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul></div>';
            $('#alert_messages').html(errorString);
            $(document).scrollTo('.alert', 2000);
            }
            },
    });
    });
    showEducation();
    showProjects();
    showExperience();
    showSkills();
    showLanguages();
    });
    function showProjects()
    {
    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#projects_div').html(response);
            });
    }
    function showExperience()
    {
    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#experience_div').html(response);
            });
    }
    function showEducation()
    {
    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#education_div').html(response);
            });
    }
    function showLanguages()
    {
    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#language_div').html(response);
            });
    }
    function showSkills()
    {
    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#skill_div').html(response);
            });
    }

    function send_message() {
        const el = document.createElement('div')
        el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>connexion</a> as un employeur et réessayez."
        @if(null!==(Auth::guard('company')->user()))
        $('#sendmessage').modal('show');
        @else
        swal({
            title: "Vous n'êtes pas connecté",
            content: el,
            icon: "error",
            button: "OK",
        });
        @endif
    }
    if ($("#send-form").length > 0) {
        $("#send-form").validate({
            validateHiddenInputs: true,
            ignore: "",

            rules: {
                message: {
                    required: true,
                    maxlength: 5000
                },
            },
            messages: {

                message: {
                    required: "Le message est requis",
                }

            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                @if(null !== (Auth::guard('company')->user()))
                $.ajax({
                    url: "{{route('submit-message-seeker')}}",
                    type: "POST",
                    data: $('#send-form').serialize(),
                    success: function(response) {
                        $("#send-form").trigger("reset");
                        $('#sendmessage').modal('hide');
                        swal({
                            title: "Success",
                            text: response["msg"],
                            icon: "success",
                            button: "OK",
                        });
                    }
                });
                @endif
            }
        })
    }
</script> 
@endpush