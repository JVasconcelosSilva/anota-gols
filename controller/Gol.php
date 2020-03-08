<?php


include_once 'connection.php';

class Gol extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarGol($descGol, $idJogador, $idArtilharia, $idUsuario) {

		$connection = new connection();
		$con = $connection->OpenCon();
        

        $sql = "INSERT INTO gol (desc_gol, id_jogador, id_artilharia, id_usuario)
        VALUES ('$descGol', $idJogador, $idArtilharia, $idUsuario)";
        
        mysqli_query($con, $sql);
		if(mysqli_errno($con)){
			throw new exception(mysqli_errno($con));
		}
		

        $connection->CloseCon($con);
    }

    public function excluirGol($idJogador, $idArtilharia) {

		$connection = new connection();
		$con = $connection->OpenCon();
        

        $sql = "DELETE FROM gol WHERE id_jogador = $idJogador AND id_artilharia = $idArtilharia";
        
        mysqli_query($con, $sql);
		if(mysqli_errno($con)){
			throw new exception(mysqli_errno($con));
		}
		

        $connection->CloseCon($con);
    }
    
    public function getHistoricoArtilharia($idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT u.nm_usuario, g.desc_gol FROM gol g, usuario u WHERE id_artilharia = '$idArtilharia' AND g.id_usuario = u.id_usuario";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }
}