configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-manancial-lancamento?id='+ row.id +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
}

app.controller('ListManancialLancamentoCtrl', function($scope, $http, UserSrvc){

});