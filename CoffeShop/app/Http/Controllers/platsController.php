<?php

namespace App\Http\Controllers;

use App\Models\Plats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class platsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plats = DB::table('plats')
        ->join('model_categories','plats.id_category','model_categories.id')
        ->select('plats.*','model_categories.name_category')
        ->latest()->paginate(4);
        // $plats = Plats::latest()->paginate(4);
        // $plats = DB::table('plats')->get();
        $categories =DB::table('model_categories')->get();

        return view('admin.plats',compact('plats','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img_plat'      => 'required|mimes:jpg,png,jpeg',
            'name_plat'     => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'category'         => 'required',
        ],[
            'img_plat.required' => 'Please Input Plat image',
            'name_plat.required' => 'Please Input Plat name',
            'description.required' => 'Please Input Plat description',
            'price.required' => 'Please Input Plat price',
            'category.required' => 'Please Input Plat category'
        ]);

        $plat_image = $request->file('img_plat');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($plat_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $location = 'img/plats/';
        $last_img = $location.$img_name;
        $plat_image->move($location,$img_name);

        $store = Plats::insert([
            'img' => $last_img,
            'name' => $request->name_plat,
            'id_category' =>$request->category,
            'description' => $request->description,
            'price' => $request->price,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Plat Inserted Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Plats::find($id);
        $categories =DB::table('model_categories')->get();
        return view('admin.editPlat',compact('show','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $request->validate([
            'img_plat'      => 'required|mimes:jpg,png,jpeg',
            'name_plat'     => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'category'         => 'required',
        ],[
            'img_plat.required' => 'Please Input Plat image',
            'name_plat.required' => 'Please Input Plat name',
            'description.required' => 'Please Input Plat description',
            'price.required' => 'Please Input Plat price',
            'category.required' => 'Please Input Plat category'
        ]);

        $old_img = $request->old_img;

        $plat_image = $request->file('img_plat');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($plat_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $location = 'img/plats/';
        $last_img = $location.$img_name;
        $plat_image->move($location,$img_name);

        unlink($old_img);

        $update = Plats::find($id)->update([
            'img' => $last_img,
            'name' => $request->name_plat,
            'description' => $request->description,
            'price' => $request->price,
            'id_category' => $request->category,
            'created_at' => Carbon::now(),
        ]);

        return to_route('plats.index')->with('success','Plat Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Plats::find($id);
        $old_img = $img->img;
        unlink($old_img);
        $delete = Plats::find($id)->delete();
        
        return Redirect()->back()->with('success','Plat Deleted Successfull');
    }
}
