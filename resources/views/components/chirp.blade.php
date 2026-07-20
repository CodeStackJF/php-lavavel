@props((['chirp']))
<div class="card" style="margin-bottom: 10px">
    <div class="card-body">
        <div class="card-title">{{ $chirp->user->name }}</div>
        <p>{{ $chirp->message }}</p>
        <a href="#">{{ $chirp->created_at }} | {{ $chirp->created_at->diffForHumans() }}</a> 
            @if($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                <small>edited</small>
            @endif
        | 
        <a href="/chirps/{{ $chirp->id }}/view">Open</a> | 
        {{-- @if(auth()->check() && auth()->id() === $chirp->user_id) --}}
        @can('delete', $chirp)
            <a href="/chirps/{{ $chirp->id }}/delete">Delete</a> | 
        @endcan
        @can('update', $chirp)
            <a href="/chirps/{{ $chirp->id }}/edit">Edit</a> | 
        @endcan
        {{-- @endif --}}
    </div>
</div>