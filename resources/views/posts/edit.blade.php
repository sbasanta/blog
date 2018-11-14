@extends('main')
@section('title','|Edit Blog Post')
@section('body')

<div class="row">
	{!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT']) !!}
	<div class="col-md-8">

		<div class="form-group">
			{{Form::label('title','Title')}}
			{{Form::text('title',null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('body','Body')}}
			{{Form::textarea('body',null,['class'=>'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::label('slug','Slug')}}
			{{Form::text('slug',null,['class'=>'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('category_id','Category:')}}
			{{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
		</div>

	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{date('M j,Y h:ia',strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last updated:</dt>
				<dd>{{date('M j,Y h:ia',strtotime($post->updated_at))}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{route('posts.show',$post->id)}}" class="btn btn-danger btn-block">Cancel</a>
				</div>
				<div class="col-sm-6">
					{{Form::submit('save changes',['class'=>'btn btn-success btn-block'])}}
				</div>
		</div>
	</div>	
</div>
{!!Form::close()!!}
</div>

@endsection