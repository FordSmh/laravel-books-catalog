@extends('layouts/layout')

@section('content')
<main class="form-signup w-75 m-auto">
    <form>
        <h1 class="h3 mb-3 fw-normal">Sign up</h1>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Repeat password">
            <label for="floatingPassword">Repeat password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    </form>
    <div class="my-3">Already have an account? Please <a href="{{route('login')}}">login</a></div>
</main>
@endsection('content')
