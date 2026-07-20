<x-layout>
    <form method="post" action="/login">
        @csrf
        <div class="card" style="padding: 10px">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                </div>
                @error('password')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <button type="submit" class="btn btn-primary">Authenticate</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>