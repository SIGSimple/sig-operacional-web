<div class="panel" ng-controller="ListEmpresaCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-empresa" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/empresas.json"
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
					<th data-visible="true" data-sortable="true" data-field="Construtora">Nome</th>
					<th data-visible="false" data-sortable="true" data-field="end_construtora">Endereço</th>
					<th data-visible="false" data-sortable="true" data-field="cep_empresa">CEP</th>
					<th data-visible="true" data-sortable="true" data-field="nme_municipio">Município</th>
					<th data-visible="false" data-sortable="true" data-field="email_empresa">E-mail</th>
					<th data-visible="false" data-sortable="true" data-field="site_empresa">Site</th>
					<th data-visible="false" data-sortable="true" data-field="num_telefone">Nº Telefone</th>
					<th data-visible="false" data-sortable="true" data-field="cnpj_empresa">CNPJ</th>
					<th data-visible="true" data-sortable="true" data-field="nme_engenheiro_responsavel">Engenheiro Responsável</th>
					<th data-visible="false" data-sortable="true" data-field="num_crea">Nº CREA</th>
					<th data-visible="false" data-sortable="true" data-field="telefone_responsavel">Nº Telefone (Eng. Resp.)</th>
					<th data-visible="false" data-sortable="true" data-field="email_responsavel">E-mail (Eng. Resp.)</th>
				</tr>
			</thead>
		</table>
	</div>
</div>