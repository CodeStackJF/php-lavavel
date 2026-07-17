@props((['chirp']))
@props((['users']))
<form class="card-body" id="frm-save-chirp" method="post" {{ $chirp->id == 0 ? "action=/chirps":"action=/chirps/".$chirp->id.'/update' }} >
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label>ID</label>
            <input type="text" class="form-control" value="{{ $chirp->id }}" disabled />
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label>Usuario</label>
            <select name="user_id">
                <option value="">Seleccione</option>
                @foreach($users as $user)
                    @if($chirp->id == 0)
                        <option option {{ old('user_id') == $user->id ? 'selected':'' }} value="{{ $user->id }}">{{$user->name}} | {{$user->email}}</option>
                    @else
                        <option option {{ $chirp->user_id == $user->id ? 'selected':'' }} value="{{ $user->id }}">{{$user->name}} | {{$user->email}}</option>
                    @endif
                @endforeach
            </select>
            @error('user_id')
                <div class="label">
                    <span class="">{{isset($user_id) ? $user_id:''}}</span>
                </div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label>Content</label>
            <textarea name="message" class="form-control">{{$chirp->message}}</textarea>
            @error('message')
                <div class="label">
                    <span class="">{{$message}}</span>
                </div>
            @enderror
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>