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
    
    public function create($course_id) {

        return view('admin.chapters.create',compact('course_id'));
    }

    public function store(Request $request, $course_id) {

        $input = $request->all();
        $input['course_id'] = $course_id;
        if ($request->hasFile('video')) {

            $file = $request->video;
            $videoName = $file->getClientOriginalName();
            $file_ext = pathinfo($videoName, PATHINFO_EXTENSION);
            $video = time() . "." . $file_ext;
            $upload_video = $file->move('chapters_video', $video);
            $input['video'] = $video;
        }
        Chapter::create($input);

        Alert::Html('Success', '<h2> Chapter added successfully </h2>','success');
        return redirect('chapters/'.$course_id);
    }

    public function show($id, $course_id) {
        $chapter = Chapter::where('course_id','=',$course_id)->find($id);
        return view('admin.chapters.show', compact('chapter','course_id'));
    }

    public function edit($id, $course_id) {

        $chapter = Chapter::where('course_id','=',$course_id)->findOrFail($id);
        return view('admin.chapters.edit', compact('chapter','course_id'));
    }

    public function update(Request $request, $id, $course_id) {

        $input = $request->all();
        $chapter = Chapter::where('course_id','=',$course_id)->findOrFail($id);
        if ($request->hasFile('video')) {
            
            $file = $request->video;
            $videoName = $file->getClientOriginalName();
            $file_ext = pathinfo($videoName, PATHINFO_EXTENSION);
            $video = time() . "." . $file_ext;
            $upload_video = $file->move('chapters_video', $video);
            $input['video'] = $video;
            
            if ($chapter->video) {
                unlink(public_path('chapters_video/' . $chapter->video));
            }
        }
        
        $chapter->update($input);

        Alert::Html('Success', '<h2> Chapter update successfully </h2>','success');
        return redirect('chapters/'.$course_id);
    }

    public function destroy($id, $course_id) {

        $chapter = Chapter::where('course_id','=',$course_id)->find($id);
        $status = $chapter->is_deleted;

        if ($status == 0) {
            $chapter->is_deleted = '1';
        } else {
            $chapter->is_deleted = '0';
        }
        $chapter->save();

        
        Alert::Html('Success', '<h2> Chapter deleted successfully </h2>','success');
        return redirect('chapters/'.$course_id);
    }

    public function changeStatus($id, $course_id) {

        $chapter = Chapter::where('course_id','=',$course_id)->find($id);
        $status = $chapter->is_active;

        if ($status == 0) {
            $chapter->is_active = '1';
            $msg = 'Chapter Active.';
            $alert = 'alert-success';
        } else {
            $chapter->is_active = '0';
            $msg = 'Chapter Inactive.';
            $alert = 'alert-danger';
        }
        $chapter->save();

        Alert::Html('Success', '<h2> Status Changed </h2>','success');
        return redirect('chapters/'.$course_id);
    }


}
