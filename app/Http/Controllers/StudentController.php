<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //add page
	public function create()
	{
		return view('create');
	}
	
	//Save to DB
	public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $stu= new \App\Student;
		$stu->studentid=$request->get('sid');
        $stu->lname=$request->get('lname');
		$stu->fname=$request->get('fname');
		$stu->mname=$request->get('mname');
        $stu->email=$request->get('email');
        $stu->contact=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $stu->bday = strtotime($format);
        $stu->yearlevel=$request->get('level');
        $stu->filename=$name;
        $stu->save();
        
        return redirect('student')->with('success', 'Information has been added');
    }
	
	//index
	public function index()
    {
        $student=\App\Student::all();
        return view('index',compact('student'));
    }
	//edit page
	public function edit($id)
    {
        $student = \App\Student::find($id);
        return view('edit',compact('student','id'));
    }
	///update
	public function update(Request $request, $id)
    {
		
		$stu= \App\Student::find($id);
		
		if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
			$stu->filename=$name;
		}
		 
        
        $stu->studentid=$request->get('sid');
        $stu->lname=$request->get('lname');
		$stu->fname=$request->get('fname');
		$stu->mname=$request->get('mname');
        $stu->email=$request->get('email');
        $stu->contact=$request->get('number');
		$date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $stu->bday = strtotime($format);
        $stu->yearlevel=$request->get('level');
        $stu->save();
        return redirect('student')->with('success', 'Information has been updated');
    }
	//delete
	public function destroy($id)
    {
        $passport = \App\Student::find($id);
        $passport->delete();
        return redirect('student')->with('success','Information has been  deleted');
    }
}
