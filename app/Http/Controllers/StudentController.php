<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get students
        $students = Student::latest()->paginate(5);

        //render view with students
        return view('students.index', compact('students'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'number'     => 'required|max:5',
            'name'       => 'required|max:30',
            'photo'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'      => 'required|min:10',
            'phone'      => 'required|max:13'
        ]);

        //upload photo
        $photo = $request->file('photo');
        $photo->storeAs('public/students', $photo->hashName());

        //create Student
        Student::create([
            'number'     => $request->number,
            'name'       => $request->name,
            'photo'      => $photo->hashName(),
            'email'      => $request->email,
            'phone'      => $request->phone
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * edit
     *
     * @param  mixed $student
     * @return void
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Student $student)
    {
        //validate form
        $request->validate([
            'number'     => 'required|max:5',
            'name'       => 'required|max:30',
            'photo'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'      => 'required|min:10',
            'phone'      => 'required|max:13'
        ]);

        //check if photo is uploaded
        if ($request->hasFile('photo')) {

            //upload new photo
            $photo = $request->file('photo');
            $photo->storeAs('public/students', $photo->hashName());

            //delete old photo
            Storage::delete('public/students/' . $student->photo);

            //update student with new photo
            $student->update([
                'number'     => $request->number,
                'name'       => $request->name,
                'photo'      => $photo->hashName(),
                'email'      => $request->email,
                'phone'      => $request->phone
            ]);
        } else {

            //update student without image
            $student->update([
                'number'     => $request->number,
                'name'       => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
/**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy(Student $student) 
    {
        //delete image
        Storage::delete('public/students/'. $student->image);

        //delete student
        $student->delete();

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
