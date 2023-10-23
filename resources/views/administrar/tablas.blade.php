@extends('layouts.plantilla1')

@section('contenido')
<div class="p-5 responsive">
        <a href={{route('administrar.create')}}><button class="btn btn-primary">Nuevo Lugar turistico</button></a>
        <br>
        @if(session('success'))
            <div class="alert alert-success col-3 mt-2">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Region</th>
                <th scope="col">Paquete</th>
                <th scope="col">Decripcion</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>

            </tr>
            </thead>
            <tbody>
                @foreach ($lugares as $lugar)
                <tr>
                    <th scope="row">{{$lugar->nombre}}</th>
                    <td>{{$lugar->region}}</td>
                    <td>{{$lugar->paquete}}</td>
                    <td>{{$lugar->descripcion}}</td>
                    <td>
                        <a href="{{'imagenes/'.json_decode($lugar->imagen)->full}}">
                            <img src="{{'imagenes/'.json_decode($lugar->imagen)->thumb}}">
                        </a>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('administrar.edit', $lugar->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                            {{-- <a href="" id="eliminar" class="btn btn-danger"><i class="bi bi-trash3"></i></a> --}}
                            <form action="{{ route('administrar.destroy', $lugar->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>



@endsection