<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use Validator;
use Session;
use URL;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function profile() {
        
        $id = Auth::guard()->user()->id;
        $user = User::find($id);
        return view('admin.auth.profile',compact('user'));
    }


     public function updateProfile(Request $request,$id) {
      
          $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        if ($request->hasFile('image'))
        {

            $file = $request->image;
            $imageName = $file->getClientOriginalName();
            $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
            $image = time() . "." . $file_ext;
            $upload_image = $file->move('users_images', $image);
            $input['image'] = $image;
            if ($user->image)
            {
                unlink(public_path('users_images/' . $user->image));
            }
        }
        if ($request->hasFile('aadhar_card_photo'))
        {

            $file1 = $request->aadhar_card_photo;
            $imageName1 = $file1->getClientOriginalName();
            $file_ext1 = pathinfo($imageName1, PATHINFO_EXTENSION);
            $image1 = time() . "." . $file_ext1;
            $upload_image1 = $file1->move('documents', $image1);
            $input['aadhar_card_photo'] = $image1;
            if ($user->aadhar_card_photo)
            {
                unlink(public_path('documents/' . $user->aadhar_card_photo));
            }
        }

        if ($request->hasFile('pan_card_photo'))
        {

            $file2 = $request->pan_card_photo;
            $imageName2 = $file2->getClientOriginalName();
            $file_ext2 = pathinfo($imageName2, PATHINFO_EXTENSION);
            $image2 = time() . "." . $file_ext2;
            $upload_image2 = $file2->move('documents', $image2);
            $input['pan_card_photo'] = $image2;
            if ($user->pan_card_photo)
            {
                unlink(public_path('documents/' . $user->pan_card_photo));
            }
        }
        $user->save();
 Alert::Html('Success', '<h2> Profile Updated Successfully </h2>','success');
            return redirect('profile'); 
        }

        public function dashboard() {
        
            if(!Auth::guard()->check()) {
                Session::flash('message', 'Authentication require.'); 
                Session::flash('alert-class', 'warning');
                return redirect('admin');
            }
            $totalcount['Totalbookings'] = DB::table('bookings')->count();
            $totalcount['Totalcourses'] = DB::table('courses')->count();
            $totalcount['TotalPendingApprovalCourses'] = DB::table('courses')->where('is_active','=',2)->count();
            $totalcount['Totalmembers'] = DB::table('model_has_roles')->where('role_id','=',3)->count();
            $totalcount['Totalinstructor'] = DB::table('model_has_roles')->where('role_id','=',2)->count();
            $totalcount['TotalPendingApprovalInstructor'] = DB::table('model_has_roles')->where('role_id','=',2)->count();
            
            $data['instructors'] = User::role('Instructor')->where('is_deleted','=',0)->orderby('id','desc')->limit(5)->get();
            $data['members'] = User::role('Member')->select('id','name','email')->where('is_deleted','=',0)->orderby('id','desc')->limit(5)->get();
            $data['bookings'] = DB::table('bookings')->select('booking_id','member_name','member_email','member_phone','total_amount','payment_status')->where('payment_status','!=','')->orderby('id','desc')->limit(5)->get();
            $data['courses'] = DB::table('courses')->select('id','title','price','offered_price')->where('is_deleted','=',0)->orderby('id','desc')->limit(5)->get();
            //echo '<pre>'; print_r($data); die;
            return View('admin.home',compact('totalcount','data'));
        }
        


        }
