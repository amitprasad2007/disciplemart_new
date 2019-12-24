<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth;
use Redirect;
use View;
use Validator;
use Session;
use DB;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $coupons = Coupon::where('is_deleted', '=', 0)->simplePaginate(7);
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create');
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
        if($input['number_of_code'] == 'bulk')
        {
            for($i=1;$i<$input['number_of_codes'];$i++)
            {
                $charecters = 'abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890';
                
                $input['code'] = substr( str_shuffle( $charecters ), 0, 6 );
                
                Coupon::create($input);
            }
        }
        else
        {
            Coupon::create($input);
        }
Alert::Html('Success', '<h2> Coupon Created Successfully </h2>','success');
        return redirect('coupons');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
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
        $coupon = Coupon::findOrFail($id);
        $coupon->update($input);
Alert::Html('Success', '<h2> Coupon Updated Successfully </h2>','success');
        return redirect('coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $coupon = Coupon::find($id);
        $status = $coupon->is_deleted;

        if ($status == 0) {
            $coupon->is_deleted = '1';
        } else {
            $coupon->is_deleted = '0';
        }
        $coupon->save();

Alert::Html('Success', '<h2> Coupon Deleted Successfully </h2>','success');
        return redirect('coupons');
    }

    public function changeStatus($id) {

        $coupon = Coupon::find($id);
        $status = $coupon->is_active;

        if ($status == 0) {
            $coupon->is_active = '1';
            $msg = 'Coupon Active.';
            $alert = 'alert-success';
        } else {
            $coupon->is_active = '0';
            $msg = 'Coupon Inactive.';
            $alert = 'alert-danger';
        }
        $coupon->save();

Alert::Html('Success', '<h2> Coupon Status Changed </h2>','success');
        return redirect('coupons');
    }

}