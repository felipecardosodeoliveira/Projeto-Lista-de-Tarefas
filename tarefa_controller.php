<?php 

require 'class.inc/conexao_db.php';
require 'class.inc/tarefa_model.php';
require 'class.inc/tarefa_service.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 

if ($acao == 'inserir') {

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conn = new Conexao();
    
    $tarefaService = new TarefaService($conn, $tarefa);
    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1');

} else if ($acao == 'recuperar') {

    $tarefa = new Tarefa();

    $conn = new Conexao();
    
    $tarefaService = new TarefaService($conn, $tarefa);
    
    $tarefas = $tarefaService->recuperar();

} else if ($acao == 'editar') {

    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    $tarefa->__set('id', $_POST['id']);


    $conn = new Conexao();
    
    $tarefaService = new TarefaService($conn, $tarefa);
    $tarefaService->atualizar();

    header('Location: todas_tarefas.php?edicao=1');

}
 

