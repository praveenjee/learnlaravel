<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Page;

class PageController extends Controller
{    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {		
		$pages = Page::all();		
		$total = Page::count();	
		
		return view('back.pages.index', compact(['pages', 'total']));	
	}

	public function create()
	{
		$pageTitle = 'Create New Page | MyBlog';				
		return view('back.pages.create', compact(['pageTitle']));
	}

	public function store(Request $request)
	{
		if($request->isMethod('POST')){
			$validate = [
	            'title' => 'required|min:3',
	            'body' => 'required'
	        ];		
			$this->validate($request, $validate);
			
			/*
			$page = new Page;
			$page->title = $request->title;
			$page->body = $request->body;
			$page->status = $request->status;
			$page->meta_title = $request->meta_title;
			$page->meta_keyword = $request->meta_keyword;
			$page->meta_description = $request->meta_description;
			$page->save();*/

			$input = $request->all();
			$page = Page::create($input);

			$request->session()->flash('message', 'Page added successfully!');
	    	return redirect('admin/pages');
		}
	}

	public function edit(Page $page)
    {
    	$pageTitle = 'Update Page | MyBlog';
    	$page = Page::findOrFail($page->id);

    	return view('back.pages.edit', compact(['page', 'pageTitle']));
    }

    public function update(Page $page, Request $request)
    {
    	$page = Page::findOrFail($page->id);

		if($request->isMethod('PUT') && $page)
		{
			$validate = [
	            'title' => 'required|min:3',
	            'body' => 'required'
	        ];		
			$this->validate($request, $validate);

			$page->title = $request->title;
			$page->body = $request->body;
			$page->status = $request->status;
			$page->meta_title = $request->meta_title;
			$page->meta_keyword = $request->meta_keyword;
			$page->meta_description = $request->meta_description;
			$page->save();

			$request->session()->flash('message', 'Page updated successfully!');
        	return redirect('admin/pages');	
		}
    }

    public function destroy(Page $page, Request $request)
	{
		$page = Page::findOrFail($page->id);
		if($page){
			$page->delete();
			
	        $request->session()->flash('message', 'Page deleted successfully!');
	        return redirect('admin/pages');
		}
	}

}
