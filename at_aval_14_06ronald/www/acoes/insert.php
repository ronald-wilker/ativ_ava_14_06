<?php
include_once 'conn.php';
class Inserir extends Conect
{
private $db;
public function __construct(){//construir a conexao com o banco
        $this->db = new Conect();//criando o objeto Conect
       $this->db =   $this->db->Conn();//executando metodo e pondo em uma variavel
}
 function salva($vls){//metodo rebendo por parametro os valores
//sleep(2)tempo de espera de enivio da requisição;
$mensagens = [];
$contem_erros = false;
if ($vls['descri'] == '') {
	$contem_erros = true;
	$mensagens['descri'] = 'A descrição está em branco';
}

if ($vls['marca'] == '') {
	$contem_erros = true;
	$mensagens['marca'] = 'A marca está em branco';
}
if ($vls['modelo'] == '') {
  $erros = true;
  $mensagens['modelo'] = "O modelo esta em branco";
}
if ($vls['tipov'] == '') {
	$contem_erros = true;
	$mensagens['tipov'] = 'O tipo de veículo está em branco';
}

if ($vls['quantp'] == '') {
	$contem_erros = true;
	$mensagens['quantp'] = 'A quantidade de passageiros está em branco';
}
if ($vls['vlvenda'] == '') {
  $erros = true;
  $mensagens['vlvenda'] = "O valor de venda está em branco";
}
if ($vls['vlcompra'] == '') {
	$contem_erros = true;
	$mensagens['vlcompra'] = 'O valor de compra está em branco';
}

if ($vls['dtcompra'] == '') {
	$contem_erros = true;
	$mensagens['dtcompra'] = 'A data de compra está em branco';
}
if ($vls['estato'] == '') {
            $erros = true;
            $mensagens['estato'] = "O status do veículo esta em branco";
}
        if (! $contem_erros) {//se não conter erros executara o inserir
          $id = null;
          $campos = "`id_car`, `descricao`, `marca`, `modelo`, `tipov`, `qntpass`, `vlvenda`, `vlcompra`, `datcompra`, `estato`";
          $sql = "INSERT INTO `carro` ($campos) VALUES (:id, :descri, :marca, :modelo, :tipov, :quantp, :vlvenda, :vlcompra, :dtcompra, :estato)";
          $rs = $this->db->prepare($sql);
$rs->bindParam(':id',         $id              , PDO::PARAM_INT);
$rs->bindParam(':descri',     $vls['descri']   , PDO::PARAM_STR);
$rs->bindParam(':marca',      $vls['marca']    , PDO::PARAM_STR);
$rs->bindParam(':modelo',     $vls['modelo']   , PDO::PARAM_STR);
$rs->bindParam(':tipov',      $vls['tipov']    , PDO::PARAM_STR);
$rs->bindParam(':quantp',     $vls['quantp']   , PDO::PARAM_STR);
$rs->bindParam(':vlvenda',    $vls['vlvenda']  , PDO::PARAM_STR);
$rs->bindParam(':vlcompra',   $vls['vlcompra'] , PDO::PARAM_STR);
$rs->bindParam(':dtcompra',   $vls['dtcompra'] , PDO::PARAM_STR);
$rs->bindParam(':estato',    $vls['estato']  , PDO::PARAM_STR);

$result = $rs->execute();


if ($result) {
    //passando vetor em forma de json
      $mensagens['sv'] = "salvo com sucesso!";
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
$descri = (string) $_REQUEST['descri'];
$marca = (string) $_REQUEST['marca'];
$modelo  = (string) $_REQUEST['modelo'];
$tipov = (string) $_REQUEST['tipov'];
$quantp = (string) $_REQUEST['quantp'];
$vlvenda  = (string) $_REQUEST['vlvenda'];
$vlcompra = (string) $_REQUEST['vlcompra'];
$dtcompra = (string) $_REQUEST['dtcompra'];
$estato  = (string) $_REQUEST['estato'];
$vls =  array('descri' => $descri ,'marca' => $marca,'modelo' => $modelo,
              'tipov' => $tipov,'quantp' => $quantp,'vlvenda' => $vlvenda,
              'vlcompra' => $vlcompra,'dtcompra' => $dtcompra,'estato' => $estato);//os valore em variaveis colocando em array

$obj =new Inserir;//cria o objeto salva desta pagina
$obj->salva($vls);//executa a função salva desta pagina e passsando os valores



 ?>
