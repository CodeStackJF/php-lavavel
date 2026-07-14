<x-layout>
    {{-- <x-slot:title>
        Welcome
    </x-slot:title> --}}
    <x-slot:username>Jhon Doe</x-slot:username>
    <main>
        <h3>Latest Chirps</h3>

        <form class="card-body" id="frm-save-chirp" method="post" action="/chirp">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label>Usuario</label>
                    <select name="user_id">
                        <option value="">Seleccione</option>
                        @foreach($users as $user)
                            <option {{ old('user_id') == $user->id ? 'selected':'' }} value="{{ $user->id }}">{{$user->name}} | {{$user->email}}</option>
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
                    <textarea name="message" class="form-control">{{old('message')}}</textarea>
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
       {{--  @if($errors->any())
            <p>{{dd($errors->all())}}</p>
        @endif --}}

        
        <p>
           @foreach($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
           @endforeach
        </p>
    </main>
</x-layout>