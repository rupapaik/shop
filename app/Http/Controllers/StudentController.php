<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
  public function index(){
    return view('student.create_student');
  }
  //student insert-------------
  public function StoreStudent(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|max:25|min:5',
        'phone' => 'required|unique:students|max:15|min:7',
        'email' => 'required|unique:students|',
    ]);
    $student = new Student;
    $student->name=$request->name;
    $student->email=$request->email;
    $student->phone=$request->phone;
    $student->save();
      return back()->with('success', ' Student Insert Successfully');
    //return response()->json($student);
    //return view('student.create_student');
  }
    // all student view-------------
    public function allstudent(){
      $student=Student::all();
        return view('student.all_student',compact('student'));
      //return response()->json($student);
    }
    // Show single student id are here
    public function Viewstudent($id){
    $student=Student::findorfail($id) ;
//  return response()->json($student);
    return view('student.view_student',compact('student'));
    }
      
            // Edit single student delete are here
                public function edit($id){
                  $student=Student::findorfail($id);
                  return view('student.edit_student',compact('student'));
                }

      // Update single student delete are here
      public function update(Request $request,$id){
        $student=Student::findorfail($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return Redirect()->route('all.student')->with('success', ' Student Updated Successfully');
      }
      // Show single student delete are here
          public function destroy($id){
            $student=Student::findorfail($id);
            $student->delete();
            return back()->with('success', ' Student Deleted Successfully');
          }
}
