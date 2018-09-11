<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UserController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {		
		/*
		//$total = User::count();	
		//$users = User::all();
		$users = User::select('id', 'name', 'email', 'valid', 'role', 'created_at')
				->where([['id', '>', 1], ['valid', '=', 1]])
				->paginate(5);
				
		return view('back.users.index', compact(['users', 'total']))
				->with('i', (request()->input('page', 1) - 1) * 5);		
		*/		
		$users = User::where([['id', '>', 1]])->get();
		$total = count($users);	
		
		return view('back.users.index', compact(['users', 'total']));				
	}
	
	public function edit(User $user)
    {		
		return view('back.users.edit', compact('user', $user));			
	} 
	
	public function update(Request $request, User $user)
    {
		if($request->email && $user->email != $request->email){
			$emailval = 'required|string|email|max:255|unique:users';
		} else {
			$emailval = 'required|string|email|max:255';
		}
		$validate = [
            'name' => 'required|min:3',
            'email' => $emailval,			
			'password' => 'required|string|min:6',
			'profileimage' => 'nullable|mimes:jpeg,jpg,png'
        ];		
		$this->validate($request, $validate);
		
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->dob = date("Y-m-d", strtotime($request->dob));
		$user->gender = $request->gender;
		$user->contactno = $request->contactno;
		$user->valid = $request->status;
		
		$file = $request->file('profileimage'); //var_dump($file); die;
		
		if($file !=""){
			if(\File::exists(public_path('uploads/users/' . $user->profileimage))){
				\File::delete(public_path('uploads/users/' . $user->profileimage));
			}			
			$fname = time() . "-". $file->getClientOriginalName(); 
			$file->move('uploads/users', $fname);
			$user->profileimage = $fname;
		}
		
		$user->save();
        $request->session()->flash('message', 'Successfully updated!');
        return redirect('admin/users');		
	}

	public function create()
	{
		$pageTitle = 'Add New User';
		return view('back.users.create', compact(['pageTitle']));
	}	
	
	public function store(Request $request)
    {
		$validate = [
            'name' => 'required|min:3',
            'email' => 'required|string|email|max:255|unique:users',			
			'password' => 'required|string|min:6',
			'profileimage' => 'nullable|mimes:jpeg,jpg,png'
        ];		
		$this->validate($request, $validate);
		
		$file = $request->file('profileimage'); //var_dump($file); die;
		
		//Image upload in public/uploads/users folder.
		$filename = time() . "-". $file->getClientOriginalName(); 
		$file->move('uploads/users', $filename);
		
		$user = new User;		
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->dob = date("Y-m-d", strtotime($request->dob));
		$user->gender = $request->gender;
		$user->contactno = $request->contactno;
		$user->valid = $request->status;
		$user->profileimage = $filename;
		
		$user->save();
		$request->session()->flash('message', 'Successfully added the user!');
        return redirect('admin/users');	
	}
	
	public function destroy(Request $request, User $user)
	{
		$user->delete();
        $request->session()->flash('message', 'Successfully deleted the user!');
        return redirect('admin/users');
	}
}
