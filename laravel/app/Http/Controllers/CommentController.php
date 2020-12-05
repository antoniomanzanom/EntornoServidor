<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use Session;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $id_imagen)
    {
        App\Comment::where('id', $id)->first()->delete();
        return redirect()->to('image/'.$id_imagen);
    }

    public function save(Request $request, $id_imagen)
    {        
        $user= Auth::user();
        $validatedData = $request->validate([ 
            'comentario' => 'required|string|max:255',
        ]);
        $id=$user->id;
        $comment = App\Comment::create([
            'user_id' => $id,
            'images_id' => $id_imagen,
            'content' => $request['comentario'],


        ]);

            Session::flash('alert', 'success|¡Todo correcto!');

            return redirect()->to('image/'.$id_imagen)
                    ->withSuccess('success message');
    }
}
