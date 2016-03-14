<div class="panel" ng-controller="ListConfiguracoesCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-chave-configuracao" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Nova Chave de Configuração
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/configuracoes.json"
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
					<th data-visible="true" data-sortable="true" data-field="chv_configuracao">Chave</th>
					<th data-visible="true" data-sortable="true" data-field="vlr_configuracao">Valor</th>
					<th data-visible="true" data-sortable="true" data-sort-name="flg_ativo" data-field="flg_ativo" data-formatter="ativoFormatter">Ativo?</th>
				</tr>
			</thead>
		</table>
	</div>
</div>