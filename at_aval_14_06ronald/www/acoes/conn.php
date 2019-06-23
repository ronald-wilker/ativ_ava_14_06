<?php
/*
 * Constantes de parâmetros para configuração da conexão
 */
class Conect
{
public  function Conn()
  {
    try {
       $conect = new PDO("mysql:host=localhost; dbname=veiculo", "will", "will");
       $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
           echo "Erro: " . $e->getMessage();
     }
     return $conect;
  }
}







 ?>
