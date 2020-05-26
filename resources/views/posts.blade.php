@extends('layouts.app')
@section('content')
@section('pageTitle', 'News')

<div class=" container">

        <div data-aos="fade-up" class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">
                <h1> News</h1>
                <div class="card mb-4">

        @foreach ($posts as $post)
         <!-- Blog Post -->
         <div data-aos="flip-right" class="card mb-4">
                <a href="/post/{{ $post->slug }}">
                <img  class="lazy card-img-top" src="{{ Voyager::image( $post->image ) }}" >
                </a>
                <div class="card-body">
                  <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{$post->excerpt}}</p>
                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More &rarr;</a>

            </div>
                <div  data-aos="flip-right"class="card-footer text-muted">
                  Posted on  {{ $post->created_at }}
                  by
                  <a href="https://www.twitter.com/garethmedia">Gareth</a>
                  <p>{{ $post->category_id	}}</p>
                </div>

              </div>
              @endforeach

</div>

    @endsection
