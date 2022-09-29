@extends('Front.master')

@section('title')
    Auth Page
@endsection

@section('body')
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>New User Signup!</h2>
                        <form action="{{route('new-customer')}}" method="POST">
                            @csrf
                            <input type="text" placeholder="Name" name="name"/>
                            <input type="email" placeholder="Email Address" name="email"/>
                            <input type="number" placeholder="Mobile Number" name="mobile" />
                            <input type="password" placeholder="Password" name="password" />
                            <input type="password" name="password" placeholder="Confirm Password" required>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
