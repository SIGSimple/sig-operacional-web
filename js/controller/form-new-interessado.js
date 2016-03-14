app.controller('CadastroInteressadoController', function($scope, $http, UserSrvc){
	$scope.objectModel;

	var modalTablesColumns = {
		empresas: [
			{
				field: 'Construtora',
				title: 'Nome'
			}
		],
		usuarios: [
			{
				field: 'nme_usuario',
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
			cod_fiscal: $scope.objectModel.cod_fiscal
		};

		$http.delete(baseUrlApi()+"interessado", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-interessado", "list-interessado");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$http.post(baseUrlApi()+'interessado', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-interessado", "list-interessado");
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
		if(typeof getUrlVars().cod_fiscal != "undefined") {
			$http.get(baseUrlApi()+'interessado/'+ getUrlVars().cod_fiscal)
				.success(function(responseData) {
					$scope.objectModel = responseData;
					$scope.objectModel.empresa = {
						data: {
							cod_construtora: responseData.cod_empresa
						},
						label: responseData.nme_empresa,
						type: "empresas"
					};
					$scope.objectModel.usuario = {
						data: {
							cod_usuario: responseData.cod_usuario
						},
						label: responseData.nme_usuario,
						type: "usuarios"
					};
				});
		}
	}

	clearObject();
	loadDadosByUrlId();
});