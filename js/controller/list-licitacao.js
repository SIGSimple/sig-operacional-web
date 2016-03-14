configBootstrapTable();

function editFormater(value, row, index) {
	return [
        '<a class="btn btn-xs btn-warning" href="form-new-licitacao?id='+ row.id +'" data-toggle="tooltip" title="Visualizar Cadastro">',
        	'<i class="fa fa-edit"></i>',
        '</a>'
    ].join('');
};

app.controller('ListLicitacaoCtrl', function($scope, $http, UserSrvc){

});