<?php

namespace App\Http\Controllers;

use App\Models\Plats;
use Carbon\Carbon;
use Illuminate\Http\Request;

class platsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plats = Plats::latest()->paginate(4);
        return view('admin.plats',compact('plats'));
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
        ],[
            'img_plat.required' => 'Please Input Plat image',
            'name_plat.required' => 'Please Input Plat name',
            'description.required' => 'Please Input Plat description',
            'price.required' => 'Please Input Plat price',
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
        return view('admin.editPlat',compact('show'));
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
        ],[
            'img_plat.required' => 'Please Input Plat image',
            'name_plat.required' => 'Please Input Plat name',
            'description.required' => 'Please Input Plat description',
            'price.required' => 'Please Input Plat price',
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
        return Redirect()->back()->with('success','Plat Deleted Successfull');
    }
}
