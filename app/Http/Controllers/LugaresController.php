<?php

namespace App\Http\Controllers;


use App\Models\LugaresT;
use App\Models\Paquete;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;




class LugaresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lugares = LugaresT::all();
        return view('administrar.tablas', compact('lugares'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regiones = Region::all();
        $paquetes = Paquete::all();
        return view('administrar.editar', compact('regiones', 'paquetes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "HOLA";
        $validacion = Validator::make($request->all(),[
            'nombre' => 'required|max:100',
            'region' => 'required',
            'paquete' => 'required',
            'descripcion' => 'required',
            'foto' => 'required',
        ],[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no debe tener más de 100 caracteres.',
            'region.required' => 'El campo región es obligatorio.',
            'paquete.required' => 'El campo paquete es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'foto.required' => 'El campo foto es obligatorio.',
        ]);

        if ($validacion->fails()) {
            return redirect()->back()->with([
                "status" => false,
                "error" => $validacion->messages(),
            ]);
        }

        if($request->has('id')){
            $lugar = LugaresT::find($request->input('id'));
        }
        else{
            $lugar=new LugaresT();
        }

        $lugar->nombre = $request->input('nombre');
        $lugar->descripcion = $request->input('descripcion');
        $lugar->paquete = $request->input('paquete');
        $lugar->region = $request->input('region');

        if($request->hasFile('foto')){
            $nombre= str_replace(".".$request->file('foto')->getClientOriginalExtension(),"",$request->file('foto')->getClientOriginalName());
            $lugar->imagen = $this->cargarImagen($nombre,$request->file('foto'),"/lugaresimg");
        }

        if ($lugar->save()) {
            // return 'hola xd';
            return redirect()->route('administrar.index')->with('success', 'Lugar creado exitosamente');
        }

        return redirect()->back()->with('error', 'Error al crear el lugar turistico');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lugar = LugaresT::find($id);
        $regiones = Region::all();
        $paquetes = Paquete::all();

        return view('administrar.editar', compact('lugar', 'regiones', 'paquetes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lugar = LugaresT::find($id);

        if ($lugar) {

            $imagenes = json_decode($lugar->imagen, true);

            foreach ($imagenes as $imagen) {
                Storage::delete($imagen);
            }
            $lugar->delete();

            return redirect()->route('administrar.index');
        } else {
            return redirect()->route('administrar.index');
        }
    }

    private function cargarImagen($nombre,$archivo,$ruta_prod){
        $ruta="../storage/app/public".$ruta_prod;
        $extension=$archivo->getClientOriginalExtension();    //metodo

        Image::make($archivo)->resize(100,100)->save($ruta."/".$nombre."-thumb.".$extension);
        Image::make($archivo)->resize(400,400)->save($ruta."/".$nombre."-medium.".$extension);
        Image::make($archivo)->save($ruta."/".$nombre."-full.".$extension);

        $fotos= array(
            "thumb"=>str_replace("../storage/app/","",$ruta)."/".$nombre."-thumb.".$extension, 
            "medium"=>str_replace("../storage/app/","",$ruta)."/".$nombre."-medium.".$extension,
            "full"=>str_replace("../storage/app/","",$ruta)."/".$nombre."-full.".$extension,
        );

        return json_encode($fotos);
    }

}
