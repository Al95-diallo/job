<li class="nav-item  "> 
<a href="javascript:;" class="nav-link nav-toggle"> 
<i class="fa fa-globe" aria-hidden="true"></i> 
<span class="title">Région</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> 
        <a href="{{ route('list.states') }}" class="nav-link "> 
        <span class="title">Liste de région</span> </a> </li>
        <li class="nav-item  "> 
        <a href="{{ route('create.state') }}" class="nav-link "> 
         <span class="title">Ajouter une région</span> </a> </li>
        <li class="nav-item  ">
         <a href="{{ route('sort.states') }}" class="nav-link "> 
          <span class="title">Trier les région</span> </a> </li>
    </ul>
</li>