@props((['chirp']))
<div class="card" style="margin-bottom: 10px">
    <div class="card-body">
        <div class="card-title">{{ $chirp->user->name }}</div>
        <p>{{ $chirp->message }}</p>
        <a href="#" class="btn btn-primary">{{ $chirp->created_at }} | {{ $chirp->created_at->diffForHumans() }}</a>
        <a class="btn btn-primary" href="/chirp/{{ $chirp->id }}">Open</a>
        <a class="btn btn-danger" href="/chirp/{{ $chirp->id }}/delete">Delete</a>
    </div>
</div>