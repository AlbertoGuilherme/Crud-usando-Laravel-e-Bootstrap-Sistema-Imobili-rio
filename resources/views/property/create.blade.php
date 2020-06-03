@extends('property.master')

@section('content')
<div class="container my-3">    

<h1>Formulario de cadastro :: Imoveis</h1>


<form method="post" action="<?= url('/imoveis/store');  ?>">
<?= csrf_field(); ?>


<div class="form-group">
<label for="title" >titulo do imovel</label>
    <input  type="text" name="title" class="form-control">
    </div>
    
    <div class="form-group">
         <label for="description">Descricao</label>
     <textarea id="description"  name="description" rows="3" class="form-control"></textarea>
    </div>
    
   <div class="form-group">
     <label for="title" >Valor de aluguer</label>
    <input  type="text" name="rental_price" class="form-control">
    
    </div>
            <br><div class="form-group"> 
            <label for="title" >Valor de venda</label>
   
            <input  type="text" name="sale_price" class="form-control">
        </div>
     <div class="form-group"> 
         <input class="btn btn-primary" type="submit" value="Cadastrar Artigo">
    </div>
</form>
</div>
@endsection