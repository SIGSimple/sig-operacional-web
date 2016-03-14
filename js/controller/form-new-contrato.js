app.controller('CadastroContratoController', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.objectModel;
	$scope.situacoesContrato = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'situacoes/contrato');
	$scope.parceiros = AsyncAjaxSrvc.getListOfItens(baseUrlApi()+'parceiros');

	var modalTablesColumns = {
		empreendimentos: [
			{
				field: 'PI',
				title: 'Nº Autos'
			},
			{
				field: 'nme_municipio',
				title: 'Municipio'
			},
			{
				field: 'nome_empreendimento',
				title: 'Localidade'
			}
		],
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

	$scope.objectModalCronograma = {};

	$scope.abreModalCrongorama = function() {
		$('#modalEditar').modal('show');

		if(typeof getUrlVars().id != "undefined") {
			$http.get(baseUrlApi()+'contrato/'+ $scope.objectModel.id +'/cronograma/56/itens?nolimit')
					.success(function(responseData) {
						$.each(responseData, function(index, item) {
							responseData[index].ano_mes = moment(item.dta_planejamento, "YYYY-MM-DD 00:00:00").format("YYYY-MM-01");
						});
						$scope.objectModalCronograma.mesesCronograma 	= _.groupBy(responseData, 'ano_mes');
						$scope.objectModalCronograma.itensCronograma 	= {};
						$scope.objectModalCronograma.subtotaisMeses 	= [];
						$scope.objectModalCronograma.totalGeral 		= 0;

						$.each(_.groupBy(responseData, "dsc_item"), function(itemName, meses) {
							$scope.objectModalCronograma.itensCronograma[itemName] = {
								id: meses[0].cod_item_planejamento,
								flg_reajuste: meses[0].flg_reajuste,
								meses: meses, 
								subtotal: 0
							};

							$.each($scope.objectModalCronograma.itensCronograma[itemName].meses, function(jj, item){
								$scope.objectModalCronograma.itensCronograma[itemName].subtotal += parseFloat(item.vlr_planejamento);
							});
						});

						$.each($scope.objectModalCronograma.mesesCronograma, function(mes, items) {
							var vlrSubtotal = 0;

							$.each(items, function(jj, item){
								vlrSubtotal += parseFloat(item.vlr_planejamento);
							});

							$scope.objectModalCronograma.subtotaisMeses.push(vlrSubtotal);
							$scope.objectModalCronograma.totalGeral += vlrSubtotal;
						});
					});
		}
	}

	$scope.refreshCronogramaGrid = function() {
		if(!isEmpty($scope.objectModalCronograma.dta_inicio_periodo) && !isEmpty($scope.objectModalCronograma.dta_fim_periodo)) {
			var dtaInicioPeriodo 	= moment($scope.objectModalCronograma.dta_inicio_periodo, 'DD/MM/YYYY');
			var dtaFimPeriodo 		= moment($scope.objectModalCronograma.dta_fim_periodo, 'DD/MM/YYYY');
			var intervaloPeriodo 	= dtaFimPeriodo.diff(dtaInicioPeriodo, 'months');

			$scope.objectModalCronograma.subtotaisMeses 	= [];
			$scope.objectModalCronograma.totalGeral 		= 0;
			$scope.objectModalCronograma.mesesCronograma 	= {};
			$scope.objectModalCronograma.mesesCronograma[dtaInicioPeriodo.format('YYYY-MM-01')] = [];
			
			for (var i = 0; i < intervaloPeriodo; i++) {
				$scope.objectModalCronograma.mesesCronograma[dtaInicioPeriodo.add(1, 'month').format('YYYY-MM-01')] = [];
			};

			$scope.objectModalCronograma.itensCronograma = {};
			for (var x = 0; x < 3; x++) {
				var obj = {
					cod_item_planejamento: x,
					flg_reajuste: 0,
					meses: [],
					subtotal: 0,
				};
				for (var jj = 0; jj <= intervaloPeriodo; jj++) {
					obj.meses.push({
						cod_item_planejamento: 	obj.cod_item_planejamento,
						dta_planejamento: 		Object.keys($scope.objectModalCronograma.mesesCronograma)[jj],
						vlr_planejamento: 		0
					});
				}
				$scope.objectModalCronograma.itensCronograma[x] = obj;
			};

			for (var jj = 0; jj <= intervaloPeriodo; jj++) {
				$scope.objectModalCronograma.subtotaisMeses.push(0);
			}
		}
	}

	$scope.atualizaSubtotais = function() {
		$scope.objectModalCronograma.totalGeral	= 0;
		$.each($scope.objectModalCronograma.itensCronograma, function(itemIndex, itemData) {
			itemData.subtotal = 0;
			$scope.objectModalCronograma.subtotaisMeses[itemIndex];
			$.each(itemData.meses, function(mesIndex, mesData) {
				itemData.subtotal += mesData.vlr_planejamento;
			});

			$scope.objectModalCronograma.totalGeral += itemData.subtotal;
		});
	}

	$scope.abreModal = function(rota, atributo, indexFieldDisplay) {
		$("#modalItemsLabel").text("LISTAGEM DE " + rota.replace("-"," de ").toUpperCase());
		$("#modalItems").modal("show");
		$('#mytable').bootstrapTable({
			url: baseUrlApi() + rota.toLowerCase() +".json",
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

		$http.delete(baseUrlApi()+"contrato", {params: data})
			.success(function(message, status, headers, config){
				$("#modalExcluir").modal("hide");
				clearObject();
				showNotification("Excluído!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-contrato", "list-contrato");
			})
			.error(function(message, status, headers, config){
				showNotification(null, message, null, 'page', status);
			});
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		postData.dta_assinatura 					= (!isEmpty(postData.dta_assinatura)) ? moment(postData.dta_assinatura, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_publicacao_doe 				= (!isEmpty(postData.dta_publicacao_doe)) ? moment(postData.dta_publicacao_doe, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_pedido_empenho 				= (!isEmpty(postData.dta_pedido_empenho)) ? moment(postData.dta_pedido_empenho, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_os 							= (!isEmpty(postData.dta_os)) ? moment(postData.dta_os, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_vigencia 						= (!isEmpty(postData.dta_vigencia)) ? moment(postData.dta_vigencia, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_base 							= (!isEmpty(postData.dta_base)) ? moment(postData.dta_base, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_inauguracao 					= (!isEmpty(postData.dta_inauguracao)) ? moment(postData.dta_inauguracao, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_termo_recebimento_provisorio 	= (!isEmpty(postData.dta_termo_recebimento_provisorio)) ? moment(postData.dta_termo_recebimento_provisorio, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_termo_recebimento_definitivo 	= (!isEmpty(postData.dta_termo_recebimento_definitivo)) ? moment(postData.dta_termo_recebimento_definitivo, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_encerramento_contrato 			= (!isEmpty(postData.dta_encerramento_contrato)) ? moment(postData.dta_encerramento_contrato, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_recisao_contratual 			= (!isEmpty(postData.dta_recisao_contratual)) ? moment(postData.dta_recisao_contratual, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_inicio_obras 					= (!isEmpty(postData.dta_inicio_obras)) ? moment(postData.dta_inicio_obras, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_previsao_termino 				= (!isEmpty(postData.dta_previsao_termino)) ? moment(postData.dta_previsao_termino, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_conclusao_inauguracao 			= (!isEmpty(postData.dta_conclusao_inauguracao)) ? moment(postData.dta_conclusao_inauguracao, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;
		postData.dta_previsao_inauguracao 			= (!isEmpty(postData.dta_previsao_inauguracao)) ? moment(postData.dta_previsao_inauguracao, 'DD/MM/YYYY').format('YYYY-MM-DD') : null;

		$http.post(baseUrlApi()+'contrato', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-contrato", "list-contrato");
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
			$http.get(baseUrlApi()+'contrato/'+ getUrlVars().id)
				.success(function(responseData) {
					$scope.objectModel = responseData;
					loadItensContrato();

					if(responseData.cod_empreendimento) {
						$scope.objectModel.empreendimento = {
							data: {
								cod_empreendimento: responseData.cod_empreendimento,
								nme_municipio: responseData.nme_municipio
							},
							type: "empreendimentos",
							label: responseData.nme_empreendimento
						};
					}
					
					if(responseData.cod_empresa_contratada) {
						$scope.objectModel.empresa_contratada = {
							data: {
								cod_construtora: responseData.cod_empresa_contratada
							},
							type: "emresas",
							label: responseData.nme_empresa_contratada
						};
					}

					if(responseData.cod_engenheiro_empresa_contratada) {
						$scope.objectModel.engenheiro_empresa_contratada = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_empresa_contratada
							},
							type: "interessados",
							label: responseData.nme_engenheiro_empresa_contratada
						};
					}
					
					if(responseData.cod_engenheiro_obras_consorcio) {
						$scope.objectModel.engenheiro_obras_consorcio = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_obras_consorcio
							},
							type: "interessados",
							label: responseData.nme_engenheiro_obras_consorcio
						};
					}

					if(responseData.cod_engenheiro_daee) {
						$scope.objectModel.engenheiro_daee = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_daee
							},
							type: "interessados",
							label: responseData.nme_engenheiro_daee
						};
					}

					if(responseData.cod_engenheiro_planejamento_obras_consorcio) {
						$scope.objectModel.engenheiro_planejamento_obras_consorcio = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_planejamento_obras_consorcio
							},
							type: "interessados",
							label: responseData.nme_engenheiro_planejamento_obras_consorcio
						};
					}

					if(responseData.cod_fiscal_consorcio) {
						$scope.objectModel.fiscal_consorcio = {
							data: {
								cod_fiscal_consorcio: responseData.cod_fiscal_consorcio
							},
							type: "interessados",
							label: responseData.nme_fiscal_consorcio
						};
					}

					if(responseData.cod_engenheiro_responsavel_medicao) {
						$scope.objectModel.engenheiro_responsavel_medicao = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_responsavel_medicao
							},
							type: "interessados",
							label: responseData.nme_engenheiro_responsavel_medicao
						};
					}

					if(responseData.cod_engenheiro_obras_construtora) {
						$scope.objectModel.engenheiro_obras_construtora = {
							data: {
								cod_fiscal: responseData.cod_engenheiro_obras_construtora
							},
							type: "interessados",
							label: responseData.nme_engenheiro_obras_construtora
						};
					}

					$scope.objectModel.dta_assinatura 					= (!isEmpty(responseData.dta_assinatura)) ? moment(responseData.dta_assinatura, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_publicacao_doe 				= (!isEmpty(responseData.dta_publicacao_doe)) ? moment(responseData.dta_publicacao_doe, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_pedido_empenho 				= (!isEmpty(responseData.dta_pedido_empenho)) ? moment(responseData.dta_pedido_empenho, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_os 							= (!isEmpty(responseData.dta_os)) ? moment(responseData.dta_os, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_vigencia 					= (!isEmpty(responseData.dta_vigencia)) ? moment(responseData.dta_vigencia, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_base 						= (!isEmpty(responseData.dta_base)) ? moment(responseData.dta_base, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_inauguracao 					= (!isEmpty(responseData.dta_inauguracao)) ? moment(responseData.dta_inauguracao, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_termo_recebimento_provisorio = (!isEmpty(responseData.dta_termo_recebimento_provisorio)) ? moment(responseData.dta_termo_recebimento_provisorio, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_termo_recebimento_definitivo = (!isEmpty(responseData.dta_termo_recebimento_definitivo)) ? moment(responseData.dta_termo_recebimento_definitivo, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_encerramento_contrato 		= (!isEmpty(responseData.dta_encerramento_contrato)) ? moment(responseData.dta_encerramento_contrato, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_recisao_contratual 			= (!isEmpty(responseData.dta_recisao_contratual)) ? moment(responseData.dta_recisao_contratual, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_inicio_obras 				= (!isEmpty(responseData.dta_inicio_obras)) ? moment(responseData.dta_inicio_obras, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_previsao_termino 			= (!isEmpty(responseData.dta_previsao_termino)) ? moment(responseData.dta_previsao_termino, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_conclusao_inauguracao 		= (!isEmpty(responseData.dta_conclusao_inauguracao)) ? moment(responseData.dta_conclusao_inauguracao, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
					$scope.objectModel.dta_previsao_inauguracao 		= (!isEmpty(responseData.dta_previsao_inauguracao)) ? moment(responseData.dta_previsao_inauguracao, 'YYYY-MM-DD').format('DD/MM/YYYY') : null;
				});
		}
	}

	function loadItensContrato() {
		$scope.objectModel.vlrTotalPrevisto = 0;
		$scope.objectModel.vlrTotalMedido 	= 0;
		$http.get(baseUrlApi()+'contrato/'+ getUrlVars().id +'/itens')
				.success(function(responseData) {
					$scope.objectModel.itens = responseData;

					$.each(responseData, function(i, item) {
						$scope.objectModel.vlrTotalMedido += item.vlr_medido_acumulado;
						item.vlr_previsto_acumulado = 0;
					});
				});
	}

	clearObject();
	loadDadosByUrlId();
});