app.controller('CadastroMunicipioController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.municipios 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'cidades');
	$scope.divisoesBacia 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'divisoes-bacia?nolimit=1');
	$scope.partidos 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'partidos');
	$scope.concessoes 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'concessoes');

	var modalTablesColumns = {
		empresas: [
			{
				field: 'Construtora',
				title: 'Nome'
			}
		],
		interessados: [
			{
				field: 'nme_responsavel',
				title: 'Nome'
			}
		]
	};

	$scope.abreModal = function(rota, atributo) {
		$("#modalItemsLabel").text("LISTAGEM DE " + rota.replace("-"," de ").toUpperCase());
		$("#modalItems").modal("show");
		$('#mytable').bootstrapTable({
			url: baseUrlApi()+ rota.toLowerCase() +".json",
			search: true,
			showRefresh: true,
			showToggle: true,
			showColumns: true,
			pageList: "[5, 10, 20, 50, 100, All]",
			pageSize: "5",
			pagination: true,
			sidePagination: "server",
			showPaginationSwitch: true,
			columns: modalTablesColumns[rota.toLowerCase()],
			onClickRow: function(row, $element) {
				if(!$scope.objectModel[atributo])
					$scope.objectModel[atributo] = {};

				$scope.objectModel[atributo].data = row;
				$scope.objectModel[atributo].type = rota;
				$scope.objectModel[atributo].label = $($element.find("td")[0]).text();

				$scope.$apply();
				$('#mytable').bootstrapTable('destroy');
				$("#modalItems").modal("hide");
			}
		});
	}

	$scope.deleteRecord = function() {
		var data = {
			id_predio: $scope.objectModel.id_predio
		};

		$http.delete(baseUrlApi()+"municipio", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-municipio", "list-municipio");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);
		
		if(Object.keys(postData).length > 0 && typeof postData.cod_bacia_daee != "undefined" && typeof postData.cod_municipio != "undefined") {
			postData.nme_bacia_daee = _.findWhere($scope.divisoesBacia, {id: postData.cod_bacia_daee}).desc_diretoria;
			postData.nme_municipio = _.findWhere($scope.municipios, {cod_mun: postData.cod_municipio}).Municipios;
		}

		$http.post(baseUrlApi()+'municipio', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-municipio", "list-municipio");
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
		if(typeof getUrlVars().id_predio != "undefined") {
			$http.get(baseUrlApi()+'municipio/'+ getUrlVars().id_predio)
				.success(function(responseData) {
					$scope.objectModel = responseData;
					$scope.objectModel.prefeitura = {
						data: {
							cod_construtora: responseData.cod_prefeitura
						},
						label: responseData.nme_prefeitura,
						type: "empresas"
					};
					$scope.objectModel.prefeito = {
						data: {
							cod_fiscal: responseData.cod_prefeito
						},
						label: responseData.nme_prefeito,
						type: "interessados"
					}
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});