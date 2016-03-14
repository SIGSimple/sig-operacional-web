<div class="panel" ng-controller="CadastroMunicipioController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group element-group">
				<label class="col-lg-2 control-label" for="cod_municipio">Cidade</label>
				<div class="col-lg-5">
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
					<label class="col-lg-2 control-label" for="cod_bacia_daee">Divisão de Bacia (DAEE)</label>
					<div class="col-lg-4">
						<div class="input-group">
							<select id="cod_bacia_daee" name="cod_bacia_daee"
								chosen class="chosen" options="divisoesBacia"
								ng-model="objectModel.cod_bacia_daee"
								ng-options="item.id as item.desc_diretoria for item in divisoesBacia">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_bacia_daee = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label" for="cod_bacia_secreteria">Divisão de Bacia (SSRH)</label>
					<div class="col-lg-4">
						<div class="input-group">
							<select id="cod_bacia_secretaria" name="cod_bacia_secretaria"
								chosen class="chosen" options="divisoesBacia"
								ng-model="objectModel.cod_bacia_secretaria"
								ng-options="item.id as item.desc_diretoria for item in divisoesBacia">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_bacia_secretaria = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-2 control-label">Prefeitura</label>
				<div class="col-lg-6">
					<div class="input-group">
						<input type="text" name="cod_prefeitura" class="form-control" readonly="readonly" value="{{ objectModel.prefeitura.label }}" ng-click="abreModal('EMPRESAS', 'prefeitura')">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" ng-click="abreModal('EMPRESAS', 'prefeitura')">
								<i class="fa fa-search"></i>
							</button>
							<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.prefeitura = {}">
								<i class="fa fa-times"></i>
							</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<div class="element-group">
					<label class="col-lg-2 control-label">Prefeito</label>
					<div class="col-lg-6">
						<div class="input-group">
							<input type="text" name="cod_prefeito" class="form-control" readonly="readonly" value="{{ objectModel.prefeito.label }}" ng-click="abreModal('INTERESSADOS', 'prefeito')">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'prefeito')">
									<i class="fa fa-search"></i>
								</button>
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.prefeito = {}">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-2 control-label">Período de Adm.</label>
					<div class="col-lg-1">
						<input type="text" class="form-control" name="ano_inicio_adm" ng-model="objectModel.ano_inicio_adm" placeholder="De">
					</div>
					<div class="col-lg-1">
						<input type="text" class="form-control" name="ano_fim_adm" ng-model="objectModel.ano_fim_adm" placeholder="Até">
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-1 control-label">Partido</label>
					<div class="col-lg-3">
						<div class="input-group">
							<select id="cod_partido" name="cod_partido"
								chosen class="chosen" options="partidos"
								ng-model="objectModel.cod_partido"
								ng-options="item.id as item.nme_partido for item in partidos">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_partido = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-2 control-label">População Urbana (2010)</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="qtd_populacao_urbana_2010" ng-model="objectModel.qtd_populacao_urbana_2010">
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label">Projeção de População (2030)</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="qtd_populacao_urbana_2030" ng-model="objectModel.qtd_populacao_urbana_2030">
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label">Atendido pela Sabesp</label>
					<div class="col-lg-1">
						<div class="checkbox">
							<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_atendido_sabesp == 1) ? 'active' : '' }}">
								<input type="checkbox" ng-model="objectModel.flg_atendido_sabesp" ng-change="validateState()">
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="element-group">
					<label class="col-lg-2 control-label">Concessão</label>
					<div class="col-lg-4">
						<div class="input-group">
							<select id="cod_concessao" name="cod_concessao"
								chosen class="chosen" options="concessoes"
								ng-model="objectModel.cod_concessao"
								ng-options="item.id as item.dsc_concessao for item in concessoes">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_concessao = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="element-group">
					<label class="col-lg-2 control-label">Localização Geográfica (Lat,Lng)</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" name="latitude_longitude" ng-model="objectModel.latitude_longitude">
					</div>
				</div>
			</div>

			<div class="form-group element-group">
				<label class="col-lg-2 control-label">Observações</label>
				<div class="col-lg-7">
					<textarea class="form-control" rows="4" ng-model="objectModel.dsc_observacoes"></textarea>
				</div>
			</div>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-left">
			<div class="box-inline">
				<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" ng-show="(objectModel.id_predio)" data-toggle="modal" data-target='#modalExcluir'>Excluir cadastro</button>
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