@extends('main')
@section('title', '|view post')
@section('body')
<div class="row">
	<div class="col-md-8">
			<h1>{{ $post->title }}</h1>	
			<p class="lead">{{$post->body }}</p>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>url:</label>
				<p><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<label>category:</label>
				<p>{{$post->category->name}}</p>
			</dl>

			<dl class="dl-horizontal">
				<label>Created At:</label>
				<p>{{date('M j,Y h:ia',strtotime($post->created_at))}}</p>
			</dl>
			<dl class="dl-horizontal">
				<label>Last updated:</label>
				<p>{{date('M j,Y h:ia',strtotime($post->updated_at))}}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-block">Edit</a>
				</div>
				<div class="col-sm-6">
					{!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
					{!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
					{!!Form::close()!!}
				</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{{Html::linkRoute('posts.index','<<see all posts',[],['class'=>'btn btn-default btn-block  btn-h1-spacing'])}}
				</div>
			</div>
	</div>	
</div>
</div>
</div>

@endsection