<?php

include_once 'php.util/HttpUtil.php';

$cod_usuario 		= $_GET['cod_usuario'];
$cod_perfil 		= $_GET['cod_perfil'];
$cod_empreendimento = $_GET['cod_empreendimento'];
$url_redirect 		= (isset($_GET['url_redirect'])) ? $_GET['url_redirect'] : "home";

$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/usuarios?usu->cod_usuario='.$cod_usuario.'&per->cod_perfil='.$cod_perfil.'&emp->cod_empreendimento='.$cod_empreendimento;
$data = HttpUtil::doGetRequest($url, null);

if($data) {
	$user = json_decode($data)->rows[0];
	$cooperator = null;

	// Se o usuário é um colaborador
	/*if($user->cod_colaborador && $user->cod_colaborador > 0) {
		if( $_SERVER['HTTP_HOST'] === "localhost" )
			$user->pth_arquivo_foto = str_replace("/home/consorciointermultip/public_html/files/docs", "../sig-operacional-files/", $user->pth_arquivo_foto);
		else
			$user->pth_arquivo_foto = str_replace("/home/consorciointermultip/public_html/", "", $user->pth_arquivo_foto);
		
		// Recupera as informações do colaborador
		$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/colaboradores?col->cod_colaborador='.$user->cod_colaborador;
		$data = HttpUtil::doGetRequest($url, null);
		if($data) { 
			$cooperator = json_decode($data)->rows[0];
			// Recupera o cargo e salário atual do colaborador
			$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/colaborador/ultima/funcao/'.$user->cod_colaborador;
			$data = HttpUtil::doGetRequest($url, null);

			if($data) {
				$cooperator->funcao = json_decode($data);
			}

			// Recupera os telefones do colaborador
			$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/colaborador/telefones?cod_colaborador='.$user->cod_colaborador;
			$data = HttpUtil::doGetRequest($url, null);

			if($data) {
				$cooperator->telefones = json_decode($data);
			}

			// Recupera os emails do colaborador
			$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/colaborador/emails?cod_colaborador='.$user->cod_colaborador;
			$data = HttpUtil::doGetRequest($url, null);

			if($data) {
				$cooperator->emails = json_decode($data);
			}

			// Recupera os dependentes do colaborador
			$url = 'http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/colaborador/dependentes?cod_colaborador='.$user->cod_colaborador;
			$data = HttpUtil::doGetRequest($url, null);

			if($data) {
				$cooperator->dependentes = json_decode($data);
			}
		}
	}*/

	$user_values = array('user' => $user, 'cooperator' => $cooperator);

	session_start();
	$_SESSION['user_logged'] = $user_values;
	header('location: '. $url_redirect);
}

?>