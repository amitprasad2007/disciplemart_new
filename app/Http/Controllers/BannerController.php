<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Auth;
use Redirect;
use View;
use Validator;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Console\MakeAuthCommand;
use Image;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $banners = Banner::where('is_deleted', '=', 0)->get();
        return view('admin.banners.index', compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {

            $file = $request->image;
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('banners_image', $image);
            $input['image'] = $image;
        }
        Banner::create($input);
Alert::Html('Success', '<h2> Banner Created Successfully </h2>','success');
        return redirect('banners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
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
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('banners_image', $image);
            $input['image'] = $image;
            
            if ($banner->image) {
                unlink(public_path('banners_image/' . $banner->image));
                //unlink(public_path('banners_image/thumbnail/' . $banner->image));
            }   
            }

        $banner->update($input);
Alert::Html('Success', '<h2> Banner Update Successfully </h2>','success');
        return redirect('banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $banner = Banner::find($id);
        $status = $banner->is_deleted;

        if ($status == 0) {
            $banner->is_deleted = '1';
        } else {
            $banner->is_deleted = '0';
        }
        $banner->save();

Alert::Html('Success', '<h2> Banner Deleted Successfully </h2>','success');
        return redirect('banners');
    }
    public function changeStatus($id) {

        $banner = Banner::find($id);
        $status = $banner->is_active;

        if ($status == 0) {
            $banner->is_active = '1';
            $msg = 'Banner Active.';
            $alert = 'alert-success';
        } else {
            $banner->is_active = '0';
            $msg = 'Banner Inactive.';
            $alert = 'alert-danger';
        }
        $banner->save();

Alert::Html('Success', '<h2> Status Changed Successfully </h2>','success');
        return redirect('banners');
    }
}
