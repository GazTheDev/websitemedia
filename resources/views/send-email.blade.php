@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ route('send-email') }}">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group row col-8">
            <div class="form-group col-12">
                <label for="email">Email Address(es)</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Example: johndoe@email.com,JohnDoe@email.com, " required>
                <small id="email" class="form-text text-muted">Enter the comma separated email addresses</small>
            </div>
            <div class="form-group col-12">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Email Subject" required>
            </div>
            <div class="form-group col-12">
                <div class="form-group">
                    <label for="emailBody">Email Body</label>
                    <textarea class="form-control" id="emailBody" name="body" rows="3"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>
</div>
    @endsection
