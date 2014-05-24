<?php
	require_once '../inc/inc.autoload.php';

	$tpl = new TemplatePower('../tpl/_master.htm');

	$tpl->assignInclude('content','../tpl/tarefa-lista.htm');

	$tpl->prepare();

	/**********************************/
	require_once '../../admin/inc/inc.session.php';

	$tpl->assign('log', $_SESSION['login']);

	$dao = new TarefaDAO();

	$vet = $dao->lista();

	$num = count($vet);

	for($i=0;$i<$num;$i++){

		$trf = $vet[$i];

		$cta = $trf->getCodTarefa();
		$tit = $trf->getTitulo();
		$sta = $trf->getStatus();
		$cri = $trf->getCriticidade();
		$tar = $trf->getTarefa();

		$tpl->newBlock('tarefas');

		$tpl->assign('cta', $cta);
		$tpl->assign('tit', $tit);
		$tpl->assign('sta', $sta);
		$tpl->assign('cri', $cri);
		$tpl->assign('tar', $tar);

	}
/*
	$dao2 = new UsuarioDAO();

	$vet2 = $dao2->listaUm();

	$num2 = count($vet2);

	for($i=0;$i<$num2;$i++){

		$trf = $vet[$i];

		$mat = $trf->getMatricula();
		$nom = $trf->getNome();
		$niv = $trf->getNivel();
		$sen = $trf->getSenha();
		$ati = $trf->getAtivo();

		$tpl->newBlock('tarefas');

		$tpl->assign('mat', $mat);
		$tpl->assign('nom', $nom);
		$tpl->assign('niv', $niv);
		$tpl->assign('sen', $sen);
		$tpl->assign('ati', $ati);

	}*/
	/**********************************/

	$tpl->printToScreen();

?>