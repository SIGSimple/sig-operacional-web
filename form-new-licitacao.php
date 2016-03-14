<div class="panel" ng-controller="CadastroLicitacaoController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="num_autos">Nº Autos do Processo</label>
					<div class="col-lg-2">
						<input type="text" id="num_autos" name="num_autos" ng-model="objectModel.num_autos" class="form-control">
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label" for="num_edital">Nº do Edital</label>
					<div class="col-lg-2">
						<input type="text" id="num_edital" name="num_edital" ng-model="objectModel.num_edital" class="form-control">
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_tipo_contratacao">Tipo de Contratação</label>
				<div class="col-lg-5">
					<div class="input-group">
						<select id="cod_tipo_contratacao" name="cod_tipo_contratacao"
							chosen class="chosen" options="tiposContratacao"
							ng-model="objectModel.cod_tipo_contratacao"
							ng-options="item.id as item.dsc_tipo_contratacao for item in tiposContratacao">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_tipo_contratacao = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_financiador">Financiador</label>
				<div class="col-lg-4">
					<div class="input-group">
						<select id="cod_financiador" name="cod_financiador"
							chosen class="chosen" options="financiadores"
							ng-model="objectModel.cod_financiador"
							ng-options="item.id as item.dsc_financiador for item in financiadores">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_financiador = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_modalidade">Modalidade de Contratação</label>
				<div class="col-lg-4">
					<div class="input-group">
						<select id="cod_modalidade" name="cod_modalidade"
							chosen class="chosen" options="modalidadesContratacao"
							ng-model="objectModel.cod_modalidade"
							ng-options="item.id as item.dsc_modalidade for item in modalidadesContratacao">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_modalidade = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="dta_publicacao_doe">Publicação DOE</label>
					<div class="col-lg-2">
						<div class="input-group date">
							<input type="text" id="dta_publicacao_doe" name="dta_publicacao_doe" class="form-control text-center" ng-model="objectModel.dta_publicacao_doe">
							<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
						</div>
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-1 control-label" for="dta_licitacao">Licitação</label>
					<div class="col-lg-2">
						<div class="input-group date">
							<input type="text" id="dta_licitacao" name="dta_licitacao" class="form-control text-center" ng-model="objectModel.dta_licitacao">
							<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="vlr_licitacao">Valor Estimado</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="text" id="vlr_licitacao" name="vlr_licitacao" class="form-control text-right" ng-model="objectModel.vlr_licitacao" ui-number-mask>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_situacao_licitacao">Status/Situação</label>
				<div class="col-lg-3">
					<div class="input-group">
						<select id="cod_situacao_licitacao" name="cod_situacao_licitacao"
							chosen class="chosen" options="situacoes"
							ng-model="objectModel.cod_situacao_licitacao"
							ng-options="item.id as item.dsc_situacao for item in situacoes">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_licitacao = ''">
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
				<a href="list-contrato" class="btn btn-default">Voltar p/ Listagem</a>
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