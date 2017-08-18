@extends('layouts.main')

@section('content')

<div class="box box-primary">

<div class="box-header ">
<div class="row">
    <h2 class="box-title col-md-5">Listado de Ventas</h2>
</div>
      <div class="row">
      <div class='col-sm-2 pull-right'>
        <input type ='button' class="btn btn-success "  value = 'Agregar' onclick="location.href = '{{ route('invoices.create') }}'"/> 
        </div>
        <div class='col-sm-6 pull-left'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                     
                     <input type="text" id="daterange"  name="daterange" class="form-control" value="12/06/2017 - 16/07/2017" >          
                     <span class="input-group-addon">
                        <a href="{{route('invoices.index')}}"> <span  class="glyphicon glyphicon-calendar"></span>
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
                <th class="text-center">N° Venta</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
                <th></th>
                   
            </tr>
        </thead>
     
       
<tbody id="mostrar">
   @foreach ($invoices as $key => $invoice) 
         
                @if ($invoice->status!='inactivo')
                   <tr role="row" class="odd">
                
                @else
                  <tr role="row" class="odd" style="background-color: rgb(255,96,96)">
                
                @endif
                 
                        <td class="text-center">{{$invoice->id}}</td>
                        <td>{{$invoice->created_at->format('d/m/Y')}}</td>
                        <td>{{$invoice->client->name}}</td>
                        <td>${{$invoice->total}}</td>
                        <td>
                         

                        <a href="{{route('invoices.show',$invoice->id)}}" > <button  type="button" class="btn btn-info "  >
                        <span class="fa fa-list" aria-hidden="true" ></span></button></a>

                          @if ($invoice->status!='inactivo')
                             <a href="{{route('invoices.desable',$invoice->id)}}" onclick="return confirm('¿Seguro dara de baja el producto?')">
                        <button type="submit" class="btn btn-danger">
                          <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" ></span>
                        </button>
                     </a>
                     <a href="{{route('invoices.pdf',$invoice->id)}}" target="_blank" > <button  type="button" class="btn btn-primary "  ><i class="fa fa-print"></i> 
                      Generar PDF</button></a>
                       @endif     
        </tr>
        @endforeach

</tbody>
    </table>




</div>

</div>
@endsection
@section('js')
 <script type="text/javascript">
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
    startDate: '30-06-2015',
    endDate: '31-07-2015'

});
</script>

<script type="text/javascript">

  $('#daterange').on('change',function(){

var f1=$('#daterange') .data('daterangepicker').startDate.format('YYYY-MM-DD');
var f2=$('#daterange') .data('daterangepicker').endDate.format('YYYY-MM-DD');

  $.ajax({
    type: 'get',
    url:  "{{ URL::to('admin/searchDateInvoice')}}",
    data:{'fecha1':f1,
          'fecha2':f2},
    success: function(data){
      $('#mostrar').html(data);
    }
    
  })



    
});


</script>
<script type="text/javascript">
function myDetail(id){
dir=baseUrl('admin/invoices/'+id);
window.location.replace(dir); 
             
} 


</script>
<script type="text/javascript">
function myDelete(id){
  $.ajax({

type: "POST",
url: "{{ URL::to('invoices/desable')}}",
data: { id: id }
});

}
</script>

@endsection