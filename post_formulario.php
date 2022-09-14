<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include 'includes/topo.php';
                    include 'includes/valida_login.php';
                ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <?php
                    require_once 'includes/funcoes.php';
                    require_once 'core/conexao_mysql.php';
                    require_once 'core/sql.php';
                    require_once 'core/mysql.php';

                    foreach($_GET as $indice => $dado) {
                        $$indice = limparDados($dado);
                    }

                    if(!empty($id)) {
                        $id = (int)$id;

                        $criterio = [['id', '=', $id]];

                        $retorno = buscar('post', ['*'], $criterio);

                        $entidade = $retorno[0];
                    }
                ?>
                <h2>Post</h2>
                <form action="core/post_repositorio.php" method="post">
                    <input type="hidden" name="acao" value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                    <input type="hidden" name="id" value="<?php echo $entidade['id'] ?? '' ?>">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" require="required" class="form-control" value="<?php echo $entidade['titulo'] ?? ''?>">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea name="texto" id="texto" require="required" class="form-control">
                            <?php echo $entidade['texto'] ?? ''?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="texto">Postar em</label>
                        <?php
                            $data = (!empty($entidade['data_postagem'])) ? explode(' ', $entidade['data_postagem'])[0] : '';
                            $hora = (!empty($entidade['data_postagem'])) ? explode(' ', $entidade['data_postagem'])[1] : '';
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <input name="data_postagem" type="date" id="data_postagem" class="form-control" value="<?php echo $data ?>">
                            </div>
                            <div class="col-md-3">
                                <input name="hora_postagem" type="time" id="hora_postagem" class="form-control" value="<?php echo $hora ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            Salvar
                        </button>
                    </div>
                </form>
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