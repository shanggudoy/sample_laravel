<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Module </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>
  <body>
    <div class="container">
      <h2>Edit Student</h2><br  />
        <form method="post" action="{{action('StudentController@update', $id)}}" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        
		<div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Image:</label><br/>
			@php
			$image  = '/images/'.$student->filename;
			@endphp
			<img src="{{ $image }}" height='150px' width='150px'>
			<input type="file" name="filename"> 
            
          </div>
        </div>
		
		<div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Student ID:</label>
            <input type="text" class="form-control" name="sid" value="{{$student->studentid}}" readonly>
          </div>
        </div>
		
		<div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Last Name:</label>
            <input type="text" class="form-control" name="lname" value="{{$student->lname}}" required>
          </div>
        </div>
		 <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">First Name:</label>
            <input type="text" class="form-control" name="fname" value="{{$student->fname}}" required>
          </div>
        </div>
		 <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Middle Name:</label>
            <input type="text" class="form-control" name="mname" value="{{$student->mname}}" required>
          </div>
        </div>
		
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{$student->email}}" required>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Phone Number:</label>
              <input type="text" class="form-control" name="number" value="{{$student->contact}}" required>
            </div>
          </div>
		 <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label>Birthday : </label>  
			@php
			 $date=date('d-m-Y', $student->bday);
			 @endphp
            <input class="date form-control"  type="text" id="datepicker" name="date" value="{{$date}}" required>   
         </div>
        </div>
		  
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                <lable>Year Level</lable>
                <select name="level">
                  <option value="Grade 1"  @if($student->yearlevel=="Grade 1") selected @endif>Grade 1</option>
                  <option value="Grade 2"  @if($student->yearlevel=="Grade 2") selected @endif>Grade 2</option>
                  <option value="Grade 3" @if($student->yearlevel=="Grade 3") selected @endif>Grade 3</option>  
                  <option value="Grade 4" @if($student->yearlevel=="Grade 4") selected @endif>Grade 4</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
			<a href="{{action('StudentController@index')}}" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
    </div>
	  <script type="text/javascript">  
        $('#datepicker').datepicker({ 
            autoclose: true,   
            format: 'dd-mm-yyyy'  
         });  
    </script>
  </body>
</html>