<x-layout>
    <form method="post" action="/register">
        @csrf
        <div class="card" style="padding: 10px">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                </div>
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>
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
                    <label>Password Confirmation</label>
                    <input type="text" class="form-control" placeholder="Password Confirmation" name="password_confirmation">
                </div>
                @error('password_confirmation')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </div>
    </form>
</x-layout>