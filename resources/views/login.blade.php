@extends('components.base')

@section('title',"Логин")

@section('content')

<div class="container mt-5 pt-5 d-flex flex-row justify-content-between">

    <div>
        @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
        @endif
        <form method="post" action="{{ route('auth') }}">
            <legend>Login</legend>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <div>Нет Акаунта?

        <form method="post" action="{{ route('registration') }}" enctype="multipart/form-data">
            <legend>Registration</legend>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}" class="@error('name') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="@error('email') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" class="@error('password_confirmation') is-invalid @enderror">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

@endsection
