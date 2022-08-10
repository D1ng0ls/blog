<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysql.php';
    require_once '../core/sql.php';
    require_once '../core/mysql.php';

    insert_teste('João', 'joao@ifsp.edu.br', '123456');
    buscar_teste();
    update_teste(38, 'murilo', 'silva@gmail.com');
    buscar_teste();

    function insert_teste($nome, $email, $senha) : void {
        $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha];
        insere('usuario', $dados);
    }

    function buscar_teste() : void {
        $usuarios = buscar('usuario', ['id', 'nome', 'email'], [], '');
        print_r($usuarios);
    }

    function update_teste($id, $nome, $email) : void {
        $dados = ['nome' => $nome, 'email' => $email];
        $criterio = [['id', '=', $id]];
        atualiza('usuario', $dados, $criterio);
    }
?>