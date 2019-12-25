<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use DataTables;
use Validator;
use URL;
use Hash;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)

    {         $role = Session::get('key');
            if ($role== 'all_roles'){$role=NULL; }
            if ($request->ajax()){            
            if ($request->role OR $role){  
            if ($request->role){
               Session::put('key',$request->role);
                $role=$request->role;}
                $users = User::select('users.*', 'roles.name as role_name')
                    ->leftjoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('users.is_deleted', 0)
                    ->where('roles.name', $role)
                    ->get();
            if ($request->role=='all_roles'){ 
                $users =User::select('users.*', 'roles.name as role_name')
                    ->leftjoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('users.is_deleted', 0)
                    ->get();}}
            else{
            $users = User::select('users.*', 'roles.name as role_name')
                    ->leftjoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('users.is_deleted', 0)
                    ->get();}
            return Datatables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($users){   
            return '<a href="' . URL('/users/' . $users->id) . '" class="edit btn btn-primary btn-sm">Show</i></a>
            <a href="' . URL('/users/' . $users->id . '/edit/') . '" class="edit btn btn-primary btn-sm">Edit</i></a> 
            <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-student-delete" data-id="' . $users->id . '">Delete</a>';})
            ->editColumn('status', function ($users){
            if ($users->is_active == 1){
            return '<a href="'.URL('users/change-status/'.$users->id).'"class="btn btn-success" data-id="'.$users->id .'">Active</a>';}
                else{
            return '<a href="'.URL('users/change-status/'.$users->id).'"class="btn btn-danger" data-id="'.$users->id.'">Inactive</a>';}})
                ->rawColumns(['action', 'status'])
                ->make(true);}
            $role = DB::table('roles')->select("*")
                ->get();
            return view('admin.users.index', compact('role'));}

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        'name' => 'required',

        'email' => 'required|email|unique:users,email',

        'password' => ['required', 'string', 'min:8'],

        'roles' => 'required'

        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        Alert::Html('Success', '<h2> User Created Successfully </h2>','success');
        return redirect()->route('users.index');          

    }

    public function show($id)
    {
        $user = User::with('roles')->find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
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
        DB::table('model_has_roles')
            ->where('model_id', $id)->delete();
        $user->assignRole($request->input('role'));
         Alert::Html('Success', '<h2> User Updated Successfully </h2>','success');
        return redirect("users");
    }

    public function usersdestroy(Request $request)
    {

        $id = $request->delete_id;
        $users = User::find($id);
        if (isset($users->id))
        {
            $status = $users->is_deleted;
            if ($status == 0)
            {
                $users->is_deleted = '1';
            }
            $users->save();

            echo json_encode(array(
                "status" => 1,
                "message" => "User Deleted Successfully"
            ));
        }
        else
        {
            echo json_encode(array(
                "status" => 0,
                "message" => "User doesnot exists"
            ));
        }
        die();
    }

    public function changeStatus($id)
    {

        $user = User::find($id);
        $status = $user->is_active;

        if ($status == 0)
        {
            $user->is_active = '1';
            $msg = 'User Active.';
            $alert = 'alert-success';
        }
        else
        {
            $user->is_active = '0';

            $msg = 'User Inactive.';
            $alert = 'alert-danger';
        }
        $user->save();
        Alert::Html('Success', '<h2> Status Changed </h2>','success');
         return redirect('users');
    }

}

