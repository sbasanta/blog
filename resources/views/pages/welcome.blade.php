@extends('main')
@section('title','| Homepage')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                  <h1>welcome to my Blog!</h1>
                  <p class="lead">Thank you for visiting my website.this is just a test website.</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div>

<div class="row">
         <div class="col-md-8">
                
                  @foreach($posts as $post)

        <div class="post">
            <h3> {{$post->title}}</h3>
            <p>{{str_limit($post->body,300)}}</p>
            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read more</a>
        </div>
    <hr>
    @endforeach
</div>

    <div class="col-md-3"> 
        <h2>Side bar</h2>
    </div>
</div>

 @endsection