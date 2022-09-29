@extends('Front.master')

@section('title')
    Auth Page
@endsection

@section('body')
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2>Login to your account</h2>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                        <form action="{{route('customer-signIn')}}" method="post">
                            @csrf
                            <input type="email" placeholder="Email Address" name="email" />
                            <input type="password" placeholder="Password" name="password" />
                            <span>
                            <input type="checkbox" class="checkbox">
                                Keep me signed in
                                </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
