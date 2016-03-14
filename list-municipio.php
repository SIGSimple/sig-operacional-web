<div class="panel" ng-controller="ListMunicipioCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-municipio" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/municipios.json"
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
					<th data-visible="true" data-sortable="true" data-field="nme_bacia_daee">Divisão de Bacia (DAEE)</th>
					<th data-visible="true" data-sortable="true" data-field="nme_bacia_secretaria">Divisão de Bacia (SSRH)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_prefeitura">Prefeitura</th>
					<th data-visible="false" data-sortable="true" data-field="nme_prefeito">Prefeito</th>
					<th data-visible="false" data-sortable="true" data-align="center" data-formatter="periodoAdministracaoFormatter">Período de Administração</th>
					<th data-visible="false" data-sortable="true" data-align="center" data-field="nme_partido">Partido</th>
					<th data-visible="false" data-sortable="true" data-align="center" data-field="qtd_populacao_urbana_2010" data-formatter="numberFormatter">População Urbana - IBGE 2010</th>
					<th data-visible="false" data-sortable="true" data-align="center" data-field="qtd_populacao_urbana_2030" data-formatter="numberFormatter">Projeção de População em 2030</th>
					<th data-visible="true" data-sortable="true" data-align="center" data-formatter="atendidoSabespFormatter">Atendido pela Sabesp?</th>
				</tr>
			</thead>
		</table>
	</div>
</div>