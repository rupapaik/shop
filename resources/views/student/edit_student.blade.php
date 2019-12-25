@extends('welcome')
@section('main_content')
@if(session()->has('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{route('student')}}" class="btn btn-danger">Add Student</a>
          <a href="{{route('all.student')}}" class="btn btn-info">All Student</a>
     <form action="{{URL::to('/update/student/'.$student->id)}}" method="post">
      @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Name</label>
            <input type="text" class="form-control" value="{{$student->name}}" name="name" required >

          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Email</label>
              <input type="text" class="form-control"  value="{{$student->email}}" name="email" required >

          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Student Phone</label>
              <input type="text" class="form-control"  value="{{$student->phone}}" name="phone" required >

          </div>
        </div>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" >Update</button>
        </div>
      </form>
      </div>
    </div>
</div>
@endsection
