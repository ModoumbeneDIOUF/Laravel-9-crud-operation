<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)

    {

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required|unique:students|min:5'
        ], [
            'name.required' => 'Name field is required.',
            'address.required' => 'Password field is required.',
            'mobile.required' => 'Mobile field is required.',
        ]);
       // $validatedData['password'] = bcrypt($validatedData['password']);

       // $input = $request->all();
         Student::create($validatedData);
        return redirect('student')->with('success', 'Student Addedd!');
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('students', $student);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    public function update(Request $request, $id)
    {


        $student = Student::find($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required|min:5'
        ], [
            'name.required' => 'Name field is required.',
            'address.required' => 'Password field is required.',
            'mobile.required' => 'Mobile field is required.',
        ]);

        //$input = $request->all();
        $student->update($validatedData);
        return redirect('student')->with('success', 'student Updated!');
    }

    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student')->with('success', 'Student deleted!');
    }
}
