configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-situacao-contrato?cod_situacao='+ row.cod_situacao +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
}

app.controller('ListSituacaoContratoCtrl', function($scope, $http, UserSrvc){

});