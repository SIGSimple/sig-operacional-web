<div class="panel" ng-controller="CadastroConvenioController">
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
					<label class="col-lg-2 control-label" for="num_convenio">Nº do Convênio</label>
					<div class="col-lg-2">
						<input type="text" id="num_convenio" name="num_convenio" ng-model="objectModel.num_convenio" class="form-control">
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label">Empresa Projetista</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" name="cod_projetista_convenio" class="form-control" readonly="readonly" value="{{ objectModel.projetista_convenio.label }}" ng-click="abreModal('EMPRESAS', 'projetista_convenio')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('EMPRESAS', 'projetista_convenio')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.projetista_convenio = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_enquadramento">Enquadramento</label>
				<div class="col-lg-3">
					<div class="input-group">
						<select id="cod_enquadramento" name="cod_enquadramento"
							chosen class="chosen" options="enquadramentosConvenio"
							ng-model="objectModel.cod_enquadramento"
							ng-options="item.id as item.dsc_enquadramento for item in enquadramentosConvenio">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_enquadramento = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="cod_programa">Programa</label>
				<div class="col-lg-4">
					<div class="input-group">
						<select id="cod_programa" name="cod_programa"
							chosen class="chosen" options="programas"
							ng-model="objectModel.cod_programa"
							ng-options="item.cod_depto as item.desc_depto for item in programas">
						</select>
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_programa = ''">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="dta_assinatura">Assinatura</label>
					<div class="col-lg-2">
						<div class="input-group date">
							<input type="text" id="dta_assinatura" name="dta_assinatura" class="form-control text-center" ng-model="objectModel.dta_assinatura">
							<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
						</div>
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label" for="dta_publicacao_doe">Publicação DOE</label>
					<div class="col-lg-2">
						<div class="input-group date">
							<input type="text" id="dta_publicacao_doe" name="dta_publicacao_doe" class="form-control text-center" ng-model="objectModel.dta_publicacao_doe">
							<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-3 control-label" for="prz_meses">Prazo Original (em Meses)</label>
					<div class="col-lg-1">
						<input type="text" id="prz_meses" name="prz_meses" ng-model="objectModel.prz_meses" class="form-control">
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-3 control-label" for="dta_vigencia">Vigente Até</label>
					<div class="col-lg-2">
						<div class="input-group date">
							<input type="text" id="dta_vigencia" name="dta_vigencia" class="form-control text-center" ng-model="objectModel.dta_vigencia">
							<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="vlr_original">Valor Original</label>
				<div class="col-lg-3">
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" id="vlr_original" name="vlr_original" class="form-control text-right" ng-model="objectModel.vlr_original" ui-number-mask>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="vlr_contra_partida_prefeitura">Contra Partida (PM)</label>
				<div class="col-lg-3">
					<div class="input-group">
						<span class="input-group-addon">R$</span>
						<input type="text" id="vlr_contra_partida_prefeitura" name="vlr_contra_partida_prefeitura" class="form-control text-right" ng-model="objectModel.vlr_contra_partida_prefeitura" ui-number-mask>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label" for="nme_fonte_recurso">Fonte de Recursos</label>
				<div class="col-lg-5">
					<input type="text" id="nme_fonte_recurso" name="nme_fonte_recurso" class="form-control" ng-model="objectModel.nme_fonte_recurso">
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-3 control-label">Coordenador (DAEE)</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" name="cod_coordenador_daee" class="form-control" readonly="readonly" value="{{ objectModel.coordenador_daee.label }}" ng-click="abreModal('INTERESSADOS', 'coordenador_daee')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'coordenador_daee')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.coordenador_daee = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-lg-3 control-label" for="dsc_observacoes">Observações</label>
				<div class="col-lg-6">
					<textarea id="dsc_observacoes" name="dsc_observacoes" ng-model="objectModel.dsc_observacoes" class="form-control" rows="4"></textarea>
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
				<a href="list-convenio" class="btn btn-default">Voltar p/ Listagem</a>
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