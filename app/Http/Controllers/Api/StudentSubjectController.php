<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function index()
    {
        $subject = StudentSubject::latest()->get();
        return response()->json($subject);
    } //End Method

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:student_subjects|max:25'
        ]);

        StudentSubject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
            'created_at' => now()
        ]);
        return response('student subject inserted successfully');
    } //End Method

    public function editSubject($id)
    {
        $subject = StudentSubject::findOrFail($id);
        return response()->json($subject);
    } //End Method

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:student_subjects|max:25'
        ]);

        StudentSubject::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,

        ]);
        return response()->json('student subject updated successfully');
    } //End Method

    public function delete($id)
    {
        StudentSubject::findOrFail($id)->delete();
        return response('student subject deleted successfully');
    } //End Method

}
