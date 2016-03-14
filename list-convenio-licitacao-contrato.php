<div class="panel" ng-controller="ListConvenioLicitacaoContratoCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-convenio-licitacao-contrato" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/convenios/licitacoes/contratos.json"
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
					<th data-visible="true" data-sortable="true" data-field="num_autos_convenio">Nº Autos do Convênio</th>
					<th data-visible="true" data-sortable="true" data-field="num_convenio">Nº do Convênio</th>
					<th data-visible="true" data-sortable="true" data-field="num_autos_licitacao">Nº Autos da Licitação</th>
					<th data-visible="true" data-sortable="true" data-field="num_edital">Nº do Edital</th>
					<th data-visible="true" data-sortable="true" data-field="num_autos_contrato">Nº Autos do Contrato</th>
					<th data-visible="true" data-sortable="true" data-field="num_contrato">Nº do Contrato</th>
				</tr>
			</thead>
		</table>
	</div>
</div>