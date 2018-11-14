@extends('main')
@section('title','| Contact')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <h1>Contact</h1>
          <hr>
          <form>
            <div class="form-group">
                <label name="email">Email:</label>
                <input id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label name="subject">subject:</label>
                <input id="subject" name="subject" class="form-control">
            </div>

             <div class="form-group">
                <label name="message">message:</label>
                <textarea id="message" name="message" class="form-control">type your message here....</textarea>
            </div>
            <input type="submit" value="send message" class="btn btn-success">
        </div>
    </div>
@endsection