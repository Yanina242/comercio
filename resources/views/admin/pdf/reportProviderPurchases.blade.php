<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de stock</title>
    <link rel="stylesheet" href="{{'css/pdf.css'}}" media="all" />
  </head>
  <body >
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('images/cotillon.png ') }}" >
      </div>
      <h1>LISTADO DE PROVEEDORES</h1>
      
    </header>
      

      @foreach($data2 as $provider)

         <h2>Proveedor: {{$provider->name}}</h2>
        
         
            <main>
             <table>
              <thead>
               <tr>
                <th>Factura</th>
                <th>Fecha</th>
                <th>Total</th>
                </tr>
                </thead> 
                 <tbody>
                 
                    @foreach($data as $invoice)

                      
                         @if($provider->id == $invoice->provider_id)
                            <tr>
                            <td class="text-center">{{$invoice->id}}</td>
                            <td class="text-center">{{$invoice->created_at->format('d/m/Y')}}</td>
                            <td class="text-center">${{$invoice->total}}</td>
                            </tr>
                          @endif
                      

                     @endforeach 
         
                </tbody>

             </table> 
            </main>
      @endforeach
            

    <footer>
     
    </footer>
    
  </body>
</html>