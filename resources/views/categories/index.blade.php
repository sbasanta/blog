@extends('main')
@section('title','| All categories')

@section('body')

			<div class="row">
				<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{$category->id}}</th>
						<td>{{$category->name}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
				</div>

		<div class="col-md-3">
			<div class="well">
				<form action="{{route('categories.store')}}" method="POST">
					{{csrf_field()}}
					<h2>New Categories</h2>
					  <div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" placeholder="name" name="name">
						</div>
						<input type="submit" name="Create new Categories" class="btn btn-primary btn-block">
					</form>
				</div>
			</div>
		</div>



@endsection