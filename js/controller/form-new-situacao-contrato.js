app.controller('CadastroSituacaoContratoController', function($scope, $http, UserSrvc){
	$scope.objectModel;

	$scope.deleteRecord = function() {
		var data = {
			cod_situacao: $scope.objectModel.cod_situacao
		};

		$http.delete(baseUrlApi()+"situacao/contrato", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-situacao-contrato", "list-situacao-contrato");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'situacao/contrato', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-situacao-contrato", "list-situacao-contrato");
			})
			.error(function(message, status, headers, config){
				if(status == 406) {
					showNotification("Atenção!", "Alguns campos obrigatórios não foram preenchidos.", null, 'page', status);
					applyFormErrors(message, "objectModel", status);
				}
				else
					showNotification(null, message, null, 'page', status);

				$("button[ng-click='save()']").button('reset');
			});
	}

	function clearObject() {
		$scope.objectModel = { };
	}

	function loadDadosByUrlId() {
		if(typeof getUrlVars().cod_situacao != "undefined") {
			$http.get(baseUrlApi()+'situacao/contrato/'+ getUrlVars().cod_situacao)
				.success(function(responseData) {
					$scope.objectModel = responseData;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});