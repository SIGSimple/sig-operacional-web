app.controller('CadastroProgramaController', function($scope, $http, UserSrvc){
	$scope.objectModel;

	$scope.deleteRecord = function() {
		var data = {
			cod_depto: $scope.objectModel.cod_depto
		};

		$http.delete(baseUrlApi()+"programa", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-programa", "list-programa");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'programa', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-programa", "list-programa");
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
		if(typeof getUrlVars().cod_depto != "undefined") {
			$http.get(baseUrlApi()+'programa/'+ getUrlVars().cod_depto)
				.success(function(responseData) {
					$scope.objectModel = responseData;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});