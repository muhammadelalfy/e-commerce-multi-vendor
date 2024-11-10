<div>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{$newNotificationsCount}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">{{$newNotificationsCount}} Notifications</span>
            <div class="dropdown-divider"></div>
            @forelse($notifications as $notification)
                <a href="{{$notification->data['url']}}?notification_id={{$notification->id}}" class="dropdown-item @if($notification->unread()) text-bold @endif" >
                    <i class="{{$notification->data['icon']}}"></i> {{$notification->data['body']}}
                    <span class="float-right text-muted text-sm">{{$notification->created_at->diffForHumans(['short' => true])}}</span>
                </a>
                <div class="dropdown-divider"></div>
            @empty
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> No new notifications
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
            @endforelse

            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
</div>
