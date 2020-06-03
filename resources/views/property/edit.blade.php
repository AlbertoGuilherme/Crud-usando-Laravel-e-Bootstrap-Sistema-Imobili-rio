@extends('property.master')
@section('content')
    
<div class="container my-3">
<h1>Formulario de cadastro :: Imoveis</h1>
<?php
  $property= $property[0];
 ?>

<form method="post" action="<?= url('/imoveis/update', ['id'=>$property->id]);  ?>">
<?= csrf_field(); ?>
<?= method_field('PUT')?>
 <div class="form-group">
<label for="title" >titulo do imovel</label>
    <input  type="text" name="title" value='<?= $property->title ?>' class="form-control">
 </div>
    <div class="form-group">
         <label for="description">Descricao</label>
     <textarea id="description"  name="description" rows="3" class="form-control"><?= $property->description ?></textarea>
    </div> 
    
    <div class="form-group">
     <label for="rental_price" >Valor de aluguer</label>
    <input  type="text" name="rental_price" value='<?= $property->rental_price ?>' class="form-control">
    </div>  
    
        <div class="form-group">
    <label for="sale_price" >Valor de venda</label>
    <input  type="text" name="sale_price" value= '<?= $property->sale_price ?>' class="form-control">
    </div>  
    
    <input class="btn btn-secondary" type="submit" value="Atualizar artigo">
</form>
</div>
@endsection