<div class="panel" ng-controller="CadastroRecursoController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group element-group">
				<label class="control-label col-lg-2">Descrição</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="nme_recurso" ng-model="objectModel.nme_recurso">
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-2 control-label" for="cod_tipo_recurso">Tipo de Recurso</label>
				<div class="col-lg-3">
					<div class="input-group">
						<select id="cod_tipo_recurso" name="cod_tipo_recurso"
							chosen class="chosen" options="tiposRecurso"
							ng-model="objectModel.cod_tipo_recurso"
							ng-options="item.id as item.nme_tipo_recurso for item in tiposRecurso">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_tipo_recurso = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-left">
			<div class="box-inline">
				<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" ng-show="(objectModel.id)" data-toggle="modal" data-target='#modalExcluir'>Excluir cadastro</button>
			</div>
		</div>
		<div class="pull-right">
			<div class="box-inline">
				<a href="list-divisao-bacia" class="btn btn-default">Voltar p/ Listagem</a>
				<button type="button" class="btn btn-primary btn-labeled fa fa-save" ng-click="save()">Salvar</button>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Confirma exclusão?</h4>
				</div>
				<div class="modal-body">
					Confirma a exclusão do registro?
				</div>
				<div class="modal-footer clearfix">
					<div class="pull-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
						<button type="button" class="btn btn-default" ng-click="deleteRecord()">Sim</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>