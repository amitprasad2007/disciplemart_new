<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use RealRashid\SweetAlert\Facades\Alert;

class ChaptersController extends Controller
{
        public function index($course_id) {

        $chapters = Chapter::where([['is_deleted','=',0],['course_id','=',$course_id]])->get();
        return view('admin.chapters.index', compact('chapters','course_id'));
    }

}
