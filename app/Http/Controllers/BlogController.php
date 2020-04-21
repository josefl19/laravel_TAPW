<?php

namespace App\Http\Controllers;
use App\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
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
        $posts = Blog::all();
        return view('business-casual/adminBlog',['posts'=>$posts]);
    }

    public function getJSON()
    {
        $posts_json = Blog::all();
        $posts = array();
        foreach($posts_json as $key => $row) {
            //$modal='<a href="\'#myModal{{'.$row['id'].'}}\'" data-toggle="modal" data-target="#myModal{{'.$row['id'].'}}"><i class="fas fa-eye fa-2x"></i></a>';
            //$edit='<a href="\' {{ route(admin.edit, '.$row['id'].') }}"\'><i class="far fa-edit fa-2x"></i></a>';
            //$destroy='<a href="{{ route(\'admin.destroy\', '.$row['id'].') }}"><i class="fa fa-trash fa-2x"></i></a>';
            array_push($posts, [
                $row['id'], 
                $row['title'], 
                $row['description'], 
                $row['created_date'], 
                $row['image'], 
                $row['author'],
                '<i id="'.$row->id.'" class="view_post btn fa fa-eye fa-2x"></i>',
                '<i id="'.$row->id.'" class="edit_post btn fa fa-edit fa-2x"></i>',
                '<i id="'.$row->id.'" class="del_post btn fa fa-trash fa-2x"></i>',
            ]);
        }
        return json_encode(["data"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business-casual/blog_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->description = $request->get('description');
        $blog->author = $request->get('author');
        $blog->image = $request->get('image');
        $blog->created_date = date('Y-m-d');
        $blog->save();

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
        $res=Blog::find($id);
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
        //$row = Blog::find($id);
        //return view('business-casual/blog_update',compact('row'));

        $res=Blog::find($id);
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
        //$blog = Blog::find($id);
        //$blog->title = $request->get('title');
        //$blog->description = $request->get('content');
        //$blog->author = $request->get('author');
        //$blog->image = $request->get('image');
        //$blog->created_date = date('Y-m-d');
        //$blog->save();
        //return redirect('/admin/blog')->with('success', 'Registro actualizado correctamente');

        Blog::updateOrCreate(['id' => $request->id],
                             ['title' => $request->title, 
                              'description' => $request->description,
                              'author' => $request->author,
                              'image' => $request->image]); 
                              
        /*$form_data = array(
            'title' => $request->titleEdit, 
            'description' => $request->descriptionEdit,
            'author' => $request->authorEdit,
            'image' => $request->imageEdit
        );
        Blog::whereId($request->id)->update($form_data);*/

        return response()->json(['success' => 'Data is successfully updated']);

        //return response()->json(['success'=>'Product saved successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$flight = Blog::find($id);
        //$flight->delete();
        $post = Blog::find($id);
        $post->delete();
        return redirect('admin/blog')->with('success', 'Post borrado satisfactoriamente');
    }

    public function delete($id)
    {
        $row = Blog::find($id);
        return view('business-casual/blog_delete',['row'=>$row]);
    }
}
