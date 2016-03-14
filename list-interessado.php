<div class="panel" ng-controller="ListInteressadoCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-interessado" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/interessados.json"
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
					<th data-visible="true" data-sortable="true" data-field="nme_responsavel">Nome</th>
					<th data-visible="true" data-sortable="true" data-field="cargo">Cargo</th>
					<th data-visible="true" data-sortable="true" data-field="email">E-mail</th>
					<th data-visible="true" data-sortable="true" data-field="telefone" data-formatter="phoneNumberFormatter">Nº Telefone</th>
					<th data-visible="false" data-sortable="true" data-field="numero_crea">Nº CREA</th>
					<th data-visible="true" data-sortable="true" data-field="nme_empresa">Empresa</th>
					<th data-visible="false" data-sortable="true" data-field="nme_usuario">Login no Sistema</th>
				</tr>
			</thead>
		</table>
	</div>
</div>