<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function onSelectFour(){
        $result = Courses::limit(4)->get();
        return $result;
    } // end method

    public function onSelectAll(){
        $result = Courses::all();
        return $result;
    } // end method

    public function onSelectDetails($courseId){
        $id = $courseId;
        $result = Courses::where('id',$id)->get();
        return $result;
    } // end method
}
