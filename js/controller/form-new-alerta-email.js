app.controller('CadastroAlertaEmailController', function($scope, $http, UserSrvc){
	$scope.objectModel;

	var modalTablesColumns = {
		interessados: [
			{
				field: 'nme_responsavel',
				title: 'Nome'
			},
			{
				field: 'cargo',
				title: 'Cargo/Função'
			},
			{
				field: 'email',
				title: 'E-mail'
			},
			{
				field: 'nme_empresa',
				title: 'Empresa'
			}
		]
	};

	$scope.abreModal = function(rota, atributo) {
		$("#modalItemsLabel").text("LISTAGEM DE " + rota.replace("-"," de ").toUpperCase());
		$("#modalItems").modal("show");
		$('#mytable').bootstrapTable({
			url: baseUrlApi() + rota +".json?rsp->email[exp]=is%20not%20null",
			search: true,
			showRefresh: true,
			showToggle: true,
			showColumns: true,
			pageList: "[5, 10, 20, 50, 100, All]",
			pageSize: "5",
			pagination: true,
			sidePagination: "server",
			showPaginationSwitch: true,
			columns: modalTablesColumns[rota],
			onClickRow: function(row, $element) {
				$scope.objectModel[atributo].push(row);
				$scope.$apply();
				$('#mytable').bootstrapTable('destroy');
				$("#modalItems").modal("hide");
			}
		});
	}

	$scope.removeItem = function(index) {
		$scope.objectModel.destinatarios.splice(index, 1);
	}

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		clearValidationFormStyle();

		var postData = angular.copy($scope.objectModel);

		$.each($(".date").find("input"), function(index, field) {
			var fieldName = $(field).attr("name"),
				fieldValue = postData[fieldName];
			if(postData[fieldName] != "")
				postData[fieldName] = moment(fieldValue, "DD/MM/YYYY").format("YYYY-MM-DD");
		});

		$http.post(baseUrlApi()+'alerta/email', postData)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-alerta-email", "list-alerta-email");
			})
			.error(function(message, status, headers, config){
				if(status == 406){ // Not-Acceptable (Campos inválidos)
					showNotification("Atenção!", "Alguns campos não foram preenchidos.", null, 'page', status);

					// percorre a lista de campos devolvidos da API
					$.each(message, function(index, value) {
						// seleciona os elemento HTML de acordo com o campo mencionado
						var element = ($("[ng-model='objectModel."+ index +"']").length > 0) ? $("[ng-model='objectModel."+ index +"']") : $("[name='"+ index +"']");
						
						if(element.is("table")) // tratamento exclusivo para tabelas
				    		$(element).find("thead").css("background-color","#A94442").css("color","#FFFFFF");

						// coloca a mensagem de erro no elemento HTML selecionado
			    		element.attr("data-toggle","tooltip").attr("data-placement","top").attr("title", value).attr("data-original-title", value);
			    		element.closest(".form-group").addClass("has-error");
					});

					// inicializa o tooltip para exibir o erro ao passar o mouse sobre o elemento HTML
					$('[data-toggle="tooltip"]').tooltip();
				}
				else {
					showNotification(null, message, null, 'page', status);
				}

				$("button[ng-click='save()']").button('reset');
			})
	}

	function clearObject() {
		$scope.objectModel = {
			nme_alerta: "",
			sql_query: "",
			txt_html_email: "",
			dta_inicio: "",
			dta_fim: "",
			flg_ativo: 1,
			flg_periodicidade: "",
			destinatarios: []
		};
	}

	function clearValidationFormStyle() {
		// remove as mensagens de erro dos campos obrigatórios
		$("table thead").css("background-color","#fff").css("color","#515151");
		$('[data-toggle="tooltip"]').removeAttr("data-toggle").removeAttr("data-placement").removeAttr("title").removeAttr("data-original-title");
		$(".form-group").removeClass("has-error");
	}

	clearObject();
});