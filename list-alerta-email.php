<div class="panel" ng-controller="ListAlertaEmailCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-alerta-email" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Nova Alerta de E-mail
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/alertas/email.json"
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
					<th data-visible="true" data-sortable="true" data-field="nme_alerta">Nome</th>
					<th data-visible="true" data-sortable="true" data-field="dta_inicio" data-formatter="dateFormatter">De</th>
					<th data-visible="true" data-sortable="true" data-field="dta_fim" data-formatter="dateFormatter">Até</th>
					<th data-visible="true" data-sortable="true" data-field="qtd_destinatarios">Qtd. Destinatários</th>
					<th data-visible="true" data-sortable="true" data-field="dta_ultimo_envio" data-formatter="dateTimeFormatter">Último Envio</th>
					<th data-visible="true" data-sortable="true" data-sort-name="flg_ativo" data-field="flg_ativo" data-formatter="ativoFormatter">Ativo?</th>
				</tr>
			</thead>
		</table>
	</div>
</div>