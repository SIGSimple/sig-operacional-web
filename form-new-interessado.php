<div class="panel" ng-controller="CadastroInteressadoController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			
			<div class="form-group element-group">
				<label class="control-label col-lg-2">Nome</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" name="nme_responsavel" ng-model="objectModel.nme_responsavel">
				</div>
			</div>

			<div class="form-group element-group">
				<label class="control-label col-lg-2">Cargo</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="cargo" ng-model="objectModel.cargo">
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="control-label col-lg-2">E-mail</label>
					<div class="col-lg-3">
						<input type="text" class="form-control" name="email" ng-model="objectModel.email">
					</div>
				</div>

				<div class="element-group">
					<label class="control-label col-lg-2">Nº Telefone</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="telefone" ng-model="objectModel.telefone" ui-br-phone-number>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="control-label col-lg-2">Nº CREA</label>
				<div class="col-lg-2">
					<input type="text" class="form-control" name="numero_crea" ng-model="objectModel.numero_crea">
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">Empresa</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" readonly="readonly" value="{{ objectModel.empresa.label }}" ng-click="abreModal('EMPRESAS', 'empresa')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('EMPRESAS', 'empresa')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.empresa = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-2 control-label">Login no Sistema</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" class="form-control" readonly="readonly" value="{{ objectModel.usuario.label }}" ng-click="abreModal('USUARIOS', 'usuario')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('USUARIOS', 'usuario')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.usuario = {}">
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
				<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" ng-show="(objectModel.cod_fiscal)" data-toggle="modal" data-target='#modalExcluir'>Excluir cadastro</button>
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

	<div class="modal fade" id="modalItems" tabindex="-1" role="dialog" aria-labelledby="modalItemsLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalItemsLabel"></h4>
				</div>
				<div class="modal-body">
					<table id="mytable">
					</table>
				</div>
				<div class="modal-footer clearfix">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>