configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-programa?cod_depto='+ row.cod_depto +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
}

app.controller('ListProgramaCtrl', function($scope, $http, UserSrvc){

});