@extends('main')
@section('title','| create New Post')
@section('body')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>
		<hr>
			<form method="POST" action="{{URL::to('posts')}}" enctype="multipart/form-data">
				{{csrf_field() }}
			<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title"  placeholder="Enter title" name="title">
			</div>

			<div class="form-group">
			<label for="body">post body</label>
			<textarea class="form-control" id="body" name="body" placeholder="post here"></textarea>
			</div>
			<div class="form-group">
			<label for="slug">Slug</label>
			<input type="text" class="form-control" id="slug"  placeholder="Enter slug" name="slug">
			</div>
			<div class="form-group">
				<label for="category">category</label>
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
				<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
				</select>

				</div>
				<div class="form-group">
				<label for="image">Upload featured image</label>
				<input type="file" class="form-control" id="image" name="featured_image">
				</div>

			<button type="submit" name="create post" class="btn btn-primary btn-block">create post</button>
			</form>
	</div>
</div>

@endsection