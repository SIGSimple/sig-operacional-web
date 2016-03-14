<div class="panel" ng-controller="CadastroAlertaEmailController">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-lg-2">Nome/Descrição</label>
				<div class="col-lg-6">
					<input type="text" class="form-control" name="nme_alerta" ng-model="objectModel.nme_alerta">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Consulta (SQL)</label>
				<div class="col-lg-6">
					<textarea class="form-control" name="sql_query" ng-model="objectModel.sql_query" rows="5"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Modelo de E-mail</label>
				<div class="col-lg-6">
					<textarea class="form-control" name="txt_html_email" ng-model="objectModel.txt_html_email" rows="5"></textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Inicio</label>
				<div class="col-lg-3">
					<div class="input-group date">
						<input type="text" class="form-control" name="dta_inicio" ng-model="objectModel.dta_inicio">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Fim</label>
				<div class="col-lg-3">
					<div class="input-group date">
						<input type="text" class="form-control" name="dta_fim" ng-model="objectModel.dta_fim">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Periodicidade</label>
				<div class="col-lg-3">
					<select class="form-control" name="flg_periodicidade" ng-model="objectModel.flg_periodicidade">
						<option value="D">Envio Diário</option>
						<option value="S">Envio Semanal</option>
						<option value="Q">Envio Quinzenal</option>
						<option value="M">Envio Mensal</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Ativo?</label>
				<div class="col-lg-6">
					<div class="checkbox">
						<label class="form-checkbox form-normal form-primary form-text {{ (objectModel.flg_ativo) ? 'active' : '' }}">
							<input type="checkbox" name="flg_ativo" ng-model="objectModel.flg_ativo">
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Destinatários</label>
				<div class="col-lg-9">
					<table class="table table-bordered table-hover table-condensed table-striped" name="destinatarios">
						<thead>
							<th>Nome</th>
							<th>E-mail</th>
							<th>Cargo/Função</th>
							<th>Empresa</th>
							<th width="20"><button class="btn btn-xs btn-primary" ng-click="abreModal('interessados','destinatarios')"><i class="fa fa-plus-square"></i></button></th>
						</thead>
						<tbody>
							<tr ng-repeat="destinatario in objectModel.destinatarios">
								<td>{{ destinatario.nme_responsavel }}</td>
								<td>{{ destinatario.email }}</td>
								<td>{{ destinatario.cargo }}</td>
								<td>{{ destinatario.nme_empresa }}</td>
								<td><button class="btn btn-xs btn-danger" ng-click="removeItem($index)"><i class="fa fa-trash-o"></i></button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button type="button" class="btn btn-primary btn-labeled fa fa-save" ng-click="save()" data-loading-text="Aguarde, salvando informações...">Salvar</button>
		</div>
	</div>

	<div class="modal fade" id="modalItems" tabindex="-1" role="dialog" aria-labelledby="modalItemsLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalItemsLabel"></h4>
				</div>
				<div class="modal-body">
					<table id="mytable"></table>
				</div>
				<div class="modal-footer clearfix">
					<div class="pull-right">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>