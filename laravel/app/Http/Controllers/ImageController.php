<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App;
use Session;
class ImageController extends Controller

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
        return view('image');
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
    public function update(Request $request, $id_imagen)
    {
        $user= Auth::user();
        $validatedData = $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ]);
        $imagePath = request('imagen')->store('imagenes','public');

        $id=$user->id;
        $imagen = App\Image::where('id',$id_imagen)
            ->update([
            'image_path' => $imagePath,
        ]);

        Session::flash('alert', 'success|¡Todo correcto!');

        return redirect()->to('image/'.$id_imagen)  
                ->withSuccess('success message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App\Image::where('id', $id)->delete();
        return redirect()->to('/');

    }

    public function save(Request $request){
        $user= Auth::user();
        $validatedData = $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'descripcion' => 'required|string|max:255',
        ]);
        $imagePath = request('imagen')->store('imagenes','public');

        $id=$user->id;
        $imagen = App\Image::create([
            'user_id' => $id,
            'image_path' => $imagePath,
            'description' => $request['descripcion'],
        ]);

            Session::flash('alert', 'success|¡Todo correcto!');

            return redirect()->to('/image/save')
                    ->withSuccess('success message');
    }

    public function detail($id){

        $user= Auth::user();
        $contador = App\Image::where('id',$id)->withCount('comments')->get()->first();
        $perfiles = App\User::all();
        $comentarios = App\Comment::all();
        $imagenes = App\Image::where('id', $id)->first();
        return view('comentarios', array(
            'id' => $id,
            'titulo_ventana' => "Página principal",
            'titulo' => "Instagram",
            'panel_control' => true,
            'username' => $user->name,
            'nick' => $user->nick,
            'image' => $imagenes,
            'perfiles' => $perfiles,
            'comentarios' => $comentarios,
            'contador'=>$contador,

        ));
    }
}
