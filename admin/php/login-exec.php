<?php
	require_once '../inc/inc.autoload.php';

	$act = $_REQUEST['act'];

	session_start();

	switch($act){

		case 'login':

			$mat = addslashes($_REQUEST['mat']);
			$sen = addslashes($_REQUEST['sen']);



			$dao = new UsuarioDAO();

			$vet = $dao->listaLogin($mat, $sen);

			$num = count($vet);

			if($num > 0){
					$usu = $vet[0];

					$_SESSION['login'] = $usu->getNome();

					$destino = 'usuario-cadastrar.php';

			}
			else{
					$destino = 'login.php';

			}

			break;

		case 'logout':

			session_destroy();

			$destino = 'login.php';
	}

	header('Location: '.$destino);
	exit;
?>