app.controller('CadastroManancialLancamentoController', function($scope, $http, UserSrvc){
	$scope.objectModel;

	$scope.deleteRecord = function() {
		var data = {
			id: $scope.objectModel.id
		};

		$http.delete(baseUrlApi()+"manancial-lancamento", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-manancial-lancamento", "list-manancial-lancamento");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'manancial-lancamento', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-manancial-lancamento", "list-manancial-lancamento");
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
		if(typeof getUrlVars().id != "undefined") {
			$http.get(baseUrlApi()+'manancial-lancamento/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});