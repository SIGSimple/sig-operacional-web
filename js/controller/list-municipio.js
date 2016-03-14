configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-municipio?id_predio='+ row.id_predio +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
};

function periodoAdministracaoFormatter(value, row, index) {
	return 'De '+ row.ano_inicio_adm +' Até '+ row.ano_fim_adm;
};

function atendidoSabespFormatter(value, row, index) {
	return (parseInt(row.flg_atendido_sabesp) == 1) ? "Sim" : "Não";
};

app.controller('ListMunicipioCtrl', function($scope, $http, UserSrvc){

});