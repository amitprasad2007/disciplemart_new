<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\User;
use Auth;
use Redirect;
use View;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

class CoursesController extends Controller
{
    public function category_drop_down($parent_id = 0, $spacing = '', $cat = array()) {
        
        $categories = Category::where([['parent_id','=',$parent_id],['is_active','=','1'],['is_deleted','=','0']])->get();        
        
        return $categories;
    }
    public function index()
    { $courses = Course::select('courses.*','u1.name as user_name','u2.name as secondary_name','categories.name as cat_name')
                                ->where('courses.is_deleted','=',0)
                                ->leftJoin('categories', 'courses.category_id','=','categories.id')
                                ->leftJoin('users as u1', 'courses.user_id', '=', 'u1.id')
                                ->leftJoin('users as u2', 'courses.secondary_user_id', '=', 'u2.id');

                                
                                
        if(isset($_REQUEST['sort_by']) && $_REQUEST['sort_by'] != '')
        {
            $courses = $courses->orderby('view_counter','desc');
        }       

        $courses = $courses->simplePaginate(7); 

       $authors = User::role('Author')->where('is_deleted','=',0)->orderby('name','asc')->get();
        
        return view('admin.courses.index', compact('courses','authors'));
    }

     public function create() {

        $categories = $this->category_drop_down();
        
        $sub_categories = array();
        
        $authors = User::role('Author')->where('is_deleted','=',0)->get('name','id');
        $authors->prepend('Select Author', 0);
        return view('admin.courses.create', compact('categories','sub_categories','authors'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {

        $input = $request->all();
      
        if ($request->hasFile('image')) 
        {
            $file = Request::file('image');
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('courses_image', $image);
            $input['image'] = $image;
        }
        $material = array();
        if($request->hasfile('study_material_sample'))

         { foreach($request->file('study_material_sample') as $file)

            {

                $name = time().'.'.$file->extension();

                $file->move(public_path().'/files/', $name);  

               $material[] = $name;  

            }

         }
       
        Course::create($input);
       Alert::Html('Success', '<h2> Course Created Successfully </h2>','success');
        return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $course = Course::select('courses.*','users.name as user_name')                            
                            ->leftJoin('users', 'courses.user_id', '=', 'users.id')
                            ->find($id);
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $course = Course::findOrFail($id);
        $categories = $this->category_drop_down();
        
        //$sub_categories = Category::where('parent_id',$course->category_id)->where('is_active', '=', 1)->where('is_deleted', '=', 0)->lists('name','id');
        
        $authors = User::role('Author')->where('is_deleted',0)->get('name','id');
        $authors->prepend('Select Author', 0);
        return view('admin.courses.edit', compact('course','categories','authors'));
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
       
        $input = $request->all();
        $course = Course::findOrFail($id);
        if (Input::hasFile('image')) {

            
            $file = Input::file('image');
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('courses_image', $image);
            $input['image'] = $image;
            
            if ($course->image != '') {
                @unlink(public_path('courses_image/' . $course->image));
                //unlink(public_path('courses_image/thumbnail/' . $course->image));
            }
        }
        
        $material = array();
        for($i=0;$i<count($input['study_material_sample']);$i++)
        {
            if ($_FILES['study_material_sample']['name'][$i] != '') 
            {

                $file = Input::file('study_material_sample')[$i];
                $fileName = $file->getClientOriginalName();
                $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
                $filedata = microtime() . "." . $file_ext;
                $file->move('courses_study_material', $filedata);
                $material[] = $filedata;
                
                if(isset($input['study_material_demo_sample'][$i]))
                {
                    @unlink(public_path('courses_study_material/' . $input['study_material_demo_sample'][$i]));
                }
                
            }
            else
            {
                if(isset($input['study_material_demo_sample'][$i]))
                {
                    $material[] = $input['study_material_demo_sample'][$i];
                }
            }
            
        }
        
        $input['study_material_sample'] = json_encode($material);
    
        $course->update($input);
       Alert::Html('Success', '<h2> Course Updated Successfully </h2>','success');
        return redirect('courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changeStatus($id) {

        $course = Course::find($id);
        $status = $course->is_active;

        if ($status == 0) {
            $course->is_active = '2';
            $msg = 'Course waiting for approval.';
            $alert = 'alert-warning';
        } elseif ($status == 2) {
            $course->is_active = '1';
            $msg = 'Course Approved.';
            $alert = 'alert-success';
        } elseif ($status == 1) {
            $course->is_active = '0';
            $msg = 'Course Inactive.';
            $alert = 'alert-danger';
        }
        $course->save();

       Alert::Html('Success', '<h2> Status Changed </h2>','success');
        return redirect('courses');
    }
    
    public function multipleAction(request $request)
    {
        $input = $request->all();
        
        if(isset($input['assign_to_author']))
        {
            $assigned = 0;
            foreach($input['selectcourses'] as $course_id)
            {
                $course = Course::find($course_id);
                $author_id = $course->user_id;
                if($author_id != $input['author'])
                {
                    $course->secondary_user_id = $input['author'];
                    $course->save();
                    $assigned++;
                }
            }
            
            if($assigned == 0)
            {
               
       Alert::Html('Info', '<h2> There is no course to be assigned. </h2>','info');
            }
            else
            {
              
       Alert::Html('Info', '<h2> Selected courses have been assigned to the selected instructor successfully. </h2>','info');
            }
        }
        
        if(isset($input['request_approve']))
        {
            $all_active = 0;
            foreach($input['selectcourses'] as $course_id)
            {
                $course = Course::find($course_id);
                $status = $course->is_active;
                if($status == 2)
                {
                    $course->is_active = 1;
                    $course->save();
                    $all_active++;
                }
            }
            
            if($all_active == 0)
            {
    
        Alert::Html('Info', '<h2> There is no course to be approved. </h2>','info');
            }
            else
            {
            
    Alert::Html('Info', '<h2> Selected courses have been approved. </h2>','info');
            }
        }
        if(isset($input['request_active']))
        {
            $all_active = 0;
            foreach($input['selectcourses'] as $course_id)
            {
                $course = Course::find($course_id);
                $status = $course->is_active;
                if($status == 0 || $status == 2)
                {
                    $course->is_active = 1;
                    $course->save();
                    $all_active++;
                }
            }
            
            if($all_active == 0)
            {
            
               Alert::Html('Info', '<h2> There is no course to be active. </h2>','info');
            }
            else
            {
          Alert::Html('Info', '<h2> Selected courses have been activated successfully. </h2>','info');
            }
        }
        if(isset($input['request_inactive']))
        {
            $all_inactive = 0;
            foreach($input['selectcourses'] as $course_id)
            {
                $course = Course::find($course_id);
                $status = $course->is_active;
                if($status == 1)
                {
                    $course->is_active = 0;
                    $course->save();
                    $all_inactive++;
                }
            }
            
            if($all_inactive == 0)
            {

        Alert::Html('Info', '<h2> There is no course to be inactive. </h2>','info');
            }
            else
            {
      Alert::Html('Info', '<h2> Selected courses have been inactivated successfully. </h2>','info');
            }
        }
        if(isset($input['deleteall']))
        {
            foreach($input['selectcourses'] as $course_id)
            {
                $course = Course::find($course_id);
                $course->is_deleted = 1;
                $course->save();
            }
            
    Alert::Html('Info', '<h2> Selected courses have been deleted successfully. </h2>','info');
            
        }
        
        return redirect('courses');
        
    }

}
