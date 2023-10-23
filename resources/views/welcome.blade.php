@extends('layouts.plantilla1')
@section('estilos')
    <style>

        .text-oro,
        .text-plata,
        .text-bronce {
            display: inline-block;
            border-radius: 10px;
            padding: 10px;
        }

        .text-oro {
            background-color: gold; 
        }

        .text-plata {
            background-color: silver;
        }

        .text-bronce {
            background-color: #cd7f32;
        }        
    </style>    
@endsection
@section('contenido')
    <div lc-helper="background" class="container-fluid py-5 mb-4 d-flex justify-content-center" style="  background-image: url('{{asset('img/turismo-bg.jpg')}}');
        background-position: center;
        background-size:cover;
        background-repeat:no-repeat">
        <div class="p-5 mb-4 lc-block col-xxl-7 col-lg-8 col-12" style=" backdrop-filter: blur(6px) saturate(102%);
        -webkit-backdrop-filter: blur(6px) saturate(102%);
        background-color: rgba(255, 255, 255, 0.45);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);">
        <div class="lc-block">
        <div editable="rich">
            <h2 class="fw-bolder display-3">VISITA LAS MARAVILLAS DEL PERU</h2>
        </div>
        </div>
        <div class="lc-block col-md-8">
        <div editable="rich">
            <p class="lead">Embárcate en una aventura inolvidable en Perú. Desde la mística Machu Picchu hasta la costa del Pacífico, este país te ofrece un viaje lleno de maravillas, historia y sabores únicos. ¡Ven a explorar Perú y descubre su magia!
            </p>
        </div>
        </div>
        <div class="lc-block">
        <a class="btn btn-dark" href="{{route('administrar.index')}}" role="button">Agregar Lugares</a>
        </div>
        </div>
    </div>

    <section>
        <div class="container mt-4">
            <div class="d-flex flex-wrap justify-content-center">
                  @foreach ($lugares as $lugar)    
                  <div class="card my-3 mx-3" style="width: 18rem;">
                    <img src="{{'imagenes/'.json_decode($lugar->imagen)->medium}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$lugar->nombre}}</h5>
                      <p class="card-text">{{$lugar->descripcion}}</p>
                      <h5 class="card-title">
                        @if ($lugar->paquete === 'Oro')
                            <h5 class="card-title text-oro">{{ $lugar->paquete }}</h5>
                        @elseif ($lugar->paquete === 'Plata')
                            <h5 class="card-title text-plata">{{ $lugar->paquete }}</h5>
                        @elseif ($lugar->paquete === 'Bronce')
                            <h5 class="card-title text-bronce">{{ $lugar->paquete }}</h5>
                        @else
                            <h5 class="card-title">{{ $lugar->paquete }}</h5>
                        @endif
                      </h5>
                      <h5 class="card-title">
                        @foreach ($paquetes as $paquete)
                            @if ($paquete->nombre === $lugar->paquete)
                                <p>S/{{ $paquete->precio }}</p>
                            @endif
                        @endforeach
                      </h5>
                    </div>
                  </div>
                  @endforeach
          </div>
    </section>
@endsection
