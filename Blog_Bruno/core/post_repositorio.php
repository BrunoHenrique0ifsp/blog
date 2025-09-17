<?php
session_start();
require_once '../includes/valida_login.php';
require_once '../includes/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysql.php';

// Limpa os dados vindos via POST
foreach ($_POST as $indice => $dado) {
    $$indice = limparDados($dado);
}

// Limpa os dados vindos via GET
foreach ($_GET as $indice => $dado) {
    $$indice = limparDados($dado);
}

// Força o ID a ser inteiro
$id = (int)$id;

// Verifica a ação
switch ($acao) {

    // INSERIR POST
    case 'insert':
        $dados = [
            'titulo'        => $titulo,
            'texto'         => $texto,
            'data_postagem' => "$data_postagem $hora_postagem",
            'usuario_id'    => $_SESSION['login']['usuario']['id']
        ];

        insere('post', $dados);
        break;

    // ATUALIZAR POST
    case 'update':
        $dados = [
            'titulo'        => $titulo,
            'texto'         => $texto,
            'data_postagem' => "$data_postagem $hora_postagem",
            'usuario_id'    => $_SESSION['login']['usuario']['id']
        ];

        $criterio = [
            ['id', '=', $id]
        ];

        atualiza('post', $dados, $criterio);
        break;

    // DELETAR POST
    case 'delete':
        $criterio = [
            ['id', '=', $id]
        ];

        deleta('post', $criterio);
        break;
}

// Redireciona de volta para a página principal
header('Location: ../index.php');
?>
