<li class="nav-item  "> 
<a href="javascript:;" class="nav-link nav-toggle"> 
<i class="fa fa-mars-double" aria-hidden="true"></i>
 <span class="title">Etats Matrimoniaux</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> 
        <a href="{{ route('list.marital.statuses') }}" class="nav-link ">
         <span class="title">Liste des état matrimoniaux</span> </a> </li>
        <li class="nav-item  ">
         <a href="{{ route('create.marital.status') }}" class="nav-link "> 
         <span class="title">Ajouter un nouvel état civil</span> </a> </li>
        <li class="nav-item  "> 
        <a href="{{ route('sort.marital.statuses') }}" class="nav-link "> 
        <span class="title">Trier les état matrimoniaux</span> </a> </li>
    </ul>
</li>