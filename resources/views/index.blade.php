<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Module</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
	 
	 <h2>Student List</h2><br/>
	 <a href="{{action('StudentController@create')}}" class="btn btn-primary">Add student</a><br/>
    <table class="table table-striped">
    <thead>
      <tr>
		<th>Image</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Year Level</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($student as $stud)
      @php
        $date=date('Y-m-d', $stud['bday']);
		$image  = '/images/'.$stud['filename'];
        @endphp
      <tr>
		<td><img src="{{ $image }}" height='50px' width='50px'></td>
        <td>{{$stud['studentid']}}</td>
        <td>{{$stud['fname'].' '.$stud['mname'].' '.$stud['lname']}}</td>
        <td>{{$date}}</td>
        <td>{{$stud['email']}}</td>
        <td>{{$stud['contact']}}</td>
        <td>{{$stud['yearlevel']}}</td>
        
        <td><a href="{{action('StudentController@edit', $stud['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('StudentController@destroy', $stud['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Delete student information?');">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>