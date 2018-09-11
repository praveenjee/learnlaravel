<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;


class ContactController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$total = Contact::count();
    	//$contacts = Category::select('name','email','phone','message', 'created_at')->paginate(5);
    	$contacts = Contact::all();
    	
    	return view('back.contacts.index', compact(['contacts', 'total']));		
    }

    public function destroy(Request $request, Contact $contact)
	{
		//echo $contact->id; 
		$contact->delete();
        $request->session()->flash('message', 'Successfully deleted the contact!');
        return redirect('admin/contacts');
	}
}
