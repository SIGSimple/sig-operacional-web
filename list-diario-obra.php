<div class="panel" ng-controller="ListDiarioObraCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-lg-2 control-label text-left">Empreendimento:</label>
					<div class="col-lg-6">
						<select id="cod_empreendimento" name="cod_empreendimento"
							chosen class="chosen" options="empreendimentos"
							ng-model="objectModel.cod_empreendimento" ng-change="loadDiariosObra()"
							ng-options="item.cod_empreendimento as (item.nme_municipio + ' | ' + item.PI + ' | ' + item.nome_empreendimento) for item in empreendimentos">
						</select>
					</div>
					<div class="col-lg-2" ng-show="(objectModel.cod_empreendimento)">
						<button type="button" class="btn btn-success btn-labeled fa fa-plus-square" ng-click="addNovoDiarioObra()">Cadastrar novo</button>
					</div>
				</div>
			</div>
		</div>

		<table id="mytable"></table>
	</div>

	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><i class="fa fa-edit"></i> Edição de Diário de Obra ({{ objectModel.dta_registro }})</h4>
				</div>
				<div class="modal-body bg-trans-dark">
					<div class="tab-base">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab-registro"><i class="fa fa-file-text-o"></i> Registro de RDO</a></li>
							<li ng-show="(objectModel.cod_acompanhamento > 0)"><a data-toggle="tab" href="#tab-anexos"><i class="fa fa-paperclip"></i> Anexos <span class="badge">{{ objectModel.anexos.length }}</span></a></li>
							<li ng-show="(objectModel.cod_acompanhamento > 0)"><a data-toggle="tab" href="#tab-histograma"><i class="fa fa-male"></i> Histograma de Recursos <span class="badge">{{ objectModel.histogramas.length }}</span></a></li>
						</ul>
			
						<div class="tab-content">
							<div id="tab-registro" class="tab-pane fade active in">
								<form class="form-horizontal">
									<div class="form-group">
										<div class="col-lg-12">
											<div class="alert-area registro"></div>
										</div>
									</div>
								
									<div class="form-group bg-gray">
										<label class="col-lg-12 control-label">
											<h4 class="text-thin text-center">Informações Gerais</h4>
										</label>
									</div>

									<!-- Informações Gerais -->
									<div class="form-group element-group">
										<label class="col-lg-3 control-label" for="dta_registro">Referente a</label>
										<div class="col-lg-4">
											<div class="input-group date">
												<input type="text" id="dta_registro" name="dta_registro" class="form-control text-center" ng-model="objectModel.dta_registro">
												<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group element-group">
										<label class="col-lg-3 control-label" for="cod_fiscal">Responsável</label>
										<div class="col-lg-9">
											<input type="text" id="cod_fiscal" name="cod_fiscal" class="form-control typeahead">
										</div>
									</div>

									<div class="form-group element-group">
										<label class="col-lg-3 control-label" for="dsc_registro">Registro</label>
										<div class="col-lg-9">
											<textarea id="dsc_registro" name="dsc_registro" ng-model="objectModel.dsc_registro" class="form-control" rows="4"></textarea>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label">Vistoria realizada?</label>
											<div class="col-lg-1">
												<div class="checkbox">
													<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_vistoria_realizada == 1) ? 'active' : '' }}">
														<input type="checkbox" ng-model="objectModel.flg_vistoria_realizada">
													</label>
												</div>
											</div>
										</div>

										<div class="element-group" ng-show="(objectModel.flg_vistoria_realizada)">
											<label class="col-lg-1 control-label">Data</label>
											<div class="col-lg-4">
												<div class="input-group date">
													<input type="text" id="dta_vistoria" name="dta_vistoria" class="form-control text-center" ng-model="objectModel.dta_vistoria">
													<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-3 control-label">Relatório Mensal?</label>
										<div class="col-lg-1">
											<div class="checkbox">
												<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_relatorio_mensal == 1) ? 'active' : '' }}">
													<input type="checkbox" ng-model="objectModel.flg_relatorio_mensal">
												</label>
											</div>
										</div>
									</div>
									<!-- End - Informações Gerais -->

									<div class="form-group bg-gray">
										<label class="col-lg-12 control-label">
											<h4 class="text-thin text-center">Controle de Pendências</h4>
										</label>
									</div>

									<!-- Controle de Pendências -->
									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label">É uma pendência?</label>
											<div class="col-lg-1">
												<div class="checkbox">
													<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_pendencia == 1) ? 'active' : '' }}">
														<input type="checkbox" ng-model="objectModel.flg_pendencia">
													</label>
												</div>
											</div>
										</div>

										<div class="element-group" ng-show="(objectModel.flg_pendencia)">
											<label class="col-lg-3 control-label">Pendência Válida?</label>
											<div class="col-lg-1">
												<div class="checkbox">
													<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_pendencia_valida == 1) ? 'active' : '' }}">
														<input type="checkbox" ng-model="objectModel.flg_pendencia_valida">
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group element-group" ng-show="(objectModel.flg_pendencia)">
										<label class="col-lg-3 control-label" for="cod_tipo_pendencia">Tipo</label>
										<div class="col-lg-7">
											<div class="input-group">
												<select id="cod_tipo_pendencia" name="cod_tipo_pendencia"
													chosen class="chosen" options="tiposPendencia"
													ng-model="objectModel.cod_tipo_pendencia"
													ng-options="item.id as item.dsc_tipo_pendencia for item in tiposPendencia">
												</select>
												<span class="input-group-btn">
													<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_tipo_pendencia = ''">
														<i class="fa fa-times"></i>
													</button>
												</span>
											</div>
										</div>
									</div>

									<div class="form-group" ng-show="(objectModel.flg_pendencia)">
										<label class="col-lg-3 control-label" for="dsc_pendencia">Descrição</label>
										<div class="col-lg-9">
											<textarea id="dsc_pendencia" name="dsc_pendencia" ng-model="objectModel.dsc_pendencia" class="form-control" rows="4"></textarea>
										</div>
									</div>

									<div class="form-group" ng-show="(objectModel.flg_pendencia)">
										<label class="col-lg-3 control-label">Data Limíte</label>
										<div class="col-lg-4">
											<div class="input-group date">
												<input type="text" id="dta_limite_pendencia" name="dta_limite_pendencia" class="form-control text-center" ng-model="objectModel.dta_limite_pendencia">
												<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group" ng-show="(objectModel.flg_pendencia)">
										<div class="element-group">
											<label class="col-lg-3 control-label">Pendência Concluída?</label>
											<div class="col-lg-1">
												<div class="checkbox">
													<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_pendencia_concluida == 1) ? 'active' : '' }}">
														<input type="checkbox" ng-model="objectModel.flg_pendencia_concluida">
													</label>
												</div>
											</div>
										</div>

										<div class="element-group" ng-show="(objectModel.flg_pendencia_concluida)">
											<label class="col-lg-3 control-label">Data Resolução</label>
											<div class="col-lg-4">
												<div class="input-group date">
													<input type="text" id="dta_resolucao_pendencia" name="dta_resolucao_pendencia" class="form-control text-center" ng-model="objectModel.dta_resolucao_pendencia">
													<span class="input-group-addon"><i class="fa fa-calendar fa-lg"></i></span>
												</div>
											</div>
										</div>
									</div>

									<div class="form-group" ng-show="(objectModel.flg_pendencia_concluida)">
										<label class="col-lg-3 control-label" for="dsc_acao_resolucao_pendencia">Ação Resolução</label>
										<div class="col-lg-9">
											<textarea id="dsc_acao_resolucao_pendencia" name="dsc_acao_resolucao_pendencia" ng-model="objectModel.dsc_acao_resolucao_pendencia" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<!-- End - Controle de Pendências -->

									<div class="form-group bg-gray">
										<label class="col-lg-12 control-label">
											<h4 class="text-thin text-center">Saúde e Segurança do Trabalho</h4>
										</label>
									</div>

									<!-- Saúde e Segurança do Trabalho -->
									<div class="form-group element-group">
										<label class="col-lg-3 control-label" for="cod_situacao_sso">Tipo</label>
										<div class="col-lg-7">
											<div class="input-group">
												<select id="cod_situacao_sso" name="cod_situacao_sso"
													chosen class="chosen" options="situacoesSSO"
													ng-model="objectModel.cod_situacao_sso"
													ng-options="item.id as item.dsc_situacao_sso for item in situacoesSSO">
												</select>
												<span class="input-group-btn">
													<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_sso = ''">
														<i class="fa fa-times"></i>
													</button>
												</span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-lg-3 control-label" for="dsc_nota_sso">Nota</label>
										<div class="col-lg-9">
											<textarea id="dsc_nota_sso" name="dsc_nota_sso" ng-model="objectModel.dsc_nota_sso" class="form-control" rows="4"></textarea>
										</div>
									</div>
									<!-- End - Saúde e Segurança do Trabalho -->

									<div class="form-group bg-gray">
										<label class="col-lg-12 control-label">
											<h4 class="text-thin text-center">Condições da Obra</h4>
										</label>
									</div>

									<!-- Condições da Obra -->
									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label" for="cod_situacao_clima_manha">Clima Manhã</label>
											<div class="col-lg-4">
												<div class="input-group">
													<select id="cod_situacao_clima_manha" name="cod_situacao_clima_manha"
														chosen class="chosen" options="situacoesClima"
														ng-model="objectModel.cod_situacao_clima_manha"
														ng-options="item.id as item.dsc_situacao_clima for item in situacoesClima">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_clima_manha = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>

											<div class="col-lg-5">
												<input type="text" id="dsc_nota_clima_manha" name="dsc_nota_clima_manha" class="form-control" ng-model="objectModel.dsc_nota_clima_manha" placeholder="Notas">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label" for="cod_situacao_clima_tarde">Clima Tarde</label>
											<div class="col-lg-4">
												<div class="input-group">
													<select id="cod_situacao_clima_tarde" name="cod_situacao_clima_tarde"
														chosen class="chosen" options="situacoesClima"
														ng-model="objectModel.cod_situacao_clima_tarde"
														ng-options="item.id as item.dsc_situacao_clima for item in situacoesClima">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_clima_tarde = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>

											<div class="col-lg-5">
												<input type="text" id="dsc_nota_clima_tarde" name="dsc_nota_clima_tarde" class="form-control" ng-model="objectModel.dsc_nota_clima_tarde" placeholder="Notas">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label" for="cod_situacao_clima_noite">Clima Noite</label>
											<div class="col-lg-4">
												<div class="input-group">
													<select id="cod_situacao_clima_noite" name="cod_situacao_clima_noite"
														chosen class="chosen" options="situacoesClima"
														ng-model="objectModel.cod_situacao_clima_noite"
														ng-options="item.id as item.dsc_situacao_clima for item in situacoesClima">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_clima_noite = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>

											<div class="col-lg-5">
												<input type="text" id="dsc_nota_clima_noite" name="dsc_nota_clima_noite" class="form-control" ng-model="objectModel.dsc_nota_clima_noite" placeholder="Notas">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label" for="cod_situacao_limpeza_obra">Limpeza</label>
											<div class="col-lg-4">
												<div class="input-group">
													<select id="cod_situacao_limpeza_obra" name="cod_situacao_limpeza_obra"
														chosen class="chosen" options="situacoesObra"
														ng-model="objectModel.cod_situacao_limpeza_obra"
														ng-options="item.id as item.dsc_situacao_obra for item in situacoesObra">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_limpeza_obra = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>

											<div class="col-lg-5">
												<input type="text" id="dsc_nota_limpeza_obra" name="dsc_nota_limpeza_obra" class="form-control" ng-model="objectModel.dsc_nota_limpeza_obra" placeholder="Notas">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-3 control-label" for="cod_situacao_organizacao_obra">Organização</label>
											<div class="col-lg-4">
												<div class="input-group">
													<select id="cod_situacao_organizacao_obra" name="cod_situacao_organizacao_obra"
														chosen class="chosen" options="situacoesObra"
														ng-model="objectModel.cod_situacao_organizacao_obra"
														ng-options="item.id as item.dsc_situacao_obra for item in situacoesObra">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="objectModel.cod_situacao_organizacao_obra = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>

											<div class="col-lg-5">
												<input type="text" id="dsc_nota_organizacao_obra" name="dsc_nota_organizacao_obra" class="form-control" ng-model="objectModel.dsc_nota_organizacao_obra" placeholder="Notas">
											</div>
										</div>
									</div>
									<!-- End - Condições da Obra -->

									<div class="form-group">
										<div class="col-lg-12 clearfix">
											<button type="button" class="btn btn-primary btn-labeled fa fa-save pull-right" ng-click="saveRegistro()">Salvar</button>
										</div>
									</div>
								</form>
							</div>
							
							<div id="tab-anexos" class="tab-pane fade">
								<form class="form-horizontal">
									<div class="form-group">
										<div class="col-lg-12">
											<div class="alert-area anexo"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-2 control-label">Arquivo</label>
											<div class="col-lg-6">
												<input type="text" id="nme_arquivo" name="nme_arquivo" class="form-control" readonly="readonly" 
													placeholder="Nome do arquivo" value="{{ anexoModel.nme_arquivo }}"/>
											</div>
										</div>

										<div class="element-group">
											<div class="col-lg-4"
												flow-init="{target:'file-upload.php'}" 
												flow-files-submitted="$flow.upload()"
												flow-file-success="fileUploaded($message)">
												<span class="btn btn-default btn-file btn-labeled fa fa-folder-open" ng-show="(!anexoModel)">
													Selecionar<input type="file" flow-btn>
												</span>
												<button type="button" class="btn btn-danger btn-labeled fa fa-trash-o" 
													ng-hide="(!anexoModel)" ng-click="clearAttachment()">
												</button>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-2 control-label">Legenda</label>
											<div class="col-lg-6">
												<input type="text" class="form-control" ng-model="anexoModel.dsc_observacoes"/>
											</div>
										</div>

										<div class="element-group">
											<div class="col-lg-4 clearfix">
												<button class="btn btn-md btn-mint btn-labeled fa fa-upload" ng-click="saveAnexo()">Enviar anexo</button>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-12">
											<table class="table table-condensed table-striped table-hover">
												<thead>
													<th class="text-center text-middle" width="60">Ações</th>
													<th class="text-middle">Nome do arquivo</th>
													<th class="text-middle">Legenda</th>
												</thead>
												<tbody>
													<tr ng-repeat="anexo in objectModel.anexos">
														<td class="text-center text-middle">
															<a href="file-download.php?file-type={{ anexo.dsc_tipo_arquivo }}&file-name={{ anexo.nme_arquivo }}&file-path={{ anexo.pth_arquivo }}"
																class="btn btn-xs btn-default"
																tooltip="Fazer Download do Anexo" tooltip-placement="right">
																<i class="fa fa-download"></i>
															</a>
															<button class="btn btn-xs btn-danger" ng-click="deleteAnexo(anexo)"
																tooltip="Excluir Anexo" tooltip-placement="right">
																<i class="fa fa-trash-o"></i>
															</button>
														</td>
														<td class="text-middle">{{ anexo.nme_arquivo }}</td>
														<td class="text-middle">{{ anexo.dsc_observacoes }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>

							<div id="tab-histograma" class="tab-pane fade">
								<form class="form-horizontal">
									<div class="form-group">
										<div class="col-lg-12">
											<div class="alert-area histograma"></div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-2 control-label">Recurso</label>
											<div class="col-lg-7">
												<div class="input-group">
													<select id="cod_recurso" name="cod_recurso"
														chosen class="chosen" options="recursos"
														ng-model="histogramaModel.cod_recurso"
														ng-options="item.id as (item.nme_tipo_recurso +' - '+ item.nme_recurso) for item in recursos">
													</select>
													<span class="input-group-btn">
														<button type="button" class="btn btn-default" tooltip="Limpar seleção" ng-click="histogramaModel.cod_recurso = ''">
															<i class="fa fa-times"></i>
														</button>
													</span>
												</div>
											</div>
										</div>

										<div class="element-group">
											<label class="col-lg-1 control-label" for="qtd_recurso">Qtd.</label>
											<div class="col-lg-2">
												<input type="text" id="qtd_recurso" name="qtd_recurso" class="form-control" ng-model="histogramaModel.qtd_recurso"/>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="element-group">
											<label class="col-lg-2 control-label" for="dsc_observacoes">Observações</label>
											<div class="col-lg-6">
												<input type="text" id="dsc_observacoes" name="dsc_observacoes" class="form-control" ng-model="histogramaModel.dsc_observacoes"/>
											</div>
										</div>

										<div class="element-group">
											<div class="col-lg-4 clearfix">
												<button class="btn btn-md btn-mint btn-labeled fa fa-plus-circle pull-right" ng-click="saveHistograma()">Adicionar Recurso</button>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-12">
											<table class="table table-condensed table-striped table-hover">
												<thead>
													<th class="text-center text-middle" width="60">Ações</th>
													<th class="text-middle">Nome do Recurso</th>
													<th class="text-middle">Tipo de Recurso</th>
													<th class="text-center text-middle">Quantidade</th>
													<th class="text-center">Observações</th>
												</thead>
												<tbody>
													<tr ng-repeat="histograma in objectModel.histogramas">
														<td class="text-center text-middle">
															<button class="btn btn-xs btn-danger" ng-click="deleteHistograma(histograma)"
																tooltip="Excluir Recurso" tooltip-placement="right">
																<i class="fa fa-trash-o"></i>
															</button>
														</td>
														<td class="text-middle">{{ histograma.nme_recurso }}</td>
														<td class="text-center text-middle">{{ histograma.nme_tipo_recurso }}</td>
														<td class="text-center text-middle">{{ histograma.qtd_recurso }}</td>
														<td class="text-middle">{{ histograma.dsc_observacoes }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer clearfix">
					<button type="button" class="btn btn-md btn-default pull-right" data-dismiss="modal">Fechar janela</button>
				</div>
			</div>
		</div>
	</div>
</div>