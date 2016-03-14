<div class="panel" ng-controller="ListContratoCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-contrato" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/contratos.json"
			data-search="true"
			data-toolbar="#toolbar"
			data-show-refresh="true"
			data-show-toggle="true"
			data-show-columns="true"
			data-page-list="[5, 10, 20]"
			data-page-size="5"
			data-pagination="true"
			data-side-pagination="server"
			data-show-pagination-switch="true">
			<thead>
				<tr>
					<th data-visible="true" data-align="center" data-formatter="editFormater" data-width="20">Ações</th>
					<th data-visible="true" data-sortable="true" data-field="nme_municipio">Cidade</th>
					<th data-visible="true" data-sortable="true" data-field="nme_empreendimento">Localidade</th>
					<th data-visible="false" data-sortable="true" data-field="nme_empresa_contratada">Empresa Contratada</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_empresa_contratada">Engenheiro Responsável</th>
					<th data-visible="true" data-sortable="true" data-field="num_autos" data-align="center">Nº Autos do Processo</th>
					<th data-visible="true" data-sortable="true" data-field="num_contrato" data-align="center">Nº do Contrato</th>
					<th data-visible="false" data-sortable="true" data-field="dta_assinatura" data-formatter="dateFormatter" data-align="center">Dt. Assinatura</th>
					<th data-visible="false" data-sortable="true" data-field="dta_publicacao_doe" data-formatter="dateFormatter" data-align="center">Dt. Publicação DOE</th>
					<th data-visible="false" data-sortable="true" data-field="dta_pedido_empenho" data-formatter="dateFormatter" data-align="center">Dt. Pedido Empenho</th>
					<th data-visible="false" data-sortable="true" data-field="dta_os" data-formatter="dateFormatter" data-align="center">Dt. Ordem de Serviço</th>
					<th data-visible="false" data-sortable="true" data-field="prz_original_contrato_meses" data-formatter="monthFormatter" data-align="center">Prazo Original (Contrato)</th>
					<th data-visible="false" data-sortable="true" data-field="prz_aditivos_contrato_meses" data-formatter="monthFormatter" data-align="center">Aditivo de Prazo (Meses)</th>
					<th data-visible="false" data-sortable="true" data-field="prz_original_execucao_meses" data-formatter="monthFormatter" data-align="center">Prazo Original (Execucão)</th>
					<th data-visible="false" data-sortable="true" data-field="dta_vigencia" data-formatter="dateFormatter" data-align="center">Dt. Agência</th>
					<th data-visible="false" data-sortable="true" data-field="dta_base" data-formatter="dateFormatter" data-align="center">Dt. Base</th>
					<th data-visible="false" data-sortable="true" data-field="dta_inauguracao" data-formatter="dateFormatter" data-align="center">Dt. Inauguração</th>
					<th data-visible="false" data-sortable="true" data-field="dta_termo_recebimento_provisorio" data-formatter="dateFormatter" data-align="center">Dt. Receb. Termo Provisório</th>
					<th data-visible="false" data-sortable="true" data-field="dta_termo_recebimento_definitivo" data-formatter="dateFormatter" data-align="center">Dt. Receb. Termo Definitivo</th>
					<th data-visible="false" data-sortable="true" data-field="dta_encerramento_contrato" data-formatter="dateFormatter" data-align="center">Dt. Encerramento Contrato</th>
					<th data-visible="false" data-sortable="true" data-field="dta_recisao_contratual" data-formatter="dateFormatter" data-align="center">Dt. Recisão Contratual</th>
					<th data-visible="false" data-sortable="true" data-field="vlr_original_contrato" data-formatter="currencyFormatter" data-align="right">Valor Original</th>
					<th data-visible="false" data-sortable="true" data-field="vlr_aditivos_contrato" data-formatter="currencyFormatter" data-align="right">Aditivo de Valor</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_populacao_urbana_2010">Pop. Urbana (2010)</th>
					<th data-visible="false" data-sortable="true" data-field="vlr_investimento_governo" data-formatter="currencyFormatter" data-align="right">Valor Inv. Gov. SP</th>
					<th data-visible="false" data-sortable="true" data-field="dta_inicio_obras" data-formatter="dateFormatter" data-align="center">Dt. Inicio das Obras</th>
					<th data-visible="true" data-sortable="true" data-field="num_percentual_executado" data-formatter="percentFormatter" data-align="center">% Executado</th>
					<th data-visible="false" data-sortable="true" data-field="dta_previsao_termino" data-formatter="dateFormatter" data-align="center">Dt. Previsão Término</th>
					<th data-visible="false" data-sortable="true" data-field="dta_conclusao_inauguracao" data-formatter="dateFormatter" data-align="center">Dt. Concluída/Inaugurada em</th>
					<th data-visible="false" data-sortable="true" data-field="dta_previsao_inauguracao" data-formatter="dateFormatter" data-align="center">Dt. Previsão Inauguracao</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_obras_consorcio">Engenheiro de Obras (Consórcio)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_daee">Engenheiro Responsável (DAEE)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_planejamento_obras_consorcio">Engenheiro Planej. Obras (Consórcio)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_fiscal_consorcio">Fiscal (Consórcio)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_responsavel_medicao">Engenheiro Responsável Medições</th>
					<th data-visible="false" data-sortable="true" data-field="nme_engenheiro_obras_construtora">Engenheiro de Obras (Construtora)</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_situacao_obra">Situação da Obra</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_sitaucao_contrato">Situação do Contrato</th>
				</tr>
			</thead>
		</table>
	</div>
</div>