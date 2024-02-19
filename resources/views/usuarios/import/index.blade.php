@extends('layouts.app')

@section('contenido')
    <div class="p-5">
        @if (session('success'))
               <div class="alert alert-success alert-dismissible show fade">
                   <strong>Exito! </strong> {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           @endif
        <div class="text-center">
            <h1>Importar excel a la Base De Datos</h1>
        </div>
       <form action="{{ route('importar.excel') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <label for="archivo_excel">Seleccionar archivo Excel</label>
           <input type="file" name="archivo_excel" id="archivo_excel" class="form-control">

           <div class="py-2">
               <button type="submit" class="btn btn-primary">Subir</button>
           </div>
       </form>
    </div>
@endsection
