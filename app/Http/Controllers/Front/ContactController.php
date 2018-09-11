<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact; 


//This mailable class is necessary for sending mail
use Illuminate\Support\Facades\Mail;
use App\Mail\sendContactsMail;

class ContactController extends Controller
{
    public function __construct()
    {
    	parent::__construct();
        //$this->middleware('auth');
    }
	
	public function create()
	{
		$pageTitle = 'Contact | MyBlog';		
		return view('front.contact.create', compact(['pageTitle']));
	}
	
	public function store(Request $request)
	{
		if ($request->isMethod('post')) {
			//return $request->all();

			$validate = [
				'fname' => 'required|min:3',
	            'email' => 'required|string|email|max:255',
	            'phone' => 'required|numeric|min:10',
				"message" => 'required'
			];
			$this->validate($request, $validate);
			
			$contact = new Contact();
			$contact->fname = $request->fname;
			$contact->lname = $request->lname;
			$contact->email = $request->email;
			$contact->phone = $request->phone;
			$contact->message = $request->message; 
			
			//Sending email to admin here
			$adminEmail = \Config::get('global.adminEmail'); 	
			Mail::to($adminEmail)->send(new sendContactsMail($contact));
				
			$contact->save();
			$request->session()->flash('message', 'Thanks for contacting us. We have saved your queries. Our representative will contact you soon.');
			
			return redirect()->route('contact.create');	
		} 
	}	
}
