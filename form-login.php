<?php

@session_start();
unset($_SESSION['user_logged']);

?>
<!-- LOGIN FORM -->
<!--===================================================-->
<div class="{{ ( users.length === 0 && flg_senha_bloqueada ) ? 'cls-content-sm' : (!flg_senha_bloqueada) ? 'cls-content-lg' : 'cls-content-sm' }} panel" ng-controller="LoginCtrl" style="{{ ((users.length > 0) && (!flg_senha_bloqueada)) ? 'background-color: #F9F9F9;' : '' }}">
	<div class="panel-body" ng-show="( users.length === 0 && flg_senha_bloqueada )">
		<p class="pad-btm"><img src="img/logo-full.png"></p>
		<p class="pad-btm text-bold">Entre com seus dados</p>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<input type="text" class="form-control" placeholder="Usuário" ng-model="dadosLogin.nme_login" ng-enter="login()">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
				<input type="password" class="form-control" placeholder="Senha" ng-model="dadosLogin.nme_senha" ng-enter="login()">
			</div>
		</div>

		<div class="form-group">
			<div class="checkbox">
				<label class="form-checkbox form-normal form-primary form-text {{ (dadosLogin.flg_guardar_dados_login) ? 'active' : '' }}">
					<input type="checkbox" ng-model="dadosLogin.flg_guardar_dados_login" > Guardar dados de login
				</label>
			</div>
		</div>

		<div class="row">
			<p class="text-danger">{{ errorMessage }}</p>
		</div>
	</div>

	<div class="panel-body" ng-show="( users.length > 0 && flg_senha_bloqueada )">
		<p class="pad-btm text-bold">Para realizar o primeiro acesso, é necessário informar uma nova senha de acesso</p>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
				<input type="password" class="form-control" placeholder="Informe a nova senha" ng-model="novaSenha.nme_senha" ng-enter="desbloquearSenha()">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
				<input type="password" class="form-control" placeholder="Repita a nova senha" ng-model="novaSenha.nme_senha_repete" ng-enter="desbloquearSenha()">
			</div>
		</div>

		<div class="row">
			<p class="text-danger">{{ errorMessage }}</p>
		</div>
	</div>

	<div class="panel-body" ng-show="(directLogin === true)">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<i class="fa fa-spin fa-spinner"></i> Aguarde, você está sendo redirecionado...
		</div>
	</div>

	<div class="panel-body" ng-show="((users.length > 0) && (!flg_senha_bloqueada)) && (!directLogin)">
		<p class="pad-btm">
			<i class="fa fa-user"></i> Selecione o perfil que deseja utilizar
		</p>

		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" ng-repeat="user in users">
				<div class="panel widget">
					<div class="widget-header bg-{{ (user.cod_perfil === 1) ? 'success' : (user.flg_sexo == 'F') ? 'pink' : (user.flg_sexo == 'M') ? 'primary' : 'success' }} no-image"></div>
					<div class="widget-body text-center">
						<img class="widget-img img-border img-circle" src="{{ (user.pth_arquivo_foto) ? user.pth_arquivo_foto : (user.cod_perfil === 1) ? 'img/av3.png' : (user.flg_sexo == 'F') ? 'img/av6.png' : (user.flg_sexo == 'M') ? 'img/av2.png' : 'img/av3.png' }}"></img>
						<h4 class="mar-no">{{ getFirstAndLastName(user.nme_usuario) }}</h4>
						<p class="text-muted">{{ (user.funcao != null) ? user.funcao.nme_funcao : user.nme_perfil }}</p>
						<h5 class="text-muted text-bold">{{ user.nme_empreendimento }}</h5>
						<div>
							<a ng-click="chooseProfile(user)"
								class="btn btn-{{ (user.cod_perfil === 1) ? 'success' : (user.flg_sexo == 'F') ? 'pink' : (user.flg_sexo == 'M') ? 'primary' : 'success' }}">
								Utilizar este perfil
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="panel-footer clearfix" ng-show="(!directLogin)">
		<div class="pull-right">
			<button type="button" class="btn btn-default text-uppercase btn-labeled fa fa-times-circle" ng-show="users.length > 0" ng-click="cancelLogin()">Cancelar</button>
			<button type="button" class="btn btn-mint btn-unlock-password text-uppercase btn-labeled fa fa-unlock" data-loading-text="Aguarde..." ng-show="( users.length > 0 && flg_senha_bloqueada )" ng-click="desbloquearSenha()">Desbloquear senha</button>
			<button type="button" class="btn btn-success text-uppercase btn-labeled fa fa-sign-in" ng-show="( users.length === 0 && flg_senha_bloqueada )" ng-click="login()" data-loading-text="Aguarde...">Entrar</button>
		</div>
	</div>
</div>
<!--===================================================-->