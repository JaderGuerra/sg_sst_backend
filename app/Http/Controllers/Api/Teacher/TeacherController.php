<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CreateTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Teacher\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate();
        return $teachers;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTeacherRequest $request)
    {
        //PREGUNTA
        //COMO HAGO PARA ENVIAR EL STATUS SIEMPRE EN ON, ES DECIR CUANDO SE CREE EL TEACHER DEBE IR CON EL STATUS EN ON
        $data = $request->validated();
        $teacher = Teacher::create($data);
        return $teacher;
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return $teacher;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->fill($request->validated());
        $teacher->save();
        return $teacher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher::where("id", $teacher)->update(["status" => "off"]);
    }
}
