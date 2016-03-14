<div class="panel" ng-controller="ListLicitacaoCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-licitacao" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/licitacoes.json"
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
					<th data-visible="true" data-sortable="true" data-field="num_autos" data-align="center">Nº Autos do Processo</th>
					<th data-visible="true" data-sortable="true" data-field="num_edital" data-align="center">Nº do Edital</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_tipo_contratacao">Tipo de Contratação</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_financiador">Financiador</th>
					<th data-visible="true" data-sortable="true" data-field="dsc_modalidade">Modalidade de Contratação</th>
					<th data-visible="true" data-sortable="true" data-field="dta_publicacao_doe" data-formatter="dateFormatter" data-align="center">Dt. Publicação DOE</th>
					<th data-visible="true" data-sortable="true" data-field="dta_licitacao" data-formatter="dateFormatter" data-align="center">Dt. Licitação</th>
					<th data-visible="false" data-sortable="true" data-field="vlr_licitacao" data-formatter="currencyFormatter" data-align="right">Valor Estimado</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_situacao">Status/Situação</th>
				</tr>
			</thead>
		</table>
	</div>
</div>