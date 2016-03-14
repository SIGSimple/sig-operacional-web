<div class="panel" ng-controller="CadastroContratoController">
	<!--Panel heading-->
	<div class="panel-heading">
		<div class="panel-control">
			<ul class="nav nav-tabs">
				<li><a href="#tab-info-gerais" data-toggle="tab">Informações Gerais</a></li>
				<li class="active"><a href="#tab-itens" data-toggle="tab">Itens do Contrato</a></li>
				<li><a href="#tab-cronogramas" data-toggle="tab">Cronogramas</a></li>
				<li><a href="#tab-medicoes" data-toggle="tab">Medições</a></li>
			</ul>
		</div>
		<h3 class="panel-title">&nbsp;</h3>
	</div>

	<div class="panel-body">
		<div class="tab-content">
			<div class="tab-pane fade" id="tab-info-gerais">
				<form class="form form-horizontal" role="form">
					<div class="form-group element-group">
						<label class="col-lg-3 control-label" for="cod_empreendimento">Empreendimento/Localidade</label>
						<div class="col-lg-6">
							<div class="input-group">
								<input type="text" id="cod_empreendimento" name="cod_empreendimento" class="form-control" readonly="readonly" value="{{ objectModel.empreendimento.label }}" ng-click="abreModal('EMPREENDIMENTOS', 'empreendimento', 2)">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" ng-click="abreModal('EMPREENDIMENTOS', 'empreendimento', 2)">
										<i class="fa fa-search"></i>
									</button>
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.empreendimento = {}">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Município</label>
							<div class="col-lg-4">
								<input type="text" value="{{ objectModel.empreendimento.data.nme_municipio }}" class="form-control" readonly="readonly">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="num_autos">Nº Autos do Processo</label>
							<div class="col-lg-2">
								<input type="text" id="num_autos" name="num_autos" ng-model="objectModel.num_autos" class="form-control">
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="num_contrato">Nº do Contrato</label>
							<div class="col-lg-2">
								<input type="text" id="num_contrato" name="num_contrato" ng-model="objectModel.num_contrato" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<label class="col-lg-3 control-label" for="cod_empresa_contratada">Empresa Contratada</label>
						<div class="col-lg-6">
							<div class="input-group">
								<input type="text" id="cod_empresa_contratada" name="cod_empresa_contratada" class="form-control" readonly="readonly" value="{{ objectModel.empresa_contratada.label }}" ng-click="abreModal('EMPRESAS', 'empresa_contratada')">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" ng-click="abreModal('EMPRESAS', 'empresa_contratada')">
										<i class="fa fa-search"></i>
									</button>
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.empresa_contratada = {}">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="cod_engenheiro_empresa_contratada">Engenheiro Responsável</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" id="cod_engenheiro_empresa_contratada" name="cod_engenheiro_empresa_contratada" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_empresa_contratada.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_empresa_contratada')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_empresa_contratada')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_empresa_contratada = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
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
							<label class="col-lg-3 control-label" for="dta_pedido_empenho">Pedido de Empenho</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_pedido_empenho" name="dta_pedido_empenho" class="form-control text-center" ng-model="objectModel.dta_pedido_empenho">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_os">Ordem de Serviço</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_os" name="dta_os" class="form-control text-center" ng-model="objectModel.dta_os">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="prz_original_contrato_meses">Prazo Original (em Meses)</label>
							<div class="col-lg-1">
								<input type="text" id="prz_original_contrato_meses" name="prz_original_contrato_meses" ng-model="objectModel.prz_original_contrato_meses" class="form-control">
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="vlr_original_contrato">Valor Original</label>
							<div class="col-lg-3">
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" id="vlr_original_contrato" name="vlr_original_contrato" class="form-control text-right" ng-model="objectModel.vlr_original_contrato" ui-number-mask>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="prz_aditivos_contrato_meses">Aditivo de Prazo (em Meses)</label>
							<div class="col-lg-1">
								<input type="text" id="prz_aditivos_contrato_meses" name="prz_aditivos_contrato_meses" ng-model="prz_aditivos_contrato_meses" class="form-control">
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="vlr_aditivos_contrato">Aditivo de Valor</label>
							<div class="col-lg-3">
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" id="vlr_aditivos_contrato" name="vlr_aditivos_contrato" class="form-control text-right" ng-model="objectModel.vlr_aditivos_contrato" ui-number-mask>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="prz_original_execucao_meses">Prazo de Execução (em Meses)</label>
							<div class="col-lg-1">
								<input type="text" id="prz_original_execucao_meses" name="prz_original_execucao_meses" ng-model="objectModel.prz_original_execucao_meses" class="form-control">
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_vigencia">Vigente Até</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_vigencia" name="dta_vigencia" class="form-control text-center" ng-model="objectModel.dta_vigencia">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="dta_base">Data Base</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_base" name="dta_base" class="form-control text-center" ng-model="objectModel.dta_base">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_inauguracao">Data de Inauguração</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_inauguracao" name="dta_inauguracao" class="form-control text-center" ng-model="objectModel.dta_inauguracao">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="dta_termo_recebimento_provisorio">Recebimento Termo Provisório</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_termo_recebimento_provisorio" name="dta_termo_recebimento_provisorio" class="form-control text-center" ng-model="objectModel.dta_termo_recebimento_provisorio">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_termo_recebimento_definitivo">Rec. Termo Definitivo</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_termo_recebimento_definitivo" name="dta_termo_recebimento_definitivo" class="form-control text-center" ng-model="objectModel.dta_termo_recebimento_definitivo">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="dta_encerramento_contrato">Data Encerramento Contrato</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_encerramento_contrato" name="dta_encerramento_contrato" class="form-control text-center" ng-model="objectModel.dta_encerramento_contrato">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_recisao_contratual">Recisão Contratual</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_recisao_contratual" name="dta_recisao_contratual" class="form-control text-center" ng-model="objectModel.dta_recisao_contratual">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="qtd_populacao_urbana_2010">População Urbana (IBGE 2010)</label>
							<div class="col-lg-2">
								<input type="text" id="qtd_populacao_urbana_2010" name="qtd_populacao_urbana_2010" class="form-control" ng-model="objectModel.qtd_populacao_urbana_2010" ui-number-mask="0">
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="qtd_populacao_urbana_2030">Proj. População (2030)</label>
							<div class="col-lg-2">
								<input type="text" id="qtd_populacao_urbana_2030" name="qtd_populacao_urbana_2030" class="form-control" ng-model="objectModel.qtd_populacao_urbana_2030" ui-number-mask="0">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="vlr_investimento_governo">Total Investido pelo Governo SP</label>
							<div class="col-lg-3">
								<div class="input-group">
									<span class="input-group-addon">R$</span>
									<input type="text" id="vlr_investimento_governo" name="vlr_investimento_governo" class="form-control text-right" ng-model="objectModel.vlr_investimento_governo" ui-number-mask>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-1 control-label" for="num_percentual_executado">Executado</label>
							<div class="col-lg-2">
								<div class="input-group">
									<input type="text" id="num_percentual_executado" name="num_percentual_executado" class="form-control text-right" ng-model="objectModel.num_percentual_executado" ui-number-mask>
									<span class="input-group-addon">%</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="dta_inicio_obras">Inicio das Obras</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_inicio_obras" name="dta_inicio_obras" class="form-control text-center" ng-model="objectModel.dta_inicio_obras">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_previsao_termino">Previsão de Término</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_previsao_termino" name="dta_previsao_termino" class="form-control text-center" ng-model="objectModel.dta_previsao_termino">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="dta_previsao_inauguracao">Previsão de Inauguração</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_previsao_inauguracao" name="dta_previsao_inauguracao" class="form-control text-center" ng-model="objectModel.dta_previsao_inauguracao">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-2 control-label" for="dta_conclusao_inauguracao">Concluída/Inaugurada</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_conclusao_inauguracao" name="dta_conclusao_inauguracao" class="form-control text-center" ng-model="objectModel.dta_conclusao_inauguracao">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Engenheiro de Obras (Consórcio)</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_engenheiro_obras_consorcio" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_obras_consorcio.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_obras_consorcio')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_obras_consorcio')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_obras_consorcio = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Engenheiro Responsável (DAEE)</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_engenheiro_daee" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_daee.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_daee')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_daee')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_daee = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Engenheiro Planej. Obras (Consórcio)</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_engenheiro_planejamento_obras_consorcio" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_planejamento_obras_consorcio.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_planejamento_obras_consorcio')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_planejamento_obras_consorcio')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_planejamento_obras_consorcio = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Fiscal (Consórcio)</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_fiscal_consorcio" class="form-control" readonly="readonly" value="{{ objectModel.fiscal_consorcio.label }}" ng-click="abreModal('INTERESSADOS', 'fiscal_consorcio')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'fiscal_consorcio')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.fiscal_consorcio = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Engenheiro Responsável Medições</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_engenheiro_responsavel_medicao" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_responsavel_medicao.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_responsavel_medicao')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_responsavel_medicao')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_responsavel_medicao = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<div class="element-group">
							<label class="col-lg-3 control-label">Engenheiro de Obras (Construtora)</label>
							<div class="col-lg-6">
								<div class="input-group">
									<input type="text" name="cod_engenheiro_obras_construtora" class="form-control" readonly="readonly" value="{{ objectModel.engenheiro_obras_construtora.label }}" ng-click="abreModal('INTERESSADOS', 'engenheiro_obras_construtora')">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button" ng-click="abreModal('INTERESSADOS', 'engenheiro_obras_construtora')">
											<i class="fa fa-search"></i>
										</button>
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.engenheiro_obras_construtora = {}">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<label class="col-lg-3 control-label" for="cod_situacao_obra">Situação da Obra</label>
						<div class="col-lg-5">
							<div class="input-group">
								<select id="cod_situacao_obra" name="cod_situacao_obra"
									chosen class="chosen" options="situacoesContrato"
									ng-model="objectModel.cod_situacao_obra"
									ng-options="item.cod_situacao as item.desc_situacao for item in situacoesContrato">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_obra = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group element-group">
						<label class="col-lg-3 control-label" for="cod_situacao_contrato">Situação do Contrato</label>
						<div class="col-lg-5">
							<div class="input-group">
								<select id="cod_situacao_contrato" name="cod_situacao_contrato"
									chosen class="chosen" options="situacoesContrato"
									ng-model="objectModel.cod_situacao_contrato"
									ng-options="item.cod_situacao as item.desc_situacao for item in situacoesContrato">
								</select>
								<span class="input-group-btn">
									<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_contrato = ''">
										<i class="fa fa-times"></i>
									</button>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="dsc_observacoes_relatorio_mensal">Observações (Relatório Mensal)</label>
						<div class="col-lg-6">
							<textarea id="dsc_observacoes_relatorio_mensal" name="dsc_observacoes_relatorio_mensal" ng-model="objectModel.dsc_observacoes_relatorio_mensal" class="form-control" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="dsc_observacoes_bacia">Observações (Bacia)</label>
						<div class="col-lg-6">
							<textarea id="dsc_observacoes_bacia" name="dsc_observacoes_bacia" ng-model="dsc_observacoes_bacia" class="form-control" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="dsc_observacoes_gerais">Observações (Gerais)</label>
						<div class="col-lg-6">
							<textarea id="dsc_observacoes_gerais" name="dsc_observacoes_gerais" ng-model="objectModel.dsc_observacoes_gerais" class="form-control" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label" for="dsc_observacoes_apoio_gerencial">Observações (p/ Apoio Gerencial)</label>
						<div class="col-lg-6">
							<textarea id="dsc_observacoes_apoio_gerencial" name="dsc_observacoes_apoio_gerencial" ng-model="objectModel.dsc_observacoes_apoio_gerencial" class="form-control" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="element-group">
							<label class="col-lg-3 control-label" for="cod_parceiro">Parceria/Realização</label>
							<div class="col-lg-3">
								<div class="input-group">
									<select id="cod_parceiro" name="cod_parceiro"
										chosen class="chosen" options="parceiros"
										ng-model="objectModel.cod_parceiro"
										ng-options="item.id as item.nme_parceiro for item in parceiros">
									</select>
									<span class="input-group-btn">
										<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_parceiro = ''">
											<i class="fa fa-times"></i>
										</button>
									</span>
								</div>
							</div>
						</div>

						<div class="element-group">
							<label class="col-lg-1 control-label" for="dsc_parceria_realizacao">Outros</label>
							<div class="col-lg-2">
								<input type="text" id="dsc_parceria_realizacao" name="dsc_parceria_realizacao" ng-model="objectModel.dsc_parceria_realizacao" class="form-control">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="tab-pane fade in active" id="tab-itens">
				<form class="form form-horizontal">
					<div class="form-group">
						<div class="col-lg-12">
							<button type="button" class="btn btn-success btn-labeled fa fa-save" ng-click="abreModalCrongorama()">Cadastrar Novo</button>
						</div>
					</div>
				</form>
			
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<th class="text-center text-middle" width="60">Ações</th>
						<th class="text-center text-middle">#</th>
						<th class="text-middle">Descrição</th>
						<th class="text-center text-middle" width="100">Item de Reajuste</th>
						<th class="text-right text-middle" width="120">Valor Previsto Acumulado</th>
						<th class="text-right text-middle" width="120">Valor Medido Acumulado</th>
					</thead>
					<tbody>
						<tr ng-repeat="item in objectModel.itens">
							<td class="text-center text-middle">
								<button class="btn btn-xs btn-warning" tooltip="Editar Item">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-xs btn-danger" tooltip="Excluir Item">
									<i class="fa fa-trash-o"></i>
								</button>
							</td>
							<td class="text-center text-middle">{{ item.id }}</td>
							<td class="text-middle">{{ item.dsc_item }}</td>
							<td class="text-center text-middle">
								<span class="label label-success" ng-show="(item.flg_reajuste === 1)">SIM</span>
								<span class="label label-danger" ng-show="(item.flg_reajuste === 0)">NÃO</span>
							</td>
							<td class="text-right text-middle">{{ item.vlr_previsto_acumulado | currency : 'R$ ' : 2 }}</td>
							<td class="text-right text-middle">{{ item.vlr_medido_acumulado | currency : 'R$ ' : 2 }}</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td class="active text-middle text-bold">TOTAIS</td>
							<td class="active text-right text-middle text-bold" colspan="4">{{ objectModel.vlrTotalPrevisto | currency : 'R$ ' : 2 }}</td>
							<td class="active text-right text-middle text-bold">{{ objectModel.vlrTotalMedido | currency : 'R$ ' : 2 }}</td>
						</tr>
					</tfoot>
				</table>
			</div>
			
			<div class="tab-pane fade" id="tab-cronogramas">
				<form class="form form-horizontal">
					<div class="form-group">
						<div class="col-lg-12">
							<button type="button" class="btn btn-success btn-labeled fa fa-save" ng-click="abreModalCrongorama()">Cadastrar Novo</button>
						</div>
					</div>
				</form>

				<table class="table table-condensed table-striped table-hover">
					<thead>
						<th class="text-center text-middle" width="80">Ações</th>
						<th class="text-center text-middle">Nº Revisão</th>
						<th class="text-center text-middle">Dta. Vigor</th>
						<th class="text-center text-middle">Vigência</th>
						<th class="text-center text-middle">Prazo Total</th>
						<th class="text-right text-middle">Valor Planejado</th>
						<th class="text-center text-middle">Tipo Cronograma</th>
					</thead>
					<tbody>
						<tr>
							<td class="text-center text-middle">
								<button class="btn btn-xs btn-warning" tooltip="Editar Cronograma">
									<i class="fa fa-edit"></i>
								</button>
								<button class="btn btn-xs btn-danger" tooltip="Excluir Cronograma">
									<i class="fa fa-trash-o"></i>
								</button>
							</td>
							<td class="text-center text-middle">0</td>
							<td class="text-center text-middle">29/01/2016</td>
							<td class="text-center text-middle">05/2014 a 06/2015</td>
							<td class="text-center text-middle">12 Meses</td>
							<td class="text-right text-middle">R$ 99.999.999,99</td>
							<td class="text-center text-middle">Cronograma Inicial</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="tab-pane fade" id="tab-medicoes">
				medições
			</div>
		</div>
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

	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cadastro de Cronograma</h4>
				</div>
				<div class="modal-body" style="overflow-x: hidden;">
					<form class="form form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-1 control-label" for="dta_inicio_periodo">Período</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_inicio_periodo" name="dta_inicio_periodo" class="form-control text-center" 
										ng-model="objectModalCronograma.dta_inicio_periodo" ng-blur="refreshCronogramaGrid()" ng-change="refreshCronogramaGrid()">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>

							<label class="col-lg-1 control-label" for="dta_fim_periodo">Até</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_fim_periodo" name="dta_fim_periodo" class="form-control text-center" 
										ng-model="objectModalCronograma.dta_fim_periodo" ng-blur="refreshCronogramaGrid()" ng-change="refreshCronogramaGrid()">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>

							<label class="col-lg-2 control-label" for="dta_vigor">Entra em Vigor em</label>
							<div class="col-lg-2">
								<div class="input-group date">
									<input type="text" id="dta_vigor" name="dta_vigor" class="form-control text-center" ng-model="objectModalCronograma.dta_vigor">
									<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
								</div>
							</div>

							<label class="col-lg-1 control-label" for="num_revisao">Nº Rev</label>
							<div class="col-lg-1">
								<input type="text" id="num_revisao" name="num_revisao" readonly="readonly" class="form-control text-center" ng-model="objectModalCronograma.num_revisao">
							</div>
						</div>
					</form>

					<div class="row">
						<div class="col-lg-4" style="padding-right: 0;">
							<table class="table table-condensed table-striped table-hover">
								<thead>
									<th class="text-center text-middle" style="min-width: 200px;" 
										ng-show="(objectModalCronograma.mesesCronograma)">
										Item \ Mês
									</th>
								</thead>
								<tbody>
									<tr ng-repeat="(index, item) in objectModalCronograma.itensCronograma">
										<td class="text-middle">
											<input class="form-control input-sm" readonly="readonly" value="{{ index }}"/>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr ng-show="(objectModalCronograma.mesesCronograma)">
										<td class="text-middle text-bold warning">
											<input class="form-control input-sm" readonly="readonly" value="SUBTOTAIS"/>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="col-lg-8" style="overflow-x: scroll; padding-left: 0;">
							<table class="table table-condensed table-striped table-hover">
								<thead>
									<th class="text-center text-middle" style="min-width: 120px;" 
										ng-repeat="(index, item) in objectModalCronograma.mesesCronograma">
										{{ index | date : 'MMMM/yyyy' | uppercase }}
									</th>
									<th class="text-center text-middle warning" style="min-width: 120px;">Subtotais</th>
								</thead>
								<tbody>
									<tr ng-repeat="(index, data) in objectModalCronograma.itensCronograma">
										<td class="text-middle" ng-repeat="item in data.meses">
											<input class="form-control input-sm text-right" ng-model="item.vlr_planejamento" ng-blur="atualizaSubtotais()" ui-number-mask/>
										</td>
										<td class="text-middle text-bold warning" ng-show="(objectModalCronograma.mesesCronograma)">
											<input class="form-control input-sm text-right" readonly="readonly" ng-model="data.subtotal" ui-number-mask/>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td class="text-middle text-bold warning" ng-repeat="subtotal in objectModalCronograma.subtotaisMeses track by $index">
											<input class="form-control input-sm text-right" readonly="readonly" ng-model="subtotal" ui-number-mask/>
										</td>
										<td class="text-middle text-bold warning" ng-show="(objectModalCronograma.mesesCronograma)">
											<input class="form-control input-sm text-right" readonly="readonly" style="background-color: #ccc;" 
												ng-model="objectModalCronograma.totalGeral" ui-number-mask/>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer clearfix">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary btn-labeled fa fa-save">Salvar</button>
					</div>
				</div>
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