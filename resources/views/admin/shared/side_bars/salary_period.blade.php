<li class="nav-item  ">
 <a href="javascript:;" class="nav-link nav-toggle"> 
 <i class="fa fa-money" aria-hidden="true"></i> 
 <span class="title">Périodes salariales</span> <span class="arrow"></span> </a>
    <ul class="sub-menu">
        <li class="nav-item  "> 
        <a href="{{ route('list.salary.periods') }}" class="nav-link "> 
         <span class="title">Liste de salaire</span> </a> </li>
        <li class="nav-item  "> 
        <a href="{{ route('create.salary.period') }}" class="nav-link "> 
         <span class="title">Ajouter un salaire</span> </a> </li>
        <li class="nav-item  ">
         <a href="{{ route('sort.salary.periods') }}" class="nav-link "> 
         <span class="title">Trier les salaire</span> </a> </li>
    </ul>
</li>