@extends('main')
@section('title', '|view post')
@section('body')
<div class="row">
  <div class="col-md-10">
  <h1>All Album</h1>
  </div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-form">Add new album</button>
</div>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title in English</th>
      <th scope="col">Title in Nepali</th>
      <th scope="col">Location of event</th>
      <th scope="col">event held date</th>
       <th scope="col">Link</th>
       <th scope="col">cover Image</th>
       <th scope="col">View</th>
       <th scope="col">Edit</th>
       <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    
      @foreach($albums as $album)
      <tr>
      <th scope="row">{{$album->id}}</th>
      <td>{{$album->etitle}}</td>
      <td>{{$album->ntitle}}</td>
      <td>{{$album->event_location}}</td>
      <td>{{date('M j,Y',strtotime($album->event_date))}}</td>
       <td>{{$album->link}}</td>
       <td><img src="{{asset('images/'.$album->featured_image)}}" class="img-fluid" alt="featured image" style="height:60px">
       <td>
        <a  class="btn btn-default btn-sm" data-toggle="modal" data-target="#view{{$album->id}}">view</a>
        </td>

          <td>
            <a class="btn btn-primary" data-toggle="modal" data-target="#edit{{$album->id}}">Edit</a></td>
          <td><button type="button" class="btn btn-danger btn-sm">Delete</button>
          </td> 

    
    </tr>
       @endforeach
  </tbody>
</table>
</td>

{{-- modal to create --}}

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="create-form">
  <div class="modal-dialog modal-lg">
    <div class="modal-content col-md-10 offset-md-1">
      
      <form action="{{route('album.store')}} " method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="form-group">
      <label for="etitle">Title in English</label>
      <input type="text" class="form-control" id="etitle" name="etitle" placeholder="Title in English">
      </div>
      <div class="form-group">
      <label for="ntitle">Title in Nepali</label>
      <input type="text" class="form-control" id="ntitle" name="ntitle" placeholder="Title in Nepali">

      <div class="form-group">
      <label for="event_location">Event Location</label>
      <input type="text" class="form-control" id="event_location" name="event_location" placeholder="Location of Event held">
      </div>

      </div>
      <div class="form-group">
      <label for="">Date of Event Held</label>
      <input type="date" class="form-control" id="" name="event_date">
    </div>

      <div class="form-group">
      <label for="link">link(if any available)</label>
      <input type="text" class="form-control" id="link" name="link" placeholder="link(if any)">
      </div>
      <div class="form-group">
      <label for="featured_image">Cover Image</label>
      <input type="file" class="form-control" id="file" name="featured_image">
      </div>
      <div class="form-group">
      <input type="submit" class=" form-control btn btn-primary">
      </div>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- modal for the view --}}
@foreach($albums as $album)
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="edit{{$album->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content col-md-10 offset-md-1">
      
      <form action=" " method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="form-group">
      <label for="etitle">Title in English</label>
      <input type="text" class="form-control" id="etitle" name="etitle" placeholder="Title in English" value="{{$album->etitle}}">
      </div>
      <div class="form-group">
      <label for="ntitle">Title in Nepali</label>
      <input type="text" class="form-control" id="ntitle" name="ntitle" placeholder="Title in Nepali" value="{{$album->ntitle}}">

      <div class="form-group">
      <label for="event_location">Event Location</label>
      <input type="text" class="form-control" id="event_location" name="event_location" placeholder="Location of Event held" value="{{$album->event_location}}">
      </div>

      </div>
      <div class="form-group">
      <label for="event_date">Date of Event Held</label>
      <input type="date" class="form-control" id="event_date name="event_date" value="{{$album->event_date}}">

      <div class="form-group">
      <label for="link">link(if any available)</label>
      <input type="text" class="form-control" id="link" name="link" placeholder="link(if any)" value="{{$album->link}}">
      </div>
      <div class="form-group">
      <label for="featured_image">Cover Image</label>
      <input type="file" class="form-control" id="file" name="featured_image">
      </div>
      <div class="form-group">
      <input type="submit" class=" form-control btn btn-primary">
      </div>
      </div>
      </form>
    </div>

    </div>
  </div>
</div>
@endforeach

{{-- modal for view --}}

@foreach($albums as $alb)

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="view{{$alb->id}}">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          
            <div class="row justify-content-center">
              <img src="{{asset('images/'.$alb->featured_image)}}" class="img-responsive ml-5" alt="featured image">
              </div>
    </div>
  </div>
</div>
@endforeach


@endsection
