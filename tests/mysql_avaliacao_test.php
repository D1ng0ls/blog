<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysql.php';
    require_once '../core/sql.php';
    require_once '../core/mysql.php';

    //insere dados
    insert_teste('João', 'joao@ifsp.edu.br', '123456');
    buscar_teste();
    insert_teste2(1, 'Vai cortinas', 'Cortinas perdeu muito ruim kkk', '2022-05-08');
    buscar_teste2();
    insert_teste3(1, 'fodido vou te assaltar', 1, 1);
    buscar_teste3();

    //atualiza dados
    update_teste(1, 'murilo', 'silva@gmail.com');
    buscar_teste();
    update_teste2(1, 'Parmeras', 'pulseras kkkkkkkkkkkkkkkkkkkkkkkkkkkk');
    buscar_teste2();
    update_teste3(1, 10, 'vo come bosta');
    buscar_teste3();

    //deletar dados
    /*delete_teste(1);
    buscar_teste();
    delete_teste2(1);
    buscar_teste2();*/
    delete_teste3(1);
    buscar_teste3();

    //insert
    function insert_teste($nome, $email, $senha) : void {
        $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha];
        insere('usuario', $dados);
    }
    function insert_teste2($usuario_id, $titulo, $texto, $data_postagem) : void {
        $dados = ['usuario_id' => $usuario_id,'titulo' => $titulo, 'texto' => $texto, 'data_postagem' => $data_postagem];
        insere('post', $dados);
    }
    function insert_teste3($nota, $comentario, $usuario_id, $post_id) : void {
        $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id];
        insere('avaliacao', $dados);
    }

    //buscar
    function buscar_teste() : void {
        $usuarios = buscar('usuario', ['id', 'nome', 'email', 'senha'], [], '');
        print_r($usuarios);
        echo "<br><br>";
    }
    function buscar_teste2() : void {
        $usuarios = buscar('post', ['id', 'titulo', 'texto', 'data_postagem'], [], '');
        print_r($usuarios);
        echo "<br><br>";
    }
    function buscar_teste3() : void {
        $usuarios = buscar('avaliacao', ['id', 'nota', 'comentario'], [], '');
        print_r($usuarios);
        echo "<br><hr><hr>";
    }

    //updates
    function update_teste($id, $nome, $email) : void {
        $dados = ['nome' => $nome, 'email' => $email];
        $criterio = [['id', '=', $id]];
        atualiza('usuario', $dados, $criterio);
    }
    function update_teste2($id, $titulo, $texto) : void {
        $dados = ['titulo' => $titulo, 'texto' => $texto];
        $criterio = [['id', '=', $id]];
        atualiza('post', $dados, $criterio);
    }
    function update_teste3($id, $nota, $comentario) : void {
        $dados = ['nota' => $nota, 'comentario' => $comentario];
        $criterio = [['id', '=', $id]];
        atualiza('avaliacao', $dados, $criterio);
    }

    //deletar
    /*function delete_teste($id) {
        $criterio = [['id', '=', $id]];
        deleta('usuario', $criterio);
    }
    function delete_teste2($id) {
        $criterio = [['id', '=', $id]];
        deleta('post', $criterio);
    }*/
    function delete_teste3($id) {
        $criterio = [['id', '=', $id]];
        deleta('avaliacao', $criterio);
    }
?>