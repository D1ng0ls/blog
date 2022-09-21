<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- topo //-->
                <?php include 'includes/topo.php' ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <!-- menu //-->
                <?php include 'includes/menu.php' ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <!-- conteudo //-->
                <h2>Página Inicial</h2>
                <?php include 'includes/busca.php' ?>

                <?php
                    require_once 'includes/funcoes.php';
                    require_once 'core/conexao_mysql.php';
                    require_once 'core/sql.php';
                    require_once 'core/mysql.php';

                    foreach($_GET as $indice => $dado) {
                        $$indice = limparDados($dado);
                    }

                    $data_atual = date('Y-m-d H:i:s');

                    $criterio = [['data_postagem', '<=', $data_atual]];

                    if(!empty($busca)){
                        $criterio[] = [
                            'AND',
                            'titulo',
                            'like',
                            "%{$busca}%",
                        ];
                    }

                    $posts = buscar(
                        'post',
                        [
                            'titulo',
                            'data_postagem',
                            'id',
                            '(select nome from usuario where usuario.id = post.usuario_id) as nome'
                        ],
                        $criterio,
                        'data_postagem DESC'
                    );
                ?>
                <div>
                    <div class="list-group">
                        <?php
                            foreach($posts as $post) :
                                $data = date_create($post['data_postagem']);
                                $data = date_format($data, 'd/m/y H:i:s');
                        ?>
                        <a class="list-group-item list-group-item-action" href="post_detalhe.php?post=<?php echo $post['id']?>">
                            <strong><?php echo $post['titulo'] ?></strong>
                            <?php echo $post['nome'] ?>
                            <span class="badge badge-dark"><?php echo $data ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- rodape //-->
                <?php include 'includes/rodape.php' ?>
            </div>
        </div>
    </div>
    <script src="lib/js/bootstrap.min.js"></script>
</body>
</html>