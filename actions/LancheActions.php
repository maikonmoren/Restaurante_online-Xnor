<?php
    include_once "../domain/lanche.php";
    include_once "../dao/LancheDAO.php";

    if($_POST["operacao"] == "salvar"){
        $usuario = new lanche();
		$usuario->setId(1);
		$usuario->setNome( $_POST['nome']);
		$usuario->setDescricao($_POST['descricao']);
		$usuario->setPreco($_POST['preco']);
		$dao = new dao();

		$dao->salvarLanche($lanche);              
		
		echo "ok";
    }else if($_POST["operacao"] == "listar"){
		$dao = new dao();
		$dados = $dao->listarLanche();
		echo json_encode($dados);
	
	}
		
    


?>
