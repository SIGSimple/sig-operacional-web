app.controller('CadastroConvenioController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.enquadramentosConvenio = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'convenio/enquadramentos');
	$scope.programas = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'programas');

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

	$scope.abreModal = function(rota, atributo, indexFieldDisplay) {
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

				if(typeof indexFieldDisplay === "undefined")
					indexFieldDisplay = 0;

				$scope.objectModel[atributo].data = row;
				$scope.objectModel[atributo].type = rota;
				$scope.objectModel[atributo].label = $($element.find("td")[indexFieldDisplay]).text();

				$scope.$apply();
				$('#mytable').bootstrapTable('destroy');
				$("#modalItems").modal("hide");
			}
		});
	}

	$scope.deleteRecord = function() {
		var data = {
			id: $scope.objectModel.id
		};

		$http.delete(baseUrlApi()+"convenio", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-convenio", "list-convenio");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		postData.dta_assinatura 	= (!isEmpty(postData.dta_assinatura)) ? moment(postData.dta_assinatura, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_publicacao_doe = (!isEmpty(postData.dta_publicacao_doe)) ? moment(postData.dta_publicacao_doe, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_vigencia 		= (!isEmpty(postData.dta_vigencia)) ? moment(postData.dta_vigencia, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;

		$http.post(baseUrlApi()+'convenio', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-convenio", "list-convenio");
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
			$http.get(baseUrlApi()+'convenio/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;

					if(responseData.cod_projetista_convenio) {
						$scope.objectModel.projetista_convenio = {
							data: {
								cod_construtora: responseData.cod_projetista_convenio
							},
							type: "empresas",
							label: responseData.nme_projetista_convenio
						};
					}

					if(responseData.cod_coordenador_daee) {
						$scope.objectModel.coordenador_daee = {
							data: {
								cod_fiscal: responseData.cod_coordenador_daee
							},
							type: "interessados",
							label: responseData.nme_coordenador_daee
						};
					}

					$scope.objectModel.dta_assinatura 		= (!isEmpty(responseData.dta_assinatura)) ? moment(responseData.dta_assinatura, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_publicacao_doe 	= (!isEmpty(responseData.dta_publicacao_doe)) ? moment(responseData.dta_publicacao_doe, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_vigencia 		= (!isEmpty(responseData.dta_vigencia)) ? moment(responseData.dta_vigencia, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});