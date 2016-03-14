app.controller('CadastroLicitacaoController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.tiposContratacao 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'tipos/contratacao');
	$scope.financiadores 			= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'licitacao/financiadores');
	$scope.modalidadesContratacao 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'licitacao/modalidades');
	$scope.situacoes 				= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'licitacao/situacoes');

	$scope.deleteRecord = function() {
		var data = {
			id: $scope.objectModel.id
		};

		$http.delete(baseUrlApi()+"licitacao", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-licitacao", "list-licitacao");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		postData.dta_publicacao_doe = (!isEmpty(postData.dta_publicacao_doe)) ? moment(postData.dta_publicacao_doe, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_licitacao 		= (!isEmpty(postData.dta_licitacao)) ? moment(postData.dta_licitacao, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;

		$http.post(baseUrlApi()+'licitacao', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-licitacao", "list-licitacao");
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
			$http.get(baseUrlApi()+'licitacao/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;

					$scope.objectModel.dta_publicacao_doe 	= (!isEmpty(responseData.dta_publicacao_doe)) ? moment(responseData.dta_publicacao_doe, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_licitacao 		= (!isEmpty(responseData.dta_licitacao)) ? moment(responseData.dta_licitacao, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});