<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">

</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/topo.php' ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php' ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
               <div class="card-header">Login</div>
               <div class="card-body">
                    <form action="core/usuario_repositorio.php" method="post">
                        <input type="hidden" name="acao" value="login">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" require="required" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" require="required" id="senha" name="senha">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Acessar</button>
                        </div>
                    </form>
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/rodape.php' ?>
            </div>
        </div>
    </div>
    <script src="lib/js/bootstrap.min.js"></script>
</body>
</html>