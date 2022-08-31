<?php
    session_start();
    require_once '../includes/valida_login.php';
    require_once '../includes/funcoes.php';
    require_once 'conexao_mysql.php';
    require_once 'sql.php';
    require_once 'mysql.php';
    
    foreach($_POST as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $id = (int)$id;

    switch($acao) {
        case 'insert':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'data_postagem' => "$data_postagem $hora_postagem",
                'usuario_id' => $_SESSION['login']['usuario']['id']
            ];

            insere (
                'post',
                $dados
            );

            break;
        case 'update':
            $dados = [
                'titulo' => $titulo,
                'texto' => $texto,
                'data_postagem' => "$data_postagem $hora_postagem",
                'usuario_id' => $_SESSION['login']['usuario']['id']
            ];

            $criterio = [
                ['id', '=', $id]
            ];

            atualiza (
                'post',
                $dados,
                $criterio
            );

            break;
        case 'delete':
            $criterio = [
                ['id', '=', $id]
            ];

            deleta (
                'post',
                $criterio
            );

            break;
    }

    header('Location: ../index.php');
    
?>