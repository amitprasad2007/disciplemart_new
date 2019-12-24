<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Validator;
use Session;
use DB;
use View;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
        public function index() {
        
        $categories = Category::select('categories.*','cat.name as parent_category')
                                ->where('categories.is_deleted','=',0)
                                ->leftJoin('categories as cat', 'categories.parent_id', '=', 'cat.id')
								->orderby('categories.id','desc')
								->simplePaginate(7);
      
        return view('admin.categories.index', compact('categories'));
    }

 public function create() {
        
        $categories = $this->category_drop_down();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request) {
        
        $input = $request->all();
       
        Category::create($input);
Alert::Html('Success', '<h2> Category Created Successfully </h2>','success');
        return redirect('categories');
    }
    public function show($id) {

        $category = Category::select('categories.*','cat.name as parent_category')
                                ->where('categories.is_deleted','=',0)
                                ->where('categories.id','=',$id)
                             ->leftJoin('categories as cat', 'categories.parent_id', '=', 'cat.id')->get();
 
        return view('admin.categories.show', compact('category'));}

         public function changeStatus($id) {

        $category = Category::find($id);
        $status = $category->is_active;

        if ($status == 0) {
            $category->is_active = '1';
            $msg = 'Category Active.';
            $alert = 'alert-success';
        } else {
            $category->is_active = '0';
            $msg = 'Category Inactive.';
            $alert = 'alert-danger';
        }
        $category->save();

Alert::Html('Success', '<h2> Category Status Changed </h2>','success');
        return redirect('categories');
    }
    
    public function category_drop_down($parent_id = 0, $spacing = '', $cat = array()) {
        
        $categories = Category::where([['parent_id','=',$parent_id],['is_active','=','1'],['is_deleted','=','0']])->get();        
        
        return $categories;
    }

     public function destroy($id) {
        
       
        $category = Category::find($id);
        $status = $category->is_deleted;

        if ($status == 0) {
            $category->is_deleted = '1';
        } else {
            $category->is_deleted = '0';
        }
        $category->save();

Alert::Html('Success', '<h2> Category Deleted Successfully </h2>','success');
        return redirect('categories');
    }

    public function edit($id) {

        $category = Category::findOrFail($id);
        $categories = $this->category_drop_down();
        return view('admin.categories.edit', compact('category','categories'));
    }

    public function fetchSubCategory(request $request)
    {
        $input = $request->all();
        $sub_categories = Category::where('parent_id',$input['cat_id'])->where('is_active', '=', 1)->where('is_deleted', '=', 0)->get();
        $html = '';
        
        if(count($sub_categories)>0)
        {
            foreach($sub_categories as $category):
                $html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            endforeach;
        }
        
        return $html;
    }

public function update(Request $request, $id) {
        
        $input = $request->all();
        $category = Category::findOrFail($id);
        /*if (Input::hasFile('image')) {

            $file = Input::file('image');
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('categories_images', $image);
            $input['image'] = $image;
            if ($category->image) {
                unlink(public_path('categories_images/' . $category->image));
            }
        }*/
        
        $category->update($input);
    Alert::Html('Success', '<h2> Category Updated Successfully </h2>','success');
        return redirect('categories');
    }

}

