<?php

namespace App\Http\Controllers;
use App\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
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
        $blog->description = $request->get('content');
        $blog->author = $request->get('author');
        $blog->image = $request->get('image');
        $blog->created_date = date('Y-m-d');
        $blog->save();
        return redirect('/admin/blog')->with('success', 'Registro guardado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Blog::find($id);
        return view('business-casual/blog_update',compact('row'));
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
        $blog = Blog::find($id);
        $blog->title = $request->get('title');
        $blog->description = $request->get('content');
        $blog->author = $request->get('author');
        $blog->image = $request->get('image');
        $blog->created_date = date('Y-m-d');
        $blog->save();
        return redirect('/admin/blog')->with('success', 'Registro actualizado correctamente');
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
