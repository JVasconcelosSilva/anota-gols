<?php


include_once '../controller/Artilharia.php';

class Usuario extends connection {

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function cadastrarUsuario($nmUsuario, $nmLogin, $nmSenha, $nmEmail) {

        $connection = new connection();
        $con = $connection->OpenCon();

        $query = "INSERT INTO usuario (nm_login, nm_senha, nm_email, nm_usuario) VALUES('$nmLogin','$nmSenha','$nmEmail','$nmUsuario');";
        
        if ($con->query($query) === FALSE){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $connection->CloseCon($con);
    }

    public function loginUsuario($email){

		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT id_usuario, nm_senha FROM usuario WHERE nm_email = '$email';";

		// $result = mysqli_query($con, $sql);
		
        // $connection->CloseCon($con);
        
        if ($result = $con->query($sql) === FALSE){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $connection->CloseCon($con);

        return $result;

    }

    public function selectUsuario($id) {
			
		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
        
        $result = mysqli_query($con, $sql);

        $connection->CloseCon($con);

        return $result;

}

    public function updateUsuario($id, $nome, $email){

		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE usuario SET nm_usuario = '$nome', nm_email = '$email' WHERE id_usuario = $id";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
    }

    public function updateSenhaUsuario($id, $senha){

		$connection = new connection();
		$con = $connection->OpenCon();

        $sql = "UPDATE usuario SET nm_senha = '$senha' WHERE id_usuario = $id";

        mysqli_query($con, $sql);

        $connection->CloseCon($con);
    }

    public function excluirUsuario($id){

		$connection = new connection();
		$con = $connection->OpenCon();
        // Pega todas as artilharias da conta
        $query = new Artilharia('Artilharia');
        $artilharias = $query->getArtilhariasUsuario($id);
        // Deleta todos os jogadores e artilharias dessa conta
        foreach($artilharias as $artilharia){
            $query->excluirArtilharia($id, $artilharia['id_artilharia']);
        }
        
        // Deleta a conta
        $sql = "DELETE FROM usuario WHERE id_usuario = $id";
        mysqli_query($con, $sql);

        $connection->CloseCon($con);
        
    }

}
