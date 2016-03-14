$(function(){
	moment.locale('pt-br');
	initializeTimepickerInputs();

	$('.input-group.date').datepicker({
		language: 'pt-BR',
		format: 'dd/mm/yyyy',
		autoclose: true,
		todayHighlight: true,
		todayBtn: true,
		clearBtn: true
	});

	resetSwitchInput();

	$('[data-toggle="tooltip"]').tooltip();

	var feedbackValidatorIcons = {
		valid: 'fa fa-check-circle fa-lg text-success',
		invalid: 'fa fa-times-circle fa-lg',
		validating: 'fa fa-refresh'
	};

	$("#modalItems").on("hide.bs.modal", function(e) {
		$('#mytable').bootstrapTable('destroy');
	});
});

function applyFormErrors(errors, dataElement, status) {
	// percorre a lista de campos devolvidos da API
	$.each(errors, function(index, value) {
		// seleciona os elemento HTML de acordo com o campo mencionado
		var element = ($("[ng-model='"+ dataElement +"."+ index +"']").length > 0) ? $("[ng-model='"+ dataElement +"."+ index +"']") : $("[name='"+ index +"']");

		if(element.is("table")) // tratamento exclusivo para tabelas
    		$(element).find("thead").css("background-color","#A94442").css("color","#FFFFFF");
    	else if(element.is("span")) // tratamento exclusivo para spans
    		$(element).css("border-color","#A94442").css("color","#A94442");
    	else if(typeof(element.attr('flow-btn')) != "undefined")
    		element = $(element).closest("span").css("background-color","#A94442").css("border-color","#A94442").css("color","#FFFFFF");
    	else if(element.hasClass("chosen")) {
    		var form_group = element.closest(".form-group");
    		if(form_group.find("a.chosen-single").length > 0)
				element = form_group.find("a.chosen-single");
			else if(form_group.find("ul.chosen-choices").length > 0)
				element = form_group.find("ul.chosen-choices");
			element.css("border-color","#A94442");
    	}

    	// coloca a mensagem de erro no elemento HTML selecionado
		element.attr("data-toggle","tooltip").attr("data-placement","top").attr("title", value).attr("data-original-title", value);
		element.closest(".element-group").addClass("has-error");
	});

	// inicializa o tooltip para exibir o erro ao passar o mouse sobre o elemento HTML
	$('[data-toggle="tooltip"]').tooltip();
}

function clearValidationFormStyle() {
	$('[data-toggle="tooltip"]').removeAttr("data-toggle").removeAttr("data-placement").removeAttr("title").removeAttr("data-original-title");
	$(".element-group").removeClass("has-error");
	$("table thead").css("background-color","none").css("color","#515151");
	$(".form-fields span").css("background-color", "#fafafa").css("border-color","#CDD6E1").css("color","#515151");
	$("a.chosen-single").css("border-color","#CDD6E1");
	$("ul.chosen-choices").css("border-color","#CDD6E1");
}

function redirectToPageOnSuccess(pageFrom, pageTo) {
	setTimeout(function(){
		var newUrl = window.location.href;
		if(window.location.href.indexOf("?") != -1) {
			// Remove os parâmetros da url
			newUrl = window.location.href.substr(0, window.location.href.indexOf("?"));
		}
		// Faz o redirecionamento
		window.location.href = newUrl.replace(pageFrom, pageTo);
	}, 5000);
}

function resetSwitchInput() {
	$("span.switchery").remove();
	$.each($('.input-switch'), function(i, el){
		new Switchery(el);
	});
}

function showNotification(title, message, icon, container, status, time) {
	var alertType = "";

	switch(status) {
		case 200:
		case 201:
			if(title == "")
				title = "Pronto!";
			alertType = 'success';
			icon = 'fa-check-circle fa-lg';
			break;
		case 404:
		case 500:
			if(title == "")
				title = "Ocorreu um erro!";
			alertType = 'danger';
			icon = 'fa-times-circle fa-lg';
			break;
		case 406:
			if(title == "")
				title = "Ops!";
			alertType = 'warning';
			icon = 'fa-warning fa-lg';
			break;
		default:
			alertType = 'dark';
			break;
	}

	if(time === 0 || time == null)
		time = 5000;

	$.niftyNoty({
		type: alertType,
		container: container,
		icon: 'fa ' + icon,
		title : title,
		message : message,
		timer : time
	});
}

function initializeTimepickerInputs() {
	$('.input-timepicker').timepicker({
		minuteStep: 1,
		secondStep: 5,
		showInputs: false,
		template: 'modal',
		modalBackdrop: true,
		showSeconds: false,
		showMeridian: false
	});
}

function configBootstrapTable(element, createTable) {
	if(!element)
		element = '.bootstrap-table';

	if(createTable) {
		$(element).bootstrapTable({
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
	}
	
	$(element).on('all.bs.table', function(){
		$(".img-profile-table").popover();
		$("[data-toggle='tooltip']").tooltip();
		$("[data-tooltip]").tooltip();
	});
}

function flgSimNaoFormatter(value, row, index) {
	return (parseInt(value) == 1) ? '<span class="label label-success">SIM</span>' : '<span class="label label-danger">NÃO</span>';
}

function monthFormatter(value) {
	if(typeof value != "undefined" && value != null)
		return value + " meses";
	else
		return "";
}

function ativoFormatter(value) {
	return (parseInt(value,10) == 1) ? '<i class="text-success fa fa-circle"></i> Ativo' : '<i class="text-danger fa fa-circle"></i> Inativo';
}

function dateFormatter(value) {
	if(value)
		return moment(value, "YYYY-MM-DD").format("DD/MM/YYYY");
	else
		return "";
}

function dateTimeFormatter(value) {
	return moment(value, "YYYY-MM-DD HH:mm:ss").format("DD/MM/YYYY HH:mm:ss");
}

function currencyFormatter(value) {
	var isParsed = (parseFloat(value)) ? true : false;

	if(isParsed)
		return "R$ " + numberFormat(parseFloat(value), 2, ",", ".");
}

function numberFormatter(value) {
	return numberFormat(parseInt(value), 0, ",", ".");
}

function percentFormatter(value) {
	return numberFormat(parseFloat(value), 2, ",", ".") + "%";
}

function phoneNumberFormatter(value) {
	var phoneNumber = "";

	if(value != null && value != "undefined") {
		value = value.toString();

		switch(value.length) {
			case 10: {
				phoneNumber = "("+ value.substr(0, 2) +") "+ value.substr(2, 4) +"-"+ value.substr(6, 4);
				break;
			}
			case 11: {
				phoneNumber = "("+ value.substr(0, 2) +") "+ value.substr(2, 5) +"-"+ value.substr(7, 4);
				break;
			}
			default: {
				phoneNumber = value;
				break;
			}
		}
	}

	return phoneNumber;
}

function getQueryParams(qs) {
	qs = qs.split('+').join(' ');

	var params = {},
	tokens,
	re = /[?&]?([^=]+)=([^&]*)/g;

	while (tokens = re.exec(qs)) {
		params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	}

	return params;
}

function isEmpty(value) {
	return (typeof value === "undefined" || value === null|| value === "");
}

// Applying a theme
// ================================
function changeTheme(themeName, type){
	var themeCSS = $('#theme'),
	filename = 'css/themes/type-'+type+'/'+themeName+'.min.css';

	if (themeCSS.length) {
		themeCSS.prop('href', filename);
	}else{
		themeCSS = '<link id="theme" href="'+filename+'" rel="stylesheet">';
		$('head').append(themeCSS);
	}
}