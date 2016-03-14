app.controller('CadastroAgenciaCetesbController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.municipios = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'cidades');

	$scope.deleteRecord = function() {
		var data = {
			id: $scope.objectModel.id
		};

		$http.delete(baseUrlApi()+"agencia-cetesb", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-agencia-cetesb", "list-agencia-cetesb");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'agencia-cetesb', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-agencia-cetesb", "list-agencia-cetesb");
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
			$http.get(baseUrlApi()+'agencia-cetesb/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;
					loadMunicipiosAgenciaCetesb();
				});
		}
	}

	function loadMunicipiosAgenciaCetesb() {
		if(typeof getUrlVars().id != "undefined") {
			$http.get(baseUrlApi()+'agencia-cetesb/'+ getUrlVars().id +'/municipios-atendidos')
				.success(function(responseData) {
					$scope.objectModel.municipios_atendidos = [];
					$.each(responseData, function(index, item) {
						$scope.objectModel.municipios_atendidos.push(parseInt(item.cod_municipio,10));
					});
					setTimeout(function(){
						$scope.$apply();
					}, 500);
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});