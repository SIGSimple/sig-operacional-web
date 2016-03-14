app.controller('CadastroConfiguracaoCtrl', function($scope, $http, UserSrvc){
	$scope.chaveConfiguracao;

	$scope.save = function() {
		$("button[ng-click='save()']").button('loading');
		clearValidationFormStyle();
		$http.post(baseUrlApi()+'configuracao/chave', $scope.chaveConfiguracao)
			.success(function(message, status, headers, config){
				clearObject();
				showNotification("Salvo!", message, null, 'page', status);
				redirectToPageOnSuccess("form-new-chave-configuracao", "list-chave-configuracao");
			})
			.error(function(message, status, headers, config){
				if(status == 406){ // Not-Acceptable (Campos inválidos)
					showNotification("Atenção!", "Alguns campos não foram preenchidos.", null, 'page', status);

					// percorre a lista de campos devolvidos da API
					$.each(message, function(index, value) {
						// seleciona os elemento HTML de acordo com o campo mencionado
						var element = ($("[ng-model='chaveConfiguracao."+ index +"']").length > 0) ? $("[ng-model='chaveConfiguracao."+ index +"']") : $("[name='"+ index +"']");
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
		$scope.chaveConfiguracao = {
			chv_configuracao: "",
			vlr_configuracao: "",
			flg_ativo: 1
		};
	}

	function clearValidationFormStyle() {
		// remove as mensagens de erro dos campos obrigatórios
		$('[data-toggle="tooltip"]').removeAttr("data-toggle").removeAttr("data-placement").removeAttr("title").removeAttr("data-original-title");
		$(".form-group").removeClass("has-error");
	}

	clearObject();
});