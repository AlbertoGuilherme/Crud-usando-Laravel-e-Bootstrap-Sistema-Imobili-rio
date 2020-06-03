<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=asset('css/app.css'); ?>">
    <title>Dev:Laravel- Crud</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
       <div class="container">
           <a href="#" class="navbar-brand">Lara<b>Dev</b></a>
        <ul class="navbar-nav ml-auto" >
          <li class="nav-item"><a href="<?= url('/imoveis'); ?>" class="nav-link"> Listar todos os imoveis</a> </li>
          <li class="nav-item"><a href="<?= url('imoveis/cadastro'); ?>"class="nav-link">Cadastrar novo produto</a></li>

        </ul>
       </div>
    </nav>
    @yield('content')

 <script src="<?=asset('js/app.js'); ?>" ></script>
</body>
</html>