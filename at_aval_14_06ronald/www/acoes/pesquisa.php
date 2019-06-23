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
	$msg .="<table class='table table-hover'>";
	$msg .="	<thead>";
	$msg .="		<tr>";
	$msg .="			<th>Descrição:</th>";
	$msg .="			<th>Modelo:</th>";
	$msg .="			<th>Marca:</th>";
	$msg .="			<th>Tipo de veículo:</th>";
	$msg .="			<th>Qntd de passageiros:</th>";
	$msg .="			<th>Valor de venda:</th>";
	$msg .="			<th>Valor da compra:</th>";
	$msg .="			<th>Data compra:</th>";
	$msg .="			<th>Venda:</th>";
	$msg .="			<th>Edita</th>";
	$msg .="		</tr>";
	$msg .="	</thead>";
	$msg .="	<tbody>";

			 $resultado = $this->db->query("SELECT * FROM `carro` WHERE `descricao` LIKE '%$parametro%'");
						//resgata os dados na tabela
						if($resultado){
							foreach ($resultado as $res) {
	$msg .="				<tr>";
	$msg .="					<td>".$res['descricao']."</td>";
	$msg .="					<td>".$res['marca']."</td>";
	$msg .="					<td>".$res['modelo']."</td>";
	$msg .="					<td>".$res['tipov']."</td>";
	$msg .="					<td>".$res['qntpass']."</td>";
	$msg .="					<td>".$res['vlvenda']."</td>";
	$msg .="					<td>".$res['vlcompra']."</td>";
	$msg .="					<td>".$res['datcompra']."</td>";
	$msg .="					<td>".$res['estato']."</td>";
	$msg .="					<td>".$res['id_car']."</td>";
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
