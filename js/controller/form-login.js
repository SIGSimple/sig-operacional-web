app.controller('LoginCtrl', function($scope, $http, $timeout, UserSrvc){
	$scope.dadosLogin 			= {};
	$scope.users 				= [];
	$scope.errorMessage 		= "";
	$scope.novaSenha 			= {};
	$scope.flg_senha_bloqueada 	= true;
	$scope.directLogin 			= false;

	$scope.login = function() {
		$("button.btn.fa-sign-in").button("loading");
		$scope.errorMessage = "";
		$http.get(baseUrlApi()+'usuarios?nolimit&nme_login='+$scope.dadosLogin.nme_login+'&nme_senha='+$scope.dadosLogin.nme_senha)
			.success(function(items) {
				$scope.users = items.rows;

				$.each($scope.users, function(index, user) {
					if(user.pth_arquivo_foto != null && user.pth_arquivo_foto != "") {
						if(window.location.hostname == "localhost")
							$scope.users[index]['pth_arquivo_foto'] = user.pth_arquivo_foto.replace('/home/consorciointermultip/public_html/files/docs/', '../sig-backoffice-files/');
						else
							$scope.users[index]['pth_arquivo_foto'] = user.pth_arquivo_foto.replace('/home/consorciointermultip/public_html/', '');
					}
				});

				$scope.flg_senha_bloqueada = ($scope.users[0].flg_senha_bloqueada == 1);
				$("button.btn.fa-sign-in").button("reset");

				if(!($scope.users[0].flg_senha_bloqueada == 1) && $scope.users.length == 1) {
					$scope.directLogin = true;
					$scope.chooseProfile($scope.users[0]);
				}

				if($scope.users[0].cod_colaborador != null && $scope.users[0].cod_colaborador > 0)
					getUltimaFuncao();
			})
			.error(function(message, status, headers, config){
				$("button.btn.fa-sign-in").button("reset");
				if(status === 404)
					$scope.errorMessage = message;
				else
					showNotification(null, message, null, 'floating', status);
			});
	}

	$scope.chooseProfile = function(profileSelected) {
		if($scope.dadosLogin.flg_guardar_dados_login) {
			localStorage.setItem("nme_login", $scope.dadosLogin.nme_login);
			localStorage.setItem("nme_senha", $scope.dadosLogin.nme_senha);
		}
		else {
			localStorage.removeItem("nme_login");
			localStorage.removeItem("nme_senha");
		}

		var url = "login.php?cod_usuario="+ profileSelected.cod_usuario +"&cod_perfil="+ profileSelected.cod_perfil +"&cod_empreendimento="+ profileSelected.cod_empreendimento;
		window.location.replace(url);
	}

	$scope.desbloquearSenha = function() {
		if($scope.novaSenha.nme_senha === $scope.novaSenha.nme_senha_repete) {
			$("button.btn-unlock-password").button('loading');

			$http.post(baseUrlApi()+'usuario/desbloquear/senha', { cod_usuario: $scope.users[0].cod_usuario, nme_senha: $scope.novaSenha.nme_senha })
				.success(function(message, status) {
					$scope.errorMessage = "";
					
					if($scope.users.length > 1) {
						$scope.flg_senha_bloqueada = false;
						$("button.btn-unlock-password").button('reset');
					}
					else if($scope.users.length == 1) {
						setTimeout(function() {
							showNotification("Pronto!", message, null, 'floating', status);
							$scope.chooseProfile($scope.users[0]);
						}, 500);
					}
				})
				.error(function(message, status, headers, config){
					if(status === 404)
						$scope.errorMessage = message;
					else
						showNotification(null, message, null, 'floating', status);
				});
		}
		else
			$scope.errorMessage = "As senhas não coincidem! Tente novamente.";
	}

	$scope.cancelLogin = function() {
		$scope.dadosLogin = {};
		$scope.users = [];
		$scope.errorMessage = "";
		$scope.novaSenha 			= {};
		$scope.flg_senha_bloqueada 	= true;
	}

	$scope.getFirstAndLastName = function(nmeUsuario) {
		return UserSrvc.getFirstAndLastName(nmeUsuario);
	}

	function getUltimaFuncao() {
		$http.get(baseUrlApi()+'colaborador/ultima/funcao/' + $scope.users[0].cod_colaborador)
			.success(function(data) {
				$.each($scope.users, function(i, user) {
					if(parseInt(user.cod_perfil, 10) === 4)
						$scope.users[i].funcao = data;
				});
			})
			.error(function(data, status, headers, config){
				if(status === 404)
					$scope.errorMessage = data;
			});
	}

	function isUnlocked() {
		var error = (getUrlVars()['e']) ? getUrlVars()['e'] : null;
		if(parseInt(error, 10) === 1001)
			$scope.errorMessage = "Você deve estar logado para acessar o sistema!";
	}

	function loadStorageData() {
		if((localStorage.getItem("nme_login") != null) && (localStorage.getItem("nme_senha") != null)){
			$scope.dadosLogin.nme_login = localStorage.getItem("nme_login");
			$scope.dadosLogin.nme_senha = localStorage.getItem("nme_senha");
			$scope.dadosLogin.flg_guardar_dados_login = true;
		}
	}

	$("#demo-reset-settings").trigger("click");
	isUnlocked();
	loadStorageData();
});