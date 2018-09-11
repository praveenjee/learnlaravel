<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$total = Category::count();
    	//$categories = Category::select('id', 'title', 'slug', 'status', 'created_at')->paginate(5);
    	$categories = Category::all();
    	
    	return view('back.categories.index', compact(['categories', 'total']));		
    }

    public function edit(Category $category)
    {		
		return view('back.categories.edit', compact('category', $category));			
	}

	public function update(Request $request, Category $category)
    {
    	
    	$validate = [
            'title' => 'required|min:3',
            //'slug' => 'required|min:3'
        ];		
		$this->validate($request, $validate);

		$category->title = $request->title;
		$category->slug = $request->slug;
    	$category->status = $request->status;

    	$category->save();
    	$request->session()->flash('message', 'Successfully updated!');
    	return redirect('admin/categories');		   
    }

    public function create()
	{
		$pageTitle = 'Add New Category';
		return view('back.categories.create', compact(['pageTitle']));
	}

	public function store(Request $request)
	{
		$validate = [
            'title' => 'required|min:3',
            //'slug' => 'required|min:3'
        ];		
		$this->validate($request, $validate);

		$category = new Category;
		$category->title = $request->title;
		$category->slug = $request->slug;
		$category->status = $request->status;

		$category->save();
		$request->session()->flash('message', 'Successfully saved category!');
    	return redirect('admin/categories');
	}

	public function destroy(Request $request, Category $category)
	{
		//echo $category->id; 
		$category->delete();
        $request->session()->flash('message', 'Successfully deleted the category!');
        return redirect('admin/categories');
	}
}
