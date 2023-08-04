<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Resep Menus</h2>
    </div>
    <div class="card-body">
        <nav class="nav flex-colum">
            <a href="{{ url('resep/'.$resepID->id.'/edit') }}" class="nav-link">Resep Detail</a>
            @if ($resepID->id == 0)
                <a href="{{ url('resep/'.$resepID->id.'/images') }}" class="nav-link text-danger">Resep Image (Please fill in the Resep details first then go to the edit feature)</a>
            @else
                <a href="{{ url('resep/'.$resepID->id.'/images') }}" class="nav-link">Resep Images</a>
            @endif
        </nav>        
    </div>
</div>