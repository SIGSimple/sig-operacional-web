<div class="panel" ng-controller="ListEmpreendimentoCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-empreendimento" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/empreendimentos.json"
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
					<th data-visible="true" data-sortable="true" data-field="nome_empreendimento" data-width="200">Localidade</th>
					<th data-visible="true" data-sortable="true" data-field="PI">Nº Autos</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_objeto_obra">Objeto da Obra</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_tipo_empreendimento">Tipo de Empreendimento</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_programa" data-width="100">Programa</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_resultado_obtido">Benefício da Obra</th>
					<th data-visible="false" data-sortable="true" data-field="cep">CEP</th>
					<th data-visible="false" data-sortable="true" data-field="endereco">Endereço</th>
					<th data-visible="false" data-sortable="true" data-field="latitude_longitude">Localização Geográfica</th>
					<th data-visible="false" data-sortable="true" data-field="email">E-mail</th>
					<th data-visible="false" data-sortable="true" data-field="telefone" data-formatter="phoneNumberFormatter">Telefone</th>
					<th data-visible="true" data-sortable="true" data-field="nme_bacia_hidrografica">Bacia Hidrográfica</th>
					<th data-visible="true" data-sortable="true" data-field="nme_manancial_lancamento">Manancial de Lançamento</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_metragem_coletor_tronco">Coletor Tronco (m)</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_metragem_interceptor">Interceptor (m)</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_metragem_linha_recalque">Linha de Recalque (m)</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_metragem_emissario_fluente_bruto">Emissário de Efluente Bruto (m)</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_eee">Estação Elevatória de Esgoto (un)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_tipo_ete">Tipo de ETE</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_estacao_tratamento">Estação de Tratamento</th>
					<th data-visible="false" data-sortable="true" data-field="qtd_metragem_emissario_efluente_tratado">Emissário Efluente Tratado (m)</th>
					<th data-visible="false" data-sortable="true" data-field="num_vazao_sistema">Vazão do Sistema (I/s)</th>
					<th data-visible="false" data-sortable="true" data-field="flg_estudo_elaborado_daee">Realização do Estudo</th>
				</tr>
			</thead>
		</table>
	</div>
</div>