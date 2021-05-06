<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tasks</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tasks:</h6>
            <a class="collapse-item" href="{{ route('add.tasks') }}">Add New Tasks</a>
            <a class="collapse-item" href="{{ route('view.tasks') }}">View All Tasks</a>
        </div>
    </div>
</li>
