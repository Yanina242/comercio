@extends('layouts.main')


@section('content')

<div class="box box-primary">

   <div class="box-header ">
      <div class="row">
           <h2 class="box-title col-md-5">Listado de Pedidos</h2>
      </div>

      <div class="row">
        <div class='col-sm-2 pull-right'>
            <input type ='button' class="btn btn-success"   value = 'Agregar'/> 
        </div>

        <div class='col-sm-6 pull-left'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                     <input type="text" id="daterange"  name="daterange" class="form-control" value="seleccione una fecha"/>          
                     <span class="input-group-addon">
                        <a href="{{route('purchases.index')}}"> <span  class="glyphicon glyphicon-calendar"></span>
                      </span></a>
                </div>
            </div>
         </div>
       </div>
   </div>

     <div class="box-body">              

        <table id="tabla table-striped" class="display table table-hover" cellspacing="0" width="100%">
          
		        <thead>
		            <tr>
		                <th>N° Orden Compra</th>
		                <th>Fecha Pedido</th>
		                 <th>Fecha Entrega</th>
		                <th>Proveedor</th>
		                <th>Estado</th>
		                 <th>Monto Pagado</th>
		                <th></th>

		                 
		            </tr>
		        </thead>
		     
       
                <tbody id="mostrar">
                   @foreach ($requests as $key => $request) 
         
                      @if ($requests->status!='cancelado' )
                  
			                <tr>
			                              
			                        <td>{{$request->id}}</td>
			                        <td>{{$request->created_at->format('d/m/Y')}}</td>
			                        <td>{{$request->date_given->format('d/m/Y')}}</td>
			                        <td>{{$request->client->name}}</td>
			                        <td>{{$request->status}}</td>
			                        <td>{{$request->bill}}</td>
			                        <td> 
			                        </td>
			                  </tr>

                       @endif
                         
                    @endforeach

              </tbody>
         </table>

     </div>
 </div>

@endsection

@section('js')
 <script type="text/javascript">
 var hoy= new Date();
$('input[name="daterange"]').daterangepicker(
{
    locale: {
      format: 'DD-MM-YYYY',
      "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
       
    },
    startDate: hoy.getMonth()+"/"+hoy.getDate()+"/"+hoy.getFullYear(),
    endDate: hoy

});
</script>

<script type="text/javascript">

  $('#daterange').on('change',function(){

var f1=$('#daterange') .data('daterangepicker').startDate.format('YYYY-MM-DD');
var f2=$('#daterange') .data('daterangepicker').endDate.format('YYYY-MM-DD');

  $.ajax({
    type: 'get',
    url:  "{{ URL::to('admin/searchData')}}",
    data:{'fecha1':f1,
          'fecha2':f2},
    success: function(data){
      $('#mostrar').html(data);
    }
    
  })



    
});


</script>


@endsection