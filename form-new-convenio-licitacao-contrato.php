<div class="panel" ng-controller="CadastroConvenioLicitacaoContratoController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_convenio">Convênio</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" id="cod_convenio" name="cod_convenio" class="form-control" readonly="readonly" 
							value="{{ objectModel.convenio.data.num_autos }} - {{ objectModel.convenio.data.num_convenio }}" 
							ng-click="abreModal('CONVENIOS', 'convenio', 2)">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('CONVENIOS', 'convenio', 2)">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.convenio = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_licitacao">Licitação</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" id="cod_licitacao" name="cod_licitacao" class="form-control" readonly="readonly" 
							value="{{ objectModel.licitacao.data.num_autos }} - {{ objectModel.licitacao.data.num_edital }}" 
							ng-click="abreModal('LICITACOES', 'licitacao')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('LICITACOES', 'licitacao')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.licitacao = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="cod_contrato">Contrato</label>
					<div class="col-lg-6">
						<div class="input-group">
							<input type="text" id="cod_contrato" name="cod_contrato" class="form-control" readonly="readonly" 
								value="{{ objectModel.contrato.data.num_autos }} - {{ objectModel.contrato.data.num_contrato }}" 
								ng-click="abreModal('CONTRATOS', 'contrato')">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" ng-click="abreModal('CONTRATOS', 'contrato')">
									<i class="fa fa-search"></i>
								</button>
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.contrato = {}">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="vlr_destinado_contrato">Valor Destinado ao Contrato</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon">R$</span>
							<input type="text" id="vlr_destinado_contrato" name="vlr_destinado_contrato" class="form-control text-right" ng-model="objectModel.vlr_destinado_contrato" ui-number-mask>
						</div>
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