<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // optional for symbol = 
        // return Student::latest()->get(); //first() and last()
        // return Student::get()->where('score', '<', 50); //fail score
        // return Student::get()->take(3)->sum('score'); //take = means that selects or shows just 3 datas
        // return Student::get()->min('score'); //find min score , average(), max()
        // return Student::get()->contains('score', 50); //if have score = 50 return 1 if not return 0
        // return Student::get()->contains('name', 'chanthea'); //if have chanthea return 1 if not return 0
        // return dd(Student::get()->sortByDesc('age')); //dd = dump and die , sortBy('age)
        // return Student::get()->map->name; //get just name
        return Student::get()->pluck('score', 'name'); //show both score and name (can not show 3 datas, can just 2 datas like = show name and score)
        //eloquent collection
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->name =$request->name;
        $student->age = $request->age;
        $student->score = $request->score;

        $student->save();
        return response()->json(['sms' => 'created!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name =$request->name;
        $student->age = $request->age;
        $student->score = $request->score;

        $student->save();
        return response()->json(['sms' => 'updated!'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Student::destroy($id);
    }
}
