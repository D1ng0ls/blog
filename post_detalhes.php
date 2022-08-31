<!DOCTYPE html>
<?php
    require_once '../includes/funcoes.php';
    require_once 'conexao_mysql.php';
    require_once 'sql.php';
    require_once 'mysql.php';

    foreach ($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $posts = buscar(
        'post',
        [
            'titulo',
            'data_postagem',
            'texto',
            '(select nome from usuario where usuario.id = post.usuario_id) as nome'
        ],
        [
            ['id', '=', $post]
        ]
    );
    $post = $posts[0];
    $data_post = date_create($post['data_postagem']);
    $data_post = date_create($data_post['d/m/Y H:i:s']);
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['titulo'] ?></title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 'include/topo.php' ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php 'include/menu.php' ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo'] ?></h5>
                    <h5 class="card-subtitle mb-2 text-muted"><?php echo $data_post." Por: ".$post['titulo'] ?></h5>
                    <div class="card-text">
                    <?php echo html_entity_decode($post['texto']) ?>
                    </div>
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