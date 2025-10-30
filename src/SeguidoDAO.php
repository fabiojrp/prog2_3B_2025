<?php
require_once "ConexaoBD.php";
class SeguidoDAO{

    public static function seguir($idusuario, $idseguido) {
        $conexao = ConexaoBD::conectar();
       
        $sql = "insert into seguidos (idusuario, idseguido) values (?,?)";
        $stmt = $conexao->prepare($sql);
  
        
        $stmt->bindParam(1, $idusuario);        
        $stmt->bindParam(2, $idseguido);        

        $stmt->execute();        
    }
    public static function listarSeguidos($idusuario) {
        $sql = "SELECT u.* FROM usuarios u 
                INNER JOIN seguidos s ON u.idusuario = s.idseguido
                WHERE s.idusuario = ?";

        $conexao = ConexaoBD::conectar();
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $idusuario);
        
        $stmt->execute();        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>