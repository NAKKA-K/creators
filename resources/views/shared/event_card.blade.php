<div class="card border-secondary mb-2">
    <div class="card-header">
        <a href="{{ route('events.show', ['event' => $event]) }}"><h4>{{ $event->name }}</h4></a>
        <div class="small text-muted">
            <a href="{{ route('users.show', ['user' => $event->user]) }}" class="text-secondary">{{ $event->user->name }}</a>
            &nbsp;&nbsp;
            {{ $event->created_at }}
        </div>
    </div>
    <div class="card-body">
        {{ $event->description }}
    </div>
</div>
