@extends('layouts.app')

@section('content')
<div class=" animate__animated animate__fadeInLeft container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard | Account Information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <p class="lead">Welcome to your dashboard</p>

                </a>
            </div>
            <br />
            <center>
            <a href="/user">
                <div class="btn-primary btn">
                    Click Here to Edit Profile
                </div>
            </center>
        </div>

    </div>
</div>
@endsection
