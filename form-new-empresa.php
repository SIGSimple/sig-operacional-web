<div class="panel" ng-controller="CadastroEmpresaController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<fieldset>
				<legend>Dados da Empresa</legend>
				<div class="form-group element-group">
					<label class="control-label col-lg-2">Nome</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="Construtora" ng-model="objectModel.Construtora">
					</div>
				</div>

				<div class="form-group element-group">
					<label class="control-label col-lg-2">Endereço</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="end_construtora" ng-model="objectModel.end_construtora">
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="control-label col-lg-2">CEP</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="cep_empresa" ng-model="objectModel.cep_empresa" ui-br-cep-mask>
						</div>
					</div>
				
					<div class="element-group">
						<label class="col-lg-1 control-label" for="cod_municipio_empresa">Municipio</label>
						<div class="col-lg-5">
							<div class="input-group">
								<select id="cod_municipio_empresa" name="cod_municipio_empresa"
									chosen class="chosen" options="municipios"
									ng-model="objectModel.cod_municipio_empresa"
									ng-options="item.cod_mun as item.Municipios for item in municipios">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_municipio_empresa = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="control-label col-lg-2">E-mail</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="email_empresa" ng-model="objectModel.email_empresa">
						</div>
					</div>

					<div class="element-group">
						<label class="control-label col-lg-1">Site</label>
						<div class="col-lg-4">
							<input type="text" class="form-control" name="site_empresa" ng-model="objectModel.site_empresa">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="control-label col-lg-2">Nº Telefone</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="num_telefone" ng-model="objectModel.num_telefone" ui-br-phone-number>
						</div>
					</div>

					<div class="element-group">
						<label class="control-label col-lg-1">Nº CNPJ</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="cnpj_empresa" ng-model="objectModel.cnpj_empresa" ui-br-cnpj-mask>
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Contato</legend>

				<div class="form-group">
					<div class="element-group">
						<label class="control-label col-lg-2">Eng. Responsável</label>
						<div class="col-lg-5">
							<input type="text" class="form-control" name="nme_engenheiro_responsavel" ng-model="objectModel.nme_engenheiro_responsavel">
						</div>
					</div>

					<div class="element-group">
						<label class="control-label col-lg-1">Nº CREA</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="num_crea" ng-model="objectModel.num_crea">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="control-label col-lg-2">Nº Telefone</label>
						<div class="col-lg-2">
							<input type="text" class="form-control" name="telefone_responsavel" ng-model="objectModel.telefone_responsavel" ui-br-phone-number>
						</div>
					</div>

					<div class="element-group">
						<label class="control-label col-lg-1">E-mail</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="email_responsavel" ng-model="objectModel.email_responsavel">
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-left">
			<div class="box-inline">
				<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" ng-show="(objectModel.cod_construtora)" data-toggle="modal" data-target='#modalExcluir'>Excluir cadastro</button>
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