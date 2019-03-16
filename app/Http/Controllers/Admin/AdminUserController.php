<?php

namespace Studihub\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Studihub\Http\Controllers\AdminBaseController;
use Studihub\Models\Role;
use Studihub\Models\User;

class AdminUserController extends AdminBaseController
{
    //Note : Remember the user is the admin,
    // consist of site managers, super admins and tutors

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $admins = User::all();
        return view('admin.pages.admins.index',compact('admins'));
    }

    public function show(User $admin){
        return view('admin.pages.admins.show',compact('admin'));
    }


    public function edit(User $admin){
        $roles = Role::pluck('name','id');
        $states = [];
        return view('admin.pages.admins.edit',compact('admin','roles','states'));
    }


    public function create(){
        $roles = Role::pluck('name','id');
        $states = ['',''];
        return view('admin.pages.admins.create',compact('states','roles'));
    }

    public function store(){
        $data = request()->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|regex:/[0-9]{10}/|digits:11',
            'gender' => 'required',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'nullable',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string',
            'role' => 'required',
            'photo' => 'string',
        ]);

        $admin = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
            'avatar' => $data['photo'],
            'password' => bcrypt($data['password']),
        ]);

        if($data['photo'] != $admin->avatar){
            //if the admin uploads new photo, remove the old one
            //Todo: change to move file to temp
            $this->removePhoto($admin);
        }

        if ($admin->id != null){
            $admin->roles()->attach($data['role']);
            flash()->success('success', $admin->fullname. 'add');
            return redirect()->route('admin.admins.index');
        }

        if(isset($data['avatar'])){
            //if update fails, remove the already uploaded file
            if(File::exists(public_path($data['avatar']))) {
                File::delete(public_path($data['avatar']));
            }
        }

        flash()->error('error', "Unable to add admin. Try again");

        return back()->withInput();

    }

    public function update(User $admin){
        $data = request()->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'photo' => 'string',
            'password' => '',
            'password_confirmation' => '',
        ]);

        //dd($data['photo'] != $admin->photo);

        if($data['photo'] != $admin->avatar){
            //if the admin uploads new photo, remove the old one
            //Todo: change to move file to temp
            $this->removePhoto($admin);
        }
        $updated = $admin->update([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'avatar' => $data['photo'],
            'password' => $data['password'] ? bcrypt($data['password']) : $admin->password,
        ]);
        if($updated){
            //Todo: add delete file from temp
            flash()->success('success', 'Profile Updated');
            return back();
        }

        if(isset($data['avatar'])){
            //if update fails, remove the already uploaded file
            if(File::exists(public_path($data['avatar']))) {
                File::delete(public_path($data['avatar']));
            }
        }
        //Todo: add restore file from temp

        return back();
    }


    public function destroy(User $user){
       $delete = $user->delete();
       if($delete){
           return response()->json(['success' => "Student Deleted successfully."]);
       }
        return response()->json(['error' => "Student Deleted successfully."]);
    }


    public function banadmin($id){
        //Remember the user is the admin,
        // consist of site managers, super admins and tutors
        $user = User::find($id);
        if ($user->isNotBanned()){
            $user->ban([
                'comment' => 'Enjoy your ban!',
            ]);
            flash()->success('success', $user->fullname.' Banned');
            return back();
        }
        flash()->error('error', $user->fullname.' Could not be ban');
        return back();
    }

    public function unbanadmin($id){
        //Remember the user is the admin,
        // consist of site managers, super admins and tutors

        $admin = User::onlyBanned()->find($id);
        if ($admin->isBanned()){
            $admin->unban([
                'comment' => 'Enjoy your ban!',
            ]);
            flash()->success('success', $admin->fullname.' UnBanned');
            return back();
        }
        flash()->error('error', $admin->fullname.' Could not be ban');
        return back();
    }

    public function upload(){
        $file = request()->file;
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $name = date('Y-m-d-H-i-s').'-'.pathinfo($strippedName, PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();

        $folder = '/uploads/admin/photos/'.Auth()->id().'/';
/*        $small_image = Image::make($file)
            ->resize(180, 180, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($file->getClientOriginalExtension(), 75);
        Storage::disk('public')->put($folder.'thumbnails/'.$name.'.'.$ext, $small_image, 'public');*/
        $large_image = Image::make($file)
            ->resize(270, 270, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($file->getClientOriginalExtension(), 75);
        $uploaded = Storage::disk('public')->put($folder.$name.'.'.$ext, $large_image, 'public');
        $file_path = 'storage'.$folder.$name.'.'.$ext;
        if($uploaded){
            return response()->json(['success'=>'Successfully uploaded new file!', 'file'=>$name.'.'.$ext, 'path'=>$file_path]);
        }
        return response()->json(['msg' => 'Unable to upload your file.']);
    }

    public function removePhoto($admin){
        if($admin->avatar != null){
            if(File::exists(public_path($admin->avatar))) {
                File::delete(public_path($admin->avatar));
            }
        }
    }
}
