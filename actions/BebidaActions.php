<?php
    include_once "../domain/bebida.php";
    include_once "../dao/BebidaDAO.php";

    if($_POST["operacao"] == "salvar"){
        $usuario = new Bebida();
		$usuario->setId(1);
		$usuario->setNome( $_POST['nome']);
		$usuario->setDescricao($_POST['descricao']);
		$usuario->setValor($_POST['valor']);
    
		$dao = new dao();

		$dao->salvarBebida($bebida);              
		
		echo "ok";
    }else if($_POST["operacao"] == "listar"){
		$dao = new dao();
		$dados = $dao->listarBebida();
		echo json_encode($dados);
	
	}else if($_POST["operacaoo"] == "entrar"){
		$dao - new dao();
		$dados = $dao->consultaLogin();
	}
		
    


?>
