<?php

namespace App\Http\Controllers;
use App\About;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = About::all();
        return view('business-casual/adminAbout',['team'=>$team]);
    }

    public function getJSON()
    {
        $team_json = About::all();
        $team = array();
        foreach($team_json as $key => $row) {
            array_push($team, [
                $row['id'], 
                $row['name'], 
                $row['puesto'],  
                //$row['image'],
                '<img src="/img/'.$row->image.'" width="70%"/>',
                '<i id="'.$row->id.'" class="view_member btn fa fa-eye fa-2x"></i>',
                '<i id="'.$row->id.'" class="edit_member btn fa fa-edit fa-2x"></i>',
                '<i id="'.$row->id.'" class="del_member btn fa fa-trash fa-2x"></i>',
            ]);
        }
        return json_encode(["data"=>$team]);
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
        $about = new About();
        $about->name = $request->get('name');
        $about->puesto = $request->get('puesto');
        $about->image = $request->get('image');
        $about->save();

        return response()->json(['success' => 'Data created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res=About::find($id);
        $res->imageName = $res->image;
        $res->image=asset("img/".$res->image);
        return json_encode($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=About::find($id);
        return json_encode($res);
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
        About::updateOrCreate(['id' => $request->id],
                             ['name' => $request->name, 
                              'puesto' => $request->puesto,
                              'image' => $request->image]); 

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = About::find($id);
        $post->delete();
        return redirect('admin/blog')->with('success', 'Miembro borrado satisfactoriamente');
    }
}
