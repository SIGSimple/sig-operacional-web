function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning"',
        	' data-cod-acompanhamento="'+ row.cod_acompanhamento +'"',
        	' data-tooltip="true" title="Visualizar Cadastro" data-toggle="modal" data-target="#modalEditar">',
        		'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
}

app.controller('ListDiarioObraCtrl', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.municipios 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'municipios?nolimit');
	$scope.empreendimentos 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'empreendimentos?nolimit');
	$scope.situacoesObra 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'situacoes/obra');
	$scope.situacoesClima 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'situacoes/clima');
	$scope.situacoesSSO 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'situacoes/sso');
	$scope.recursos 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'recursos?nolimit&sort=nme_tipo_recurso&order=asc');
	$scope.tiposPendencia	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'tipos/pendencia');

	$scope.objectModel = {};

	var listColumns = [
		{
			title: 'Ações',
			align: 'center',
			valign: 'middle',
			formatter: 'editFormater'
		},
		{
			field: 'dta_registro',
			title: 'Data do Registro',
			align: 'center',
			valign: 'middle',
			formatter: "dateFormatter",
			sortable: true
		},
		{
			field: 'dsc_registro',
			title: 'Registro'
		},
		{
			field: 'flg_relatorio_mensal',
			title: 'Rel. Mensal?',
			align: 'center',
			valign: 'middle',
			formatter: "flgSimNaoFormatter"
		},
		{
			field: 'flg_vistoria_realizada',
			title: 'Vistoria Real.?',
			align: 'center',
			valign: 'middle',
			formatter: "flgSimNaoFormatter"
		},
		{
			field: 'flg_pendencia',
			title: 'É Pendência?',
			align: 'center',
			valign: 'middle',
			formatter: "flgSimNaoFormatter"
		}
	];

	$scope.addNovoDiarioObra = function() {
		$scope.objectModel = {
			cod_empreendimento: $scope.objectModel.cod_empreendimento
		};
		$("#modalEditar").modal('show');
	}

	$scope.loadDiariosObra = function() {
		configBootstrapTable('#mytable');
		$('#mytable').bootstrapTable('destroy');
		$('#mytable').bootstrapTable({
			url: baseUrlApi()+"diarios-de-obra.json?cod_empreendimento="+ $scope.objectModel.cod_empreendimento,
			search: true,
			showRefresh: true,
			showToggle: true,
			showColumns: true,
			pageList: "[5, 10, 20, 50, 100, All]",
			pageSize: "5",
			pagination: true,
			sidePagination: "server",
			showPaginationSwitch: true,
			columns: listColumns,
			queryParams: function(params) {
				params.sort = "dta_registro";
				params.order = "desc";
				return params;
			},
			formatSearch: function() {
				return "Filtrar";
			},
			formatRefresh: function() {
				return "Atualizar Lista";
			},
			formatToggle: function() {
				return "Modo de Exibição";
			},
			formatColumns: function() {
				return "Colunas";
			},
			formatShowingRows: function(pageFrom, pageTo, totalRows) {
				return "Exibindo "+ pageFrom +" até "+ pageTo +" de "+ totalRows +" registros";
			},
			formatRecordsPerPage: function(pageNumber) {
				return pageNumber + " registros por página";
			},
			formatNoMatches: function () {
		        return 'Nenhum registro encontrado!';
		    },
			formatLoadingMessage: function () {
		        return 'Carregando, por favor aguarde...';
		    }
		});

		setTimeout(function(){
			$scope.$apply();
		}, 500);
	}

	$scope.saveRegistro = function() {
		$("button[ng-click='saveRegistro()']").button('loading');
		
		clearValidationFormStyle();

		// Capturando informações acessórias
		$scope.objectModel.PI 						= _.findWhere($scope.empreendimentos, {cod_empreendimento: $scope.objectModel.cod_empreendimento}).PI;
		$scope.objectModel.dta_log 					= moment().format('YYYY-MM-DD');
		$scope.objectModel.cod_usuario_lancamento 	= UserSrvc.getUserLogged().user.cod_usuario;

		// Analisando o perfil pra determinar o tipo de registro
		switch(UserSrvc.getUserLogged().user.cod_perfil) {
			case 1: // ADMINISTRADOR
			case 3: // INFORMAÇÕES GERENCIAIS
			case 5: // ENG. OBRAS / FISCAL
				$scope.objectModel.cod_tipo_registro = 1; // Relatório Diário de Obra
				break;
			case 2: // PROJETOS
				$scope.objectModel.cod_tipo_registro = 3; // Ocorrências de Meio Ambiente
				break;
			case 4: // ENG. PLANEJ. OBRAS
				if($scope.objectModel.flg_relatorio_mensal)
					$scope.objectModel.cod_tipo_registro = 5; // Relatório Mensal de Obra
				else
					$scope.objectModel.cod_tipo_registro = 1; // Relatório Diário de Obra
				break;
			case 6: // MEDIÇÕES
				$scope.objectModel.cod_tipo_registro = 4; // Ocorrências em Contrato, Medição ou Pagamentos
				break;
			case 7: // MEIO AMBIENTE
				$scope.objectModel.cod_tipo_registro = 2; // Ocorrências de Meio Ambiente
				break;
		}

		// Clonando dados para o objeto que será redirecionado para a requisição
		var postData = angular.copy($scope.objectModel);

		// Transformando informações...
		postData.dta_registro 				= (!isEmpty(postData.dta_registro)) ? moment(postData.dta_registro, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_vistoria 				= (!isEmpty(postData.dta_vistoria)) ? moment(postData.dta_vistoria, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_limite_pendencia 		= (!isEmpty(postData.dta_limite_pendencia)) ? moment(postData.dta_limite_pendencia, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_resolucao_pendencia 	= (!isEmpty(postData.dta_resolucao_pendencia)) ? moment(postData.dta_resolucao_pendencia, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;

		$http.post(baseUrlApi()+'diario-de-obra', postData)
			.success(function(response, status, headers, config){
				$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
				showNotification("Salvo!", response.message, null, ".alert-area.registro", status, null);
				$scope.objectModel.cod_acompanhamento = parseInt(response.id,10);
				$scope.loadDiariosObra();
				$("button[ng-click='saveRegistro()']").button('reset');
			})
			.error(function(response, status, headers, config){
				if(status == 406) {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification("Atenção!", "Alguns campos obrigatórios não foram preenchidos.", null, ".alert-area.registro", status);
					applyFormErrors(response, "objectModel", status);
				}
				else {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification(null, response, null, ".alert-area.registro", status, null);
				}

				$("button[ng-click='saveRegistro()']").button('reset');
			});
	}

	$scope.saveHistograma = function() {
		$("button[ng-click='saveHistograma()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.histogramaModel);

		$http.post(baseUrlApi()+'diario-de-obra/'+ $scope.objectModel.cod_acompanhamento +'/histograma', postData)
			.success(function(message, status, headers, config){
				$scope.histogramaModel = {};
				$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
				showNotification("Salvo!", message, null, ".alert-area.histograma", status, null);
				$scope.objectModel.histogramas 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ $scope.objectModel.cod_acompanhamento +"/histogramas?nolimit");
				$("button[ng-click='saveHistograma()']").button('reset');
			})
			.error(function(response, status, headers, config){
				if(status == 406) {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification("Atenção!", "Alguns campos obrigatórios não foram preenchidos.", null, ".alert-area.histograma", status);
					applyFormErrors(response, "objectModel", status);
				}
				else {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification(null, response, null, ".alert-area.histograma", status, null);
				}

				$("button[ng-click='saveHistograma()']").button('reset');
			});
	}

	$scope.deleteHistograma = function(histogramaItem) {
		var postData = {
			id: histogramaItem.id
		};

		$http.delete(baseUrlApi()+"diario-de-obra/histograma", {params: postData})
			.success(function(message, status, headers, config){
				showNotification("Excluído!", message, null, ".alert-area.histograma", status, null);
				$scope.objectModel.histogramas 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ $scope.objectModel.cod_acompanhamento +"/histogramas?nolimit");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, ".alert-area.histograma", status, null);
			});

	}

	$scope.saveAnexo = function() {
		$("button[ng-click='saveAnexo()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.anexoModel);

		$http.post(baseUrlApi()+'diario-de-obra/'+ $scope.objectModel.cod_acompanhamento +'/anexo', postData)
			.success(function(message, status, headers, config){
				$scope.anexoModel = null;
				$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
				showNotification("Salvo!", message, null, ".alert-area.anexo", status, null);
				$scope.objectModel.anexos 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ $scope.objectModel.cod_acompanhamento +"/anexos?nolimit");
				$("button[ng-click='saveAnexo()']").button('reset');
			})
			.error(function(response, status, headers, config){
				if(status == 406) {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification("Atenção!", "Alguns campos obrigatórios não foram preenchidos.", null, ".alert-area.anexo", status);
					applyFormErrors(response, "objectModel", status);
				}
				else {
					$("#modalEditar .modal-body").animate({ scrollTop: 0 }, "slow");
					showNotification(null, response, null, ".alert-area.anexo", status, null);
				}

				$("button[ng-click='saveAnexo()']").button('reset');
			});
	}

	$scope.deleteAnexo = function(anexoItem) {
		var postData = {
			id_arquivo: anexoItem.id_arquivo
		};

		$http.delete(baseUrlApi()+"diario-de-obra/anexo", {params: postData})
			.success(function(message, status, headers, config){
				showNotification("Excluído!", message, null, ".alert-area.anexo", status, null);
				$scope.objectModel.anexos = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ $scope.objectModel.cod_acompanhamento +"/anexos?nolimit");
				$scope.clearAttachment(anexoItem.pth_arquivo);
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, ".alert-area.anexo", status, null);
			});

	}

	$scope.fileUploaded = function(message) {
		var parsedObj = JSON.parse(message);

		$scope.anexoModel = {
			nme_arquivo: parsedObj.flowFileName,
			pth_arquivo: parsedObj.flowFilePath,
			dsc_tipo_arquivo: parsedObj.flowFileType
		};
	}

	$scope.clearAttachment = function(pth_arquivo) {
		if(!pth_arquivo)
			pth_arquivo = $scope.anexoModel.pth_arquivo;

		$http.get(baseUrl()+'file-delete.php?file-path='+ pth_arquivo)
			.success(function(message, status, headers, config) {
				$scope.anexoModel = null;
			})
			.error(function(message, status, headers, config) {
				showNotification(null, message, null, '.alert-area.anexo', status);
			});
	}

	function clearObject() {
		$scope.objectModel = {
			cod_empreendimento: null
		};
	}

	function loadDiarioObraById(idDiarioObra) {
		$http.get(baseUrlApi()+'diario-de-obra/'+ idDiarioObra)
			.success(function(responseData) {
				$scope.objectModel = responseData;

				$scope.objectModel.dta_registro 			= (!isEmpty(responseData.dta_registro)) 			? moment(responseData.dta_registro, 'YYYY-MM-DD 00:00:00').format('DD/MM/YYYY') : null;
				$scope.objectModel.dta_vistoria 			= (!isEmpty(responseData.dta_vistoria)) 			? moment(responseData.dta_vistoria, 'YYYY-MM-DD 00:00:00').format('DD/MM/YYYY') : null;
				$scope.objectModel.dta_limite_pendencia 	= (!isEmpty(responseData.dta_limite_pendencia)) 	? moment(responseData.dta_limite_pendencia, 'YYYY-MM-DD 00:00:00').format('DD/MM/YYYY') : null;
				$scope.objectModel.dta_resolucao_pendencia 	= (!isEmpty(responseData.dta_resolucao_pendencia)) 	? moment(responseData.dta_resolucao_pendencia, 'YYYY-MM-DD 00:00:00').format('DD/MM/YYYY') : null;
				$scope.objectModel.dta_log 					= (!isEmpty(responseData.dta_log)) 					? moment(responseData.dta_log, 'YYYY-MM-DD 00:00:00').format('DD/MM/YYYY') : null;
				
				$("#cod_fiscal").val($scope.objectModel.nme_responsavel);

				$scope.objectModel.anexos 		= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ idDiarioObra +"/anexos?nolimit");
				$scope.objectModel.histogramas 	= AsyncAjaxSrvc.getListOfItens(baseUrlApi()+"diario-de-obra/"+ idDiarioObra +"/histogramas?nolimit");
			});
	}

	$('#modalEditar').on('show.bs.modal', function (evt) {
		if(evt.relatedTarget)
			loadDiarioObraById($(evt.relatedTarget).data().codAcompanhamento);
	});

	$('input.typeahead').typeahead({
		onSelect: function(item) {
			$scope.objectModel.cod_fiscal = parseInt(item.value,10);
		},
		items: 10,
		ajax: {
			url: baseUrlApi()+'interessados',
			valueField: 'cod_fiscal',
			displayField: 'nme_responsavel',
			preDispatch: function(query) {
				return {
					search: query
				}
			},
			preProcess: function(data) {
				if(data.rows)
					return data.rows;
				else
					return null;
			}
		}
	});

	clearObject();
});