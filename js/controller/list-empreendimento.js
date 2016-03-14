configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-empreendimento?cod_empreendimento='+ row.cod_empreendimento +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
};

app.controller('ListEmpreendimentoCtrl', function($scope, $http, UserSrvc){

});