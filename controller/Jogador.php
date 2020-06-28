<?php


include_once 'Gol.php';

class Jogador extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarJogador($nmJogador, $idArtilharia) {
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "INSERT INTO jogador (nm_jogador, qt_gol, id_artilharia)
        VALUES ('$nmJogador', 0 ,'$idArtilharia')";
        
        mysqli_query($con, $sql);
		if(mysqli_errno($con)){
			throw new exception(mysqli_errno($con));
		}

        $connection->CloseCon($con);
    }

    public function getJogadoresArtilharia($idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        //$sql = "SELECT id_jogador, qt_gol, nm_jogador FROM jogador WHERE id_artilharia = '$idArtilharia' ORDER BY qt_gol DESC";
        
        $sql = "SELECT id_jogador, qt_ponto, nm_jogador FROM Jogador WHERE fk_Ranking_id_ranking = $idArtilharia ORDER BY qt_ponto DESC;";
        
        

        $result = mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);

        return $result;

    }

    public function excluirJogador($idJogador, $idArtilharia){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $gol = new Gol('gol');
        $gol->excluirGol($idJogador, $idArtilharia);

        $sql = "DELETE FROM jogador WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);
        
    }

    public function adicionarGol($idJogador, $idArtilharia, $qtGolAtual, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();
        
        $sql = "UPDATE jogador SET qt_gol = qt_gol + 1 WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        $qtGolNova = $qtGolAtual + 1;

        $menssagem = "Acrescentar $qtGolAtual > $qtGolNova"; 

        $gol = new Gol('gol');
        $gol->cadastrarGol($menssagem, $idJogador, $idArtilharia, $idUsuario);

        $connection->CloseCon($con);
    }

    public function tirarGol($idJogador, $idArtilharia, $qtGolAtual, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();
        
        $sql = "UPDATE jogador SET qt_gol = qt_gol - 1 WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        
        $qtGolNova = $qtGolAtual - 1;

        $menssagem = "Retirar $qtGolAtual > $qtGolNova";

        $gol = new Gol('gol');
        $gol->cadastrarGol($menssagem, $idJogador, $idArtilharia, $idUsuario);

        $connection->CloseCon($con);
    }

    public function updateJogador($idJogador, $nmJogador , $qtGolNova, $qtGolAtual, $idArtilharia, $idUsuario){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE jogador SET nm_jogador = '$nmJogador', qt_gol = '$qtGolNova' WHERE id_jogador = $idJogador";

        mysqli_query($this->OpenCon(), $sql);

        
        $menssagem = "Alterar $qtGolAtual   > $qtGolNova";

        $gol = new Gol('gol');
        $gol->cadastrarGol($menssagem, $idJogador, $idArtilharia, $idUsuario);

        $connection->CloseCon($con);
    }

    public function getJogadoresNome($idArtilharia, $nmJogador){
        
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT id_jogador, qt_gol, nm_jogador FROM jogador WHERE id_artilharia = '$idArtilharia' AND nm_jogador like('%$nmJogador%') ORDER BY qt_gol DESC";

        $result = mysqli_query($this->OpenCon(), $sql);

        $connection->CloseCon($con);

        return $result;

    }

}
