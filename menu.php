<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container" ng-controller="MenuCtrl">
	<div id="mainnav">
		<!--Menu-->
		<!--================================-->
		<div id="mainnav-menu-wrap">
			<div class="nano">
				<div class="nano-content">
					<ul id="mainnav-menu" class="list-group">
						<?php
							include_once 'php.util/HttpUtil.php';
							$cod_perfil = $_SESSION['user_logged']['user']->cod_perfil;
							$menuItems = json_decode(HttpUtil::doGetRequest('http://'. $_SERVER['HTTP_HOST'] .'/sig-operacional-api/modulos?tmp->cod_perfil='. $cod_perfil, null));

							foreach ($menuItems as $key => $value) {
								echo '<li class="list-header"><i class="'. $value->icn_modulo .'"></i>'. $value->nme_modulo .'</li>';

								if(count($value->nodes) > 0) {
									foreach ($value->nodes as $xkey => $xvalue) {
										echo '<li class="">';
										echo 	'<a href="#">';
										echo 		'<i class="'. $xvalue->icn_modulo .'"></i>';
										echo 		'<span class="menu-title">'. $xvalue->nme_modulo .'</span>';
										echo 		'<i class="arrow"></i>';
										echo 	'</a>';

										if(count($xvalue->nodes) > 0) {
											echo '<ul class="collapse">';

											foreach ($xvalue->nodes as $ykey => $yvalue) {
												echo '<li class="{{activeLink(\''. $yvalue->url_modulo .'\')}}">';
												echo 	'<a href="'. $yvalue->url_modulo .'">';
												echo 		'<i class="'. $yvalue->icn_modulo .'"></i>'. $yvalue->nme_modulo;
												echo 	'</a>';
												echo '</li>';
											}

											echo '</ul>';
										}

										echo '</li>';
									}
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>
		<!--================================-->
		<!--End menu-->
	</div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->