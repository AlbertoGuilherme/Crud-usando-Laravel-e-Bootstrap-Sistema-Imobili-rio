@extends('property.master')
@section('content')
	

<h1>Pagina Single</h1>
<?php

  if(!empty($property)){
	  foreach($property as $prop){
		  ?>
	<h2>Titulo : <?= $prop->title;?> </h2>


	<p>Descricao : <?= $prop->description;?> </p>


	<p>Valor de renda: <?= number_format($prop->rental_price, 2 , '.' , ',' );?> Kz</p>
	<p>Valor de venda: <?= number_format( $prop->sale_price,2, ' .', ',');?> Kz</p>
       <?php
	  }

  }
  ?>
  @endsection