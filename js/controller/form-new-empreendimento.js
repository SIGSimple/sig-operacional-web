app.controller('CadastroEmpreendimentoController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.municipios = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'municipios?nolimit');
	$scope.tiposEmpreendimento = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'tipos/empreendimento');
	$scope.programas = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'programas?nolimit');
	$scope.baciasHidrograficas = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'bacias-hidrograficas?nolimit');
	$scope.mananciaisLancamento = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'mananciais-lancamento?nolimit');
	$scope.tiposETE = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'tipos/ete');
	$scope.empresasEstudos = [{value: "PM", label: "PM"},{value: "DAEE", label: "DAEE"}];

	$scope.deleteRecord = function() {
		var data = {
			cod_empreendimento: $scope.objectModel.cod_empreendimento
		};

		$http.delete(baseUrlApi()+"empreendimento", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-empreendimento", "list-empreendimento");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'empreendimento', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-empreendimento", "list-empreendimento");
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
		if(typeof getUrlVars().cod_empreendimento != "undefined") {
			$http.get(baseUrlApi()+'empreendimento/'+ getUrlVars().cod_empreendimento)
				.success(function(responseData) {
					$scope.objectModel = responseData;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});