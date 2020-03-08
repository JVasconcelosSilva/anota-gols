<?php

include_once 'Jogador.php';

class Artilharia extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarArtilharia($nmArtilharia, $dtCriacao, $icPrivacidade, $idUsuario) {
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "INSERT INTO artilharia (nm_artilharia, dt_criacao, ic_privacidade, id_usuario)
        VALUES ('$nmArtilharia', '$dtCriacao', '$icPrivacidade', '$idUsuario')";
        
        mysqli_query($con, $sql);
		if(mysqli_errno($con)){
			throw new exception(mysqli_errno($con));
		}

        $connection->CloseCon($con);
    }

    public function getArtilhariasUsuario($idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT id_artilharia, nm_artilharia, dt_criacao, ic_privacidade FROM artilharia WHERE id_usuario = '$idUsuario'";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }

    public function excluirArtilharia($idUsuario, $idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $query = new Jogador("jogador");

        $jogadores = $query->getJogadoresArtilharia($idArtilharia);

        foreach ($jogadores as $jogador){
            $query->excluirJogador($jogador['id_jogador'], $idArtilharia);
        }

        $sql = "DELETE FROM artilharia WHERE id_usuario = $idUsuario AND id_artilharia = $idArtilharia";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
        
    }

    public function updateArtilharia($idArtilharia, $nmArtilharia ,$icPrivacidade){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE artilharia SET nm_artilharia = '$nmArtilharia', ic_privacidade = '$icPrivacidade' WHERE id_artilharia = $idArtilharia";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
    }

    public function getArtilharias(){

		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT a.id_artilharia, a.nm_artilharia, a.dt_criacao, a.ic_privacidade, u.nm_usuario FROM artilharia a, usuario u WHERE a.id_usuario = u.id_usuario AND a.ic_privacidade = '1'";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }
    
    public function getArtilhariasByName($name){

		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT a.id_artilharia, a.nm_artilharia, a.dt_criacao, a.ic_privacidade, u.nm_usuario FROM artilharia a, usuario u WHERE a.id_usuario = u.id_usuario AND a.ic_privacidade = '1' AND a.nm_artilharia LIKE '$name%'";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }
    public function getDonoArtilharia($idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT id_usuario FROM artilharia WHERE id_artilharia = '$idArtilharia'";

        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

    }

}
