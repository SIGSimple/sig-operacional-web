<div class="panel" ng-controller="ListAgenciaCetesbCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-agencia-cetesb" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/agencias-cetesb.json"
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
					<th data-visible="true" data-sortable="true" data-field="nme_agencia">Agência Ambiental de(o)</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_endereco">Endereço</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_bairro">Bairro</th>
					<th data-visible="true" data-sortable="true" data-field="nme_municipio">Cidade/Municipio</th>
					<th data-visible="true" data-sortable="true" data-field="num_cep">CEP</th>
					<th data-visible="true" data-sortable="true" data-field="num_telefone" data-formatter="phoneNumberFormatter">Telefone</th>
					<th data-visible="false" data-sortable="true" data-field="num_fax" data-formatter="phoneNumberFormatter">Fax</th>
					<th data-visible="true" data-sortable="true" data-field="end_email">E-mail</th>
				</tr>
			</thead>
		</table>
	</div>
</div>