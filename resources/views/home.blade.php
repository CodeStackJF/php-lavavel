<x-layout>
    {{-- <x-slot:title>
        Welcome
    </x-slot:title> --}}
    <x-slot:username>Jhon Doe</x-slot:username>
    <main>
        <h3>Latest Chirps</h3>

        <form class="card-body" id="frm-save-chirp" method="post" action="/chirp">
            <div class="row">
                <div class="col-md-3">
                    <label>Usuario</label>
                    <select name="user_id">
                        @foreach($users as $user)
                        {
                            <option value="{{ $user->id }}">{{$user->name}} | {{$user->email}}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Content</label>
                    <textarea name="message" class="form-control" maxlength="200" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
        <p>
           @foreach($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
           @endforeach
        </p>
    </main>
</x-layout>