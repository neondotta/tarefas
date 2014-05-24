<?php
	require_once '../inc/inc.session.php';
	require_once '../inc/inc.autoload.php';

	$act = $_REQUEST['act'];

	switch($act){

		case 'inserir':

			$tit = $_REQUEST['tit'];
			$sta = $_REQUEST['sta'];
			$cri = $_REQUEST['cri'];
			$tar = $_REQUEST['tar'];

			$trf = new Tarefa();

			$trf->setTitulo($tit);
			$trf->setStatus($sta);
			$trf->setCriticidade($cri);
			$trf->setTarefa($tar);

			$dao = new TarefaDAO();

			$dao->cadastrar($trf);

		break;

		case 'atualizar':

			$cta = $_REQUEST['cta'];
			$tit = $_REQUEST['tit'];
			$sta = $_REQUEST['sta'];
			$cri = $_REQUEST['cri'];
			$tar = $_REQUEST['tar'];

			$trf = new Tarefa();

			$trf->setCodTarefa('cta');
			$trf->setTitulo('tit');
			$trf->setStatus('sta');
			$trf->setCriticadade('cri');
			$trf->setTarefa('tar');

			$dao = new TarefaDAO();

			$dao->atualizar($trf);

		break;

		case 'deletar':

			$cta = $_REQUEST['cta'];

			$trf = new Tarefa();

			$trf->setCodTarefa($cta);

			$dao = new TarefaDAO();

			$dao->deletar($trf);

			header("Location: tarefa-cadastrar.php");

		break;

	}
?>