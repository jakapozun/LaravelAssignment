<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#statuses" aria-expanded="true" aria-controls="statuses">
        <i class="fas fa-fw fa-cog"></i>
        <span>Statuses</span>
    </a>
    <div id="statuses" class="collapse" aria-labelledby="headingStatuses" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Statuses:</h6>
            <a class="collapse-item" href="{{ route('add.status') }}">Add New Status</a>
            <a class="collapse-item" href="{{ route('view.statuses') }}">View All Statuses</a>
        </div>
    </div>
</li>
