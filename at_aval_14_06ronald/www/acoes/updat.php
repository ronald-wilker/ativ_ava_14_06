<?php
include_once 'conn.php';
class Updat extends Conect
{
private $db;
public function __construct(){//construir a conexao com o banco
        $this->db = new Conect();//criando o objeto Conect
       $this->db =   $this->db->Conn();//executando metodo e pondo em uma variavel
}
 function updt($vls){//metodo rebendo por parametro os valores
//sleep(2)tempo de espera de enivio da requisição;
var_dump($vls['ider']);
$mensagens = [];
$contem_erros = false;
if ($vls['ider'] == '') {
	$contem_erros = true;
	$mensagens['ider'] = 'A ID está em branco';
}

if ($vls['descricao'] == '') {
	$contem_erros = true;
	$mensagens['descricao'] = 'A descrição está em branco';
}


if ($vls['marcas'] == '') {
	$contem_erros = true;
	$mensagens['marcas'] = 'A marca está em branco';
}
if ($vls['modelos'] == '') {
  $erros = true;
  $mensagens['modelos'] = "O modelo esta em branco";
}
if ($vls['tipove'] == '') {
	$contem_erros = true;
	$mensagens['tipove'] = 'O tipo de veículo está em branco';
}

if ($vls['quantpe'] == '') {
	$contem_erros = true;
	$mensagens['quantpe'] = 'A quantidade de passageiros está em branco';
}
if ($vls['vlvend'] == '') {
  $erros = true;
  $mensagens['vlvend'] = "O valor de venda está em branco";
}
if ($vls['vlcompr'] == '') {
	$contem_erros = true;
	$mensagens['vlcompr'] = 'O valor de compra está em branco';
}

if ($vls['dtcompr'] == '') {
	$contem_erros = true;
	$mensagens['dtcompr'] = 'A data de compra está em branco';
}
if ($vls['estat'] == '') {
            $erros = true;
            $mensagens['estat'] = "O status do veículo esta em branco";
}
        if (! $contem_erros) {//se não conter erros executara o inserir


          $sql = "UPDATE carro SET descricao = :descricao,marca = :marcas,modelo = :modelos,tipov = :tipove,qntpass = :quantpe,vlvenda = :vlvend,vlcompra = :vlcompr,datcompra = :dtcompr,estato = :estat  WHERE id_car = :ider";
          $rs = $this->db->prepare($sql);
$rs->bindParam(':ider',         $vls['ider']  , PDO::PARAM_INT);
$rs->bindParam(':descricao',     $vls['descricao']   , PDO::PARAM_STR);
$rs->bindParam(':marcas',      $vls['marcas']    , PDO::PARAM_STR);
$rs->bindParam(':modelos',     $vls['modelos']   , PDO::PARAM_STR);
$rs->bindParam(':tipove',      $vls['tipove']    , PDO::PARAM_STR);
$rs->bindParam(':quantpe',     $vls['quantpe']   , PDO::PARAM_STR);
$rs->bindParam(':vlvend',    $vls['vlvend']  , PDO::PARAM_STR);
$rs->bindParam(':vlcompr',   $vls['vlcompr'] , PDO::PARAM_STR);
$rs->bindParam(':dtcompr',   $vls['dtcompr'] , PDO::PARAM_STR);
$rs->bindParam(':estat',    $vls['estat']    , PDO::PARAM_STR);

  $rs->execute();


if ($rs) {
    //passando vetor em forma de json
      $mensagens['sv'] = "Atualizado com sucesso!";
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
 $ider = (int) $_REQUEST['ider'];
$descricao = (string) $_REQUEST['descricao'];
$marcas = (string) $_REQUEST['marcas'];
$modelos  = (string) $_REQUEST['modelos'];
$tipove = (string) $_REQUEST['tipove'];
$quantpe = (string) $_REQUEST['quantpe'];
$vlvend  = (string) $_REQUEST['vlvend'];
$vlcompr = (string) $_REQUEST['vlcompr'];
$dtcompr = (string) $_REQUEST['dtcompr'];
$estat  = (string) $_REQUEST['estat'];



$vls =  array('ider' => $ider,'descricao' => $descricao ,'marcas' => $marcas,'modelos' => $modelos,
              'tipove' => $tipove,'quantpe' => $quantpe,'vlvend' => $vlvend,
              'vlcompr' => $vlcompr,'dtcompr' => $dtcompr,'estat' => $estat);//os valore em variaveis colocando em array

$obj =new Updat;//cria o objeto updt desta pagina
$obj->updt($vls);//executa a função updt desta pagina e passsando os valores



 ?>
