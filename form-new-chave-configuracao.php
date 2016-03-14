<div class="panel" ng-controller="CadastroConfiguracaoCtrl">
	<div class="panel-body">
		<form id="form" class="form form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-lg-2">Chave</label>
				<div class="col-lg-6">
					<input type="text" class="form-control" ng-model="chaveConfiguracao.chv_configuracao">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Valor</label>
				<div class="col-lg-6">
					<input type="text" class="form-control" ng-model="chaveConfiguracao.vlr_configuracao">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-lg-2">Ativo?</label>
				<div class="col-lg-6">
					<div class="checkbox">
						<label class="form-checkbox form-normal form-primary form-text {{ (chaveConfiguracao.flg_ativo) ? 'active' : '' }}">
							<input type="checkbox" ng-model="chaveConfiguracao.flg_ativo">
						</label>
					</div>
				</div>
			</div>
		</form>
	</div>

	<div class="panel-footer clearfix">
		<div class="pull-right">
			<button type="button" class="btn btn-primary btn-labeled fa fa-save" ng-click="save()" data-loading-text="Aguarde, salvando informações...">Salvar</button>
		</div>
	</div>
</div>