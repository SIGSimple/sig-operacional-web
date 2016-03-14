<div class="panel" ng-controller="CadastroEmpreendimentoController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<fieldset>
				<legend>Informações Gerais</legend>

				<div class="form-group element-group">
					<label class="col-lg-3 control-label" for="cod_predio">Cidade</label>
					<div class="col-lg-5">
						<div class="input-group">
							<select id="cod_predio" name="cod_predio"
								chosen class="chosen" options="municipios"
								ng-model="objectModel.cod_predio"
								ng-options="item.id_predio as item.nme_municipio for item in municipios">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_predio = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="nome_empreendimento">Localidade</label>
						<div class="col-lg-3">
							<input id="nome_empreendimento" name="nome_empreendimento" type="text" class="form-control" ng-model="objectModel.nome_empreendimento">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-2 control-label" for="PI">Nº Autos do Processo</label>
						<div class="col-lg-2">
							<input type="text" id="PI" name="PI" ng-model="objectModel.PI" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="dsc_objeto_obra">Objeto da Obra</label>
					<div class="col-lg-7">
						<textarea id="dsc_objeto_obra" name="dsc_objeto_obra" ng-model="objectModel.dsc_objeto_obra" class="form-control" rows="4"></textarea>
					</div>
				</div>

				<div class="form-group element-group">
					<label class="col-lg-3 control-label" for="cod_tipo_empreendimento">Tipo</label>
					<div class="col-lg-3">
						<div class="input-group">
							<select id="cod_tipo_empreendimento" name="cod_tipo_empreendimento"
								chosen class="chosen" options="tiposEmpreendimento"
								ng-model="objectModel.cod_tipo_empreendimento"
								ng-options="item.id as item.desc_tipo for item in tiposEmpreendimento">
							</select>
							<span class="input-group-btn">
								<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_tipo_empreendimento = ''">
									<i class="fa fa-times"></i>
								</button>
							</span>
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-1 control-label" for="cod_programa">Programa</label>
						<div class="col-lg-3">
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
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="dsc_resultado_obtido">Benefício da Obra</label>
					<div class="col-lg-7">
						<textarea id="dsc_resultado_obtido" name="dsc_resultado_obtido" ng-model="objectModel.dsc_resultado_obtido" class="form-control" rows="4"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="cep">CEP</label>
						<div class="col-lg-2">
							<input id="cep" name="cep" type="text" class="form-control" ng-model="objectModel.cep">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-1 control-label" for="endereco">Endereço</label>
						<div class="col-lg-4">
							<input id="endereco" name="endereco" type="text" class="form-control" ng-model="objectModel.endereco">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="latitude_longitude" style="padding-top: 0;">Localização Geográfica<br/><small>(Latitude, Longitude)</small></label>
						<div class="col-lg-3">
							<input id="latitude_longitude" type="text" class="form-control" name="latitude_longitude" ng-model="objectModel.latitude_longitude">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="telefone">Telefone</label>
						<div class="col-lg-2">
							<input id="telefone" name="telefone" type="text" class="form-control" ng-model="objectModel.telefone" ui-br-phone-number>
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-1 control-label" for="email">E-mail</label>
						<div class="col-lg-4">
							<input id="email" name="email" type="text" class="form-control" ng-model="objectModel.email">
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Informações Complementares</legend>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="cod_bacia_hidrografica">Bacia Hidrográfica</label>
						<div class="col-lg-4">
							<div class="input-group">
								<select id="cod_bacia_hidrografica" name="cod_bacia_hidrografica"
									chosen class="chosen" options="baciasHidrograficas"
									ng-model="objectModel.cod_bacia_hidrografica"
									ng-options="item.id as item.nme_bacia_hidrografica for item in baciasHidrograficas">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_bacia_hidrografica = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="cod_manancial_lancamento">Manancial de Lançamento</label>
						<div class="col-lg-6">
							<div class="input-group">
								<select id="cod_manancial_lancamento" name="cod_manancial_lancamento"
									chosen class="chosen" options="mananciaisLancamento"
									ng-model="objectModel.cod_manancial_lancamento"
									ng-options="item.id as item.nme_manancial for item in mananciaisLancamento">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_manancial_lancamento = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="qtd_metragem_coletor_tronco">Coletor Tronco (m)</label>
						<div class="col-lg-1">
							<input id="qtd_metragem_coletor_tronco" name="qtd_metragem_coletor_tronco" type="text" class="form-control" ng-model="objectModel.qtd_metragem_coletor_tronco">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-2 control-label" for="qtd_metragem_interceptor">Interceptor (m)</label>
						<div class="col-lg-1">
							<input id="qtd_metragem_interceptor" name="qtd_metragem_interceptor" type="text" class="form-control" ng-model="objectModel.qtd_metragem_interceptor">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-2 control-label" for="qtd_metragem_linha_recalque">Linha de Recalque (m)</label>
						<div class="col-lg-1">
							<input id="qtd_metragem_linha_recalque" name="qtd_metragem_linha_recalque" type="text" class="form-control" ng-model="objectModel.qtd_metragem_linha_recalque">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="qtd_metragem_emissario_fluente_bruto">Emissário de Efluente Bruto (m)</label>
						<div class="col-lg-1">
							<input id="qtd_metragem_emissario_fluente_bruto" name="qtd_metragem_emissario_fluente_bruto" type="text" class="form-control" ng-model="objectModel.qtd_metragem_emissario_fluente_bruto">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-3 control-label" for="qtd_eee">Estação Elevatória de Esgoto (un)</label>
						<div class="col-lg-1">
							<input id="qtd_eee" name="qtd_eee" type="text" class="form-control" ng-model="objectModel.qtd_eee">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="cod_tipo_ete">Tipo de ETE</label>
						<div class="col-lg-5">
							<div class="input-group">
								<select id="cod_tipo_ete" name="cod_tipo_ete"
									chosen class="chosen" options="tiposETE"
									ng-model="objectModel.cod_tipo_ete"
									ng-options="item.id as item.nme_tipo_ete for item in tiposETE">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_tipo_ete = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label" for="dsc_estacao_tratamento">Estação de Tratamento</label>
					<div class="col-lg-7">
						<textarea id="dsc_estacao_tratamento" name="dsc_estacao_tratamento" ng-model="objectModel.dsc_estacao_tratamento" class="form-control" rows="4"></textarea>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="qtd_metragem_emissario_efluente_tratado">Emissário de Efluente Tratado (m)</label>
						<div class="col-lg-1">
							<input id="qtd_metragem_emissario_efluente_tratado" name="qtd_metragem_emissario_efluente_tratado" type="text" class="form-control" ng-model="objectModel.qtd_metragem_emissario_efluente_tratado">
						</div>
					</div>

					<div class="element-group">
						<label class="col-lg-2 control-label" for="num_vazao_sistema">Vazão do Sistema (I/s)</label>
						<div class="col-lg-1">
							<input id="num_vazao_sistema" name="num_vazao_sistema" type="text" class="form-control" ng-model="objectModel.num_vazao_sistema">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="element-group">
						<label class="col-lg-3 control-label" for="flg_estudo_elaborado_daee">Realização do Estudo</label>
						<div class="col-lg-2">
							<div class="input-group">
								<select id="flg_estudo_elaborado_daee" name="flg_estudo_elaborado_daee"
									chosen class="chosen" options="empresasEstudos"
									ng-model="objectModel.flg_estudo_elaborado_daee"
									ng-options="item.value as item.label for item in empresasEstudos">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.flg_estudo_elaborado_daee = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-left">
			<div class="box-inline">
				<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" ng-show="(objectModel.cod_empreendimento)" data-toggle="modal" data-target='#modalExcluir'>Excluir cadastro</button>
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