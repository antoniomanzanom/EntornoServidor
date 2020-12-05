<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use Session;
use User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user= Auth::user();
        $perfiles = App\User::all();

       // $contador = App\Image::where('id',$id)->withCount('comments')->get()->first();
        $imagenes = App\Image::orderBy('id', 'desc')->paginate(5);
        return view('home', array(
            'titulo_ventana' => "Página principal",
            'titulo' => "Instagram",
            'panel_control' => true,
            'username' => $user->name,
            'nick' => $user->nick,
            'image' => $imagenes,
            'perfiles' => $perfiles,
            
        ));
    }

    public function config()
    {
        return view('configuracion'); 
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
    public function update(Request $request)
    {
        $user= Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick'=>'required|string|max:255|unique:users,nick,id',
            'email'=>'required|string|email|max:255|unique:users,email,id'
        ]);

        $imagePath = request('avatar')->store('uploads','public');

        $id=$user->id;
        
        App\User::where('id',$id)->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'nick' => $request['nick'],
            'email' => $request['email'],
            'image'=>$imagePath,
        ]);
        
        Session::flash('alert', 'success|¡Todo correcto!');

        return redirect()->to('configuracion')
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
        //
    }
    public function getImage(){
        return Auth::user()->image;
    }
}
