<?php
include_once 'conn.php';
class Pesq extends Conect
{
	//requerimos a classe de conex�o
	private $db;
	public function __construct(){//construir a conexao com o banco
		$this->db = new Conect();//criando o objeto Conect
		$this->db =   $this->db->Conn();//executando metodo e pondo em uma variavel
	}
	public function Pesq($parametro)
	{
	$msg = "";
	//come�amos a concatenar nossa tabela
	$msg .="<table class='table-sm table-hover table-striped table-dark'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th scope='col'>Descrição:</th>";
	$msg .="			<th scope='col'>Modelo:</th>";
	$msg .="			<th scope='col'>Marca:</th>";
	$msg .="			<th scope='col'>Tipo de veículo:</th>";
	$msg .="			<th scope='col'>Qntd de passageiros:</th>";
	$msg .="			<th scope='col'>Valor de venda:</th>";
	$msg .="			<th scope='col'>Valor da compra:</th>";
	$msg .="			<th scope='col'>Data compra:</th>";
	$msg .="			<th scope='col'>Venda:</th>";
	$msg .="			<th scope='col'>Edita</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";

			 $resultado = $this->db->query("SELECT * FROM `carro` WHERE `descricao` LIKE '%$parametro%'");
						//resgata os dados na tabela
						if($resultado){
							foreach ($resultado as $res) {
	$msg .="				<tr scope='row'>";
	$msg .="					<td calss='col'>".$res['descricao']."</td>";
	$msg .="					<td calss='col'>".$res['marca']."</td>";
	$msg .="					<td calss='col'>".$res['modelo']."</td>";
	$msg .="					<td calss='col'>".$res['tipov']."</td>";
	$msg .="					<td calss='col'>".$res['qntpass']."</td>";
	$msg .="					<td calss='col'>".$res['vlvenda']."</td>";
	$msg .="					<td calss='col'>".$res['vlcompra']."</td>";
	$msg .="					<td calss='col'>".$res['datcompra']."</td>";
	$msg .="					<td calss='col'>".$res['estato']."</td>";
	$msg .="					<td calss='col'>".$res['id_car']."</td>";
	$msg .="				</tr>";
							}
						}else{
							$msg = "";
							$msg .="Nenhum resultado foi encontrado...";
						}
	$msg .="	</tbody>";
	$msg .="</table>";
	//retorna a msg concatenada
	echo $msg;
}
}
	//recebemos nosso par�metro vindo do form
	$parametro = isset($_POST['pesquisaDesc']) ? $_POST['pesquisaDesc'] : null;
	$pq = new Pesq();
	echo $pq->Pesq($parametro);



?>
