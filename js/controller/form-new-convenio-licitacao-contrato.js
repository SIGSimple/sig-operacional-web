app.controller('CadastroConvenioLicitacaoContratoController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;

	var modalTablesColumns = {
		convenios: [
			{
				field: 'num_autos',
				title: 'Nº Autos'
			},
			{
				field: 'num_convenio',
				title: 'Nº do Convênio'
			}
		],
		licitacoes: [
			{
				field: 'num_autos',
				title: 'Nº Autos'
			},
			{
				field: 'num_edital',
				title: 'Nº do Edital'
			}
		],
		contratos: [
			{
				field: 'num_autos',
				title: 'Nº Autos'
			},
			{
				field: 'num_contrato',
				title: 'Nº do Contrato'
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

		$http.delete(baseUrlApi()+"convenio/licitacao/contrato", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-convenio-licitacao-contrato", "list-convenio-licitacao-contrato");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		if(isEmpty($scope.objectModel.convenio) && isEmpty($scope.objectModel.licitacao) && isEmpty($scope.objectModel.contrato)) {
			showNotification("Atenção!", "Você deve preencher ao menos um campo.", null, 'page', 406);
			return false;
		}

		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'convenio/licitacao/contrato', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-convenio-licitacao-contrato", "list-convenio-licitacao-contrato");
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
			$http.get(baseUrlApi()+'convenio/licitacao/contrato/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;

					if(responseData.cod_convenio) {
						$scope.objectModel.convenio = {
							data: {
								id: responseData.cod_convenio,
								num_autos: responseData.num_autos_convenio,
								num_convenio: responseData.num_convenio
							},
							type: "convenios"
						};
					}
					
					if(responseData.cod_licitacao) {
						$scope.objectModel.licitacao = {
							data: {
								id: responseData.cod_licitacao,
								num_autos: responseData.num_autos_licitacao,
								num_edital: responseData.num_edital
							},
							type: "emresas"
						};
					}

					if(responseData.cod_contrato) {
						$scope.objectModel.contrato = {
							data: {
								id: responseData.cod_contrato,
								num_autos: responseData.num_autos_contrato,
								num_contrato: responseData.num_contrato
							},
							type: "interessados"
						};
					}
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});