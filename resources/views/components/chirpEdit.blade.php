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