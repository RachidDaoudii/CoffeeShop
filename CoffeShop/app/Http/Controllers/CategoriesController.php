<?php

namespace App\Http\Controllers;

use App\Models\ModelCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        // 1er methode
        $categories = ModelCategories::latest()->paginate(4);
        // 2eme metohde joint 
        // $categories = DB::table('model_categories')
        // ->join('users','model_categories.id_user','users.id')
        // ->select('model_categories.*','users.name')->latest()->paginate(4);
        return view('admin.category',compact('categories'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'name_category' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category less then 255Chars'
        ]);

        ModelCategories::insert([
            'name_category' => $request->name_category,
            'id_user' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category Inserted Successfull');
    }



    public function Show($id)
    {
        $show = ModelCategories::find($id);
        return view('admin.editCategory',compact('show'));
    }

    public function Delete($id)
    {
        $delete = ModelCategories::find($id)->delete();
        return Redirect()->back()->with('success','Category Deleted Successfull');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_category' => 'required|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category less then 255Chars'
        ]);

        $update = ModelCategories::find($id)->update([
            'name_category' => $request->name_category,
            'id_user'       => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success','Category Updated Successfull');
    }
}
