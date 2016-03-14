<div class="panel" ng-controller="ListConvenioCtrl">
	<div class="panel-body">
		<div id="toolbar">
			<a href="form-new-convenio" class="btn btn-success btn-labeled fa fa-plus-square">
				Cadastrar Novo
			</a>
		</div>
		<table class="bootstrap-table" 
			data-toggle="table"
			data-url="http://<?php echo $_SERVER['HTTP_HOST']; ?>/sig-operacional-api/convenios.json"
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
					<th data-visible="true" data-sortable="true" data-field="num_convenio" data-align="center">Nº do Convênio</th>
					<th data-visible="false" data-sortable="true" data-field="nme_projetista_convenio">Empresa Projetista</th>
					<th data-visible="false" data-sortable="true" data-field="dsc_enquadramento">Enquadramento</th>
					<th data-visible="false" data-sortable="true" data-field="nme_programa">Programa</th>
					<th data-visible="true" data-sortable="true" data-field="dta_assinatura" data-formatter="dateFormatter" data-align="center">Dt. Assinatura</th>
					<th data-visible="false" data-sortable="true" data-field="dta_publicacao_doe" data-formatter="dateFormatter" data-align="center">Dt. Publicação DOE</th>
					<th data-visible="true" data-sortable="true" data-field="prz_meses" data-formatter="monthFormatter" data-align="center">Prazo Original (Meses)</th>
					<th data-visible="true" data-sortable="true" data-field="dta_vigencia" data-formatter="dateFormatter" data-align="center">Dt. Vigência</th>
					<th data-visible="true" data-sortable="true" data-field="vlr_original" data-formatter="currencyFormatter" data-align="right">Valor Original</th>
					<th data-visible="false" data-sortable="true" data-field="vlr_contra_partida_prefeitura" data-formatter="currencyFormatter" data-align="right">Contra Partida (PM)</th>
					<th data-visible="false" data-sortable="true" data-field="nme_fonte_recurso">Fonte de Recursos</th>
					<th data-visible="false" data-sortable="true" data-field="nme_coordenador_daee">Coordenador (DAEE)</th>
				</tr>
			</thead>
		</table>
	</div>
</div>