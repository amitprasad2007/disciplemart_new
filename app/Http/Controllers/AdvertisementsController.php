<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Auth;
use Validator;
use DB;
use Alert;
use DataTables;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $advertisements = Advertisement::where('is_deleted', '=', 0)->get();
        return view('admin.advertisements.index', compact('advertisements'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.advertisements.create');
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
            $upload_image = $file->move('advertisements_image', $image);
            $input['image'] = $image;
        }
        Advertisement::create($input);
    Alert::Html('Success', '<h2> Advertisement Successfully Create </h2>','success');
        return redirect('advertisements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
              $advertisement = Advertisement::find($id);
        return view('admin.advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisements.edit', compact('advertisement'));
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
        $advertisement = Advertisement::findOrFail($id);
        if ($request->hasFile('image')) {

         
            $file = $request->image;
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('advertisements_image', $image);
            $input['image'] = $image;
            
            if ($advertisement->image) {
                unlink(public_path('advertisements_image/' . $advertisement->image));
                //unlink(public_path('advertisements_image/thumbnail/' . $advertisement->image));
            }
        }

        $advertisement->update($input);
         Alert::Html('Success', '<h2> Advertisement Successfully Update </h2>','success');
        return redirect('advertisements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);
        $status = $advertisement->is_deleted;

        if ($status == 0) {
            $advertisement->is_deleted = '1';
        } else {
            $advertisement->is_deleted = '0';
        }
        $advertisement->save();

       Alert::Html('Success', '<h2> Advertisement Deleted </h2>','success');
        return redirect('advertisements');
    }

    public function changeStatus($id) {

        $advertisement = Advertisement::find($id);
        $status = $advertisement->is_active;

        if ($status == 0) {
            $advertisement->is_active = '1';
            $msg = 'Advertisement Active.';
            $alert = 'alert-success';
        } else {
            $advertisement->is_active = '0';
            $msg = 'Advertisement Inactive.';
            $alert = 'alert-danger';
        }
        $advertisement->save();

 Alert::Html('Success', '<h2> Status Changed </h2>','success');

        return redirect('advertisements');
    }
}
