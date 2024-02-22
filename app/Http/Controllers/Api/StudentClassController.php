<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        $class = StudentClass::latest()->get();
        return response()->json($class);
    } //End Method

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        StudentClass::insert([
            'class_name' => $request->class_name,
            'created_at' => now()
        ]);
        return response('class name inserted successfully');
    } //End Method

    public function edit($id)
    {
        $class = StudentClass::findOrFail($id);
        return response()->json($class);
    } //End Method

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:student_classes|max:25'
        ]);

        StudentClass::findOrFail($id)->update([
            'class_name' => $request->class_name,
            'updated_at' => now()
        ]);
        return response()->json('class name updated successfully');
    } //End Method

    public function delete($id)
    {
        StudentClass::findOrFail($id)->delete();
        return response('class name deleted successfully');
    } //End Method
}
