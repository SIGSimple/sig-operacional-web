<div class="panel" ng-controller="CadastroAgenciaCetesbController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group element-group">
				<label class="control-label col-lg-3">Agência Ambiental de(o)</label>
				<div class="col-lg-4">
					<input type="text" class="form-control" name="nme_agencia" ng-model="objectModel.nme_agencia">
				</div>
			</div>

			<div class="form-group element-group">
				<label class="control-label col-lg-3">Endereço</label>
				<div class="col-lg-6">
					<input type="text" class="form-control" name="dsc_endereco" ng-model="objectModel.dsc_endereco">
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="control-label col-lg-3">Bairro</label>
					<div class="col-lg-3">
						<input type="text" class="form-control" name="dsc_bairro" ng-model="objectModel.dsc_bairro">
					</div>
				</div>

				<div class="element-group">
					<label class="control-label col-lg-1">CEP</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="num_cep" ng-model="objectModel.num_cep" ui-br-cep-mask>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_municipio">Cidade/Municipio</label>
				<div class="col-lg-6">
					<div class="input-group">
						<select id="cod_municipio" name="cod_municipio"
							chosen class="chosen" options="municipios"
							ng-model="objectModel.cod_municipio"
							ng-options="item.cod_mun as item.Municipios for item in municipios">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_municipio = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="control-label col-lg-3">Telefone</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="num_telefone" ng-model="objectModel.num_telefone" ui-br-phone-number>
					</div>
				</div>

				<div class="element-group">
					<label class="control-label col-lg-1">Fax</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="num_fax" ng-model="objectModel.num_fax" ui-br-phone-number>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="control-label col-lg-3">E-mail</label>
				<div class="col-lg-6">
					<input type="text" class="form-control" name="end_email" ng-model="objectModel.end_email">
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="municipios_atendidos">Municipios Atendidos</label>
				<div class="col-lg-6">
					<div class="input-group">
						<select id="municipios_atendidos" name="municipios_atendidos" multiple
							chosen class="chosen" options="municipios"
							ng-model="objectModel.municipios_atendidos"
							ng-options="item.cod_mun as item.Municipios for item in municipios">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.municipios_atendidos = []">
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
				<a href="list-agencia-cetesb" class="btn btn-default">Voltar p/ Listagem</a>
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