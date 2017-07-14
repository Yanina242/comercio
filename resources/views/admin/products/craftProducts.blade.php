@extends('layouts.main')

@section('content')

<div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-12">

        <!-- Default box -->
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Actualizar stock de productos personalizados</h3>
         </div>
        <div class="box-body">
          {!! Form::open(['route'=>'products.updateStock', 'method'=>'POST'])!!}
          <section>
              <div class="panel-body borde"><!--busqueda producto-->
                <h3>Producto</h3>
                <div class="row " >
                    <div class="col-md-3 pull-left" >
                         {!! form::label('Codigo')!!}
                         <input id="code" class="form-control" name="code" type="text" >
                         <input id="product_id" class="form-control " name="product_id" type="hidden" >
                    </div> 
                    <div class="pull-left">
                    <br>
                       <button type="button" class="btn btn-primary pull-left" data-toggle="modal" id="first" data-title="Buscar" data-target="#favoritesModalProduct">
                          <i class="fa fa-search"></i>Buscar
                       </button>
                   </div>
              
                   <div class="col-md-2 col-md-offset-2">
                        {!! Field::number('Cantidad')!!}
                        
                    </div>                    
                </div>

                 <div class="row " >
                    <div class="col-md-4 pull-left ">
                         {!!Field::text('name',null,['disabled'])!!}
                    </div>
                     
                    <div class="col-md-4  col-md-offset-1 ">
                         {!!Field::text('stock',null,['disabled'])!!}
                    </div>

                 </div>

                 <div class="form-group">
                   {!! Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                 </div>
             </div>
              
              </section>
              {!! Form::close() !!}
            </div>
 
          </div>
        </div>
      </div>
    </div>
@include('admin.products.searchCraftProducts')

@endsection

@section('js')
<script>
$('#search').on('keyup', function(){
  $value=$(this).val();
  $.ajax({
    type: 'get',
    url:  "{{ URL::to('admin/searchCraft')}}",
    data:{'search':$value},
    success: function(data){
      $('#mostrar').html(data);
    }
    
  })
})
</script>

<script>
  function SearchLetter($letter){
  $value=$letter;
  console.log($value);
  $.ajax({
    type: 'get',
    url:  "{{ URL::to('admin/searchCraftProducts')}}",
    data:{'searchL':$value},
    success: function(data){
      $('#mostrar').html(data);
    }
    
  });
  }
</script>

@endsection