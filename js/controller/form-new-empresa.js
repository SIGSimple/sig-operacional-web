app.controller('CadastroEmpresaController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.municipios = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'cidades');

	$scope.deleteRecord = function() {
		var data = {
			cod_construtora: $scope.objectModel.cod_construtora
		};

		$http.delete(baseUrlApi()+"empresa", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-empresa", "list-empresa");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'empresa', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-empresa", "list-empresa");
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
		if(typeof getUrlVars().cod_construtora != "undefined") {
			$http.get(baseUrlApi()+'empresa/'+ getUrlVars().cod_construtora)
				.success(function(responseData) {
					$scope.objectModel = responseData;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});