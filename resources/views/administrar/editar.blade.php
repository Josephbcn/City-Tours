@extends('layouts.plantilla1')

@section('contenido')
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
            <div class="card-header">
                <strong>{{isset($lugar)?'Editar lugar turistico':'Crear lugar turistico'}}</strong>  
            </div>
            
            <br><br>
            <form action="{{route('administrar.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                @if(isset($lugar))
                <input name="id" value="{{$lugar->id}}" type="hidden">
                @endif 

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre de lugar</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{isset($lugar)?$lugar->nombre:''}}">
                    @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="selectRegion" class="form-label">Seleccione una región</label>
                    <select class="form-select" id="selectRegion" name="region">
                        <option value="{{isset($lugar)?$lugar->region:''}}" selected>{{isset($lugar)?$lugar->region:'Seleccione una region'}}</option>
                        @foreach ($regiones as $region)
                        <option value="{{$region->nombre}}">{{$region->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="selectPaquete" class="form-label">Seleccione un paquete</label>
                    <select class="form-select" id="selectPaquete" name="paquete">
                    <option value="{{isset($lugar)?$lugar->paquete:''}}" selected>{{isset($lugar)?$lugar->paquete:'Seleccione un paquete'}}</option>
                    @foreach ($paquetes as $paquete)
                    <option value="{{$paquete->nombre}}">{{$paquete->nombre}}</option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción del lugar</label>
                    <textarea class="form-control" id="descripcionid" name="descripcion" rows="3" placeholder="Descripción">{{ isset($lugar) ? $lugar->descripcion : '' }}</textarea>
                </div>

                <div class="form-group">
                    <label for="foto" class="form-control-label custom-label">Subir Imagen</label>
                    <input type="file" id="foto" name="foto" class="form-control custom-input-file">
                </div>

                <button type="submit" class="btn btn-primary">{{isset($lugar)?'Editar lugar':'Crear lugar'}}</button>

            </form>
          </div>
        </div>
      </div>
@endsection