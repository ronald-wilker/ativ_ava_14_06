<?php
include_once 'conn.php';
class Del extends Conect
{
private $db;
public function __construct(){//construir a conexao com o banco
        $this->db = new Conect();//criando o objeto Conect
       $this->db =   $this->db->Conn();//executando metodo e pondo em uma variavel
}
 function delete($idel){
   var_dump ($idel);
$mensagens = [];
$contem_erros = false;
if ($idel == '') {
	$contem_erros = true;
	$mensagens['idel'] = 'A id está em branco';
}
        if (! $contem_erros) {//se não conter erros executara o inserir
          $query = $this->db->prepare("DELETE FROM `carro` where id_car = :idel");
          $query->bindParam(':idel',         $idel  , PDO::PARAM_INT);
          $result = $query->execute();



if ($result) {
    //passando vetor em forma de json
      $mensagens['sv'] = "deletado com sucesso!";
      	 echo json_encode([
      	    'mensagens' => $mensagens,
      	    'contem_erros' => false
      	  ]);//chama a funçaõ inserir na pagina acao.php

        }
      }else {
	// temos erros a corrigir
	echo json_encode([
		'contem_erros' => true,
		'mensagens' => $mensagens
	]);
}
}
}
//RECEBENDO os valores do index e pondo em variaveis
$idel = (int) $_REQUEST['idel'];
$obj =new Del;//cria o objeto delete desta pagina
$obj->delete($idel);//executa a função salva desta pagina e passsando os valores



 ?>
