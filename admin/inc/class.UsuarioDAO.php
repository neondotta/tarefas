<?php
	require_once '../inc/inc.autoload.php';

	class UsuarioDAO{

		private $dba;

		public function UsuarioDAO(){

			$dba = new DbAdmin('mysql');

			$dba->connect('localhost','root','','tarefa');

			$this->dba = $dba;

		}


		public function listaLogin($mat, $sen){

			$dba = $this->dba;

			$vet = array();

			$sql = 'SELECT * FROM usuario
					WHERE 	matricula 	= "'.$mat.'"
					AND 	senha		= "'.$sen.'"
					AND		ativo 		= "sim"	';

			$res = $dba->query($sql);

			$num = $dba->rows($res);

			for($i=0; $i<$num; $i++){

					$mat = $dba->result($res, $i, 'matricula');
					$nom = $dba->result($res, $i, 'nome');
					$niv = $dba->result($res, $i, 'nivel');
					$sen = $dba->result($res, $i, 'senha');
					$ati = $dba->result($res, $i, 'ativo');

					$usu = new Usuario();

					$usu->setMatricula($mat);
					$usu->setNome($nom);
					$usu->setNivel($niv);
					$usu->setSenha($sen);
					$usu->setAtivo($ati);

					$vet[$i] = $usu;

			}

			return $vet;
		}
		public function UsuarioUm($mat){

				$dba = $this->dba;

				$vet = array();

				$sql = 'SELECT * FROM usuario
						WHERE matricula=' .$mat;

				$res = $dba->query($sql);

				$num = $dba->rows($res);

				for($i=0; $i<$num; $i++){

					$mat = $dba->result($res, $i, 'matricula');
					$nom = $dba->result($res, $i, 'nome');
					$niv = $dba->result($res, $i, 'nivel');
					$sen = $dba->result($res, $i, 'senha');
					$ati = $dba->result($res, $i, 'ativo');

					$usu = new Usuario();

					$usu->setMatricula($mat);
					$usu->setNome($nom);
					$usu->setNivel($niv);
					$usu->setSenha($sen);
					$usu->setAtivo($ati);

					$vet [$i] = $usu;

			}

		}
		public function cadastrar($cat){

				$dba = $this->dba;

				$mat = $cat->getMatricula();
				$nom = $cat->getNome();
				$niv = $cat->getNivel();
				$sen = $cat->getSenha();
				$ati = $cat->getAtivo();

				$sql = 'INSERT INTO usuario(
									matricula,nome,nivel,senha,ativo
									)
						VALUES ("'.$mat.'","'.$nom.'","'.$niv.'","'.$sen.'","'.$ati.'")';

				$dba->query($sql);

		}



	}

?>