@extends('layouts.main')

@section('content')

<div class="box box-primary">

<div class="box-header ">
<h2 class="box-title col-md-5">Eventos Encontrados</h2>
    
                   <!-- search name form -->
     
        <form route='admin.events.index'  method="GET" class="col-md-3 col-md-offset-4 ">
            <div class="input-group">
              <input type="text" name="name" class="form-control" placeholder="Nombre..."> 
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
          <!-- /.search form -->

</div>
<div class="box-body">              

 <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
       
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Acción</th>
                   
            </tr>
        </thead>
     
       
<tbody>
   @foreach($events as $event) 

          @if ($event->status!='inactivo')
            <tr role="row" class="odd">
          @else
            <tr role="row" class="odd" style="background-color: rgb(255,96,96);">
          @endif
            <td>{{$event->name}}</td>
            <td>{{$event->status}}</td>

            <td>
            @if ($event->status!='activo')
                   <a href="{{route('events.enable',$event->id)}}" onclick="return confirm('¿Seguro dar de alta este evento?')">
                        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true" ></span>
                        </button>
                     </a>
               
            @else
                   <a href="{{route('events.desable',$event->id)}}" onclick="return confirm('¿Seguro dara de baja este evento?')">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                     </a>
            @endif
            </td>
           
        </tr>
  @endforeach
</tbody>
    </table>




</div>

</div>


@endsection