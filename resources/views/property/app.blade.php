@extends('property.master')
@section('content')
<div class="container my-3">
<h1>Listagem de produto</h1>

<?php
echo"<table class='table table-striped table-hover'>";
echo"<thead class='bg-primary text-white'>
            <td>Titulo</td>
            <td>Valor de Locacao</td>
            <td>Valor de venda</td>
            <td>Acções</td>


    </thead>";


  if(!empty($properties)){// contem todos os dados que est\ao vindo da BD
   
      foreach($properties as $property){
		  
        $linkReadMore=url('/imoveis/'.$property->name);
        $linkEditItem=url('/imoveis/editar/'.$property->name);
        $linkRemoveItem=url('/imoveis/remover/'.$property->name);

          echo"<tr>
             <td>{$property->title}</td>
             <td>{$property->rental_price}</td>
             <td>{$property->sale_price}</td>
			 
			 
<td><a href='{$linkReadMore}'>Ver mais </a> |  
     <a href='{$linkEditItem}'>Editar</a> |
 <a href='{$linkRemoveItem}'>Remover</a> </td>
          
              </tr>";
     
    }
    echo"</table>";
  }

?> 
</div> 
@endsection
