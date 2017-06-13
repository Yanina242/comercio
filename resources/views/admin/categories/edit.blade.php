@extends('layouts.main')
 
 
@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <!-- Default box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Modificar categoria</h3>
           

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Cerrar">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            
            {!! Form::model($category,['route'=>['categories.update',$category->id], 'method'=>'PATCH', 'files'=>true])!!}

              <div class="form-group">
              {!! Form::label('name','Nombre')!!}
              {!! Form::text('name',$category->name, ['class'=>'form-control'])!!}
              </div>

              <div>
                   {!!form::label('Imagen Actual: ')!!} <img src="{{ asset('images/categories/'.$category->extension)  }}" width="40" height="40" > 
                </div>
              <div class="form-group">
              {!! Form::label('image','Nueva Imagen')!!}
              {!! Form::file('image')!!}
             </div>

              <div class="form-group">
              {!! Form::label('description','Descripcion')!!}
              {!! Form::text('description',null, ['class'=>'form-control'])!!}
              </div>
              
              <div class="form-group">
              {!! Form::submit('Guardar Cambios',['class'=>'btn btn-primary'])!!}
              </div>
 
              {!! Form::close() !!}

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>
  </div>
@endsection
@section('js')
<script>
  $('.select-tag').chosen({
   // placeholder_text_multiple: "Seleccione los eventos",

    
  });

</script>
@endsection