@extends('layouts.app')
@section('pageTitle', '{{ $pages->title }}' )

@section('content')

<div class=" animate__animated animate__fadeInLeft container">
                <p>{!! $pages->body !!}</p>

</div>

                @endsection
