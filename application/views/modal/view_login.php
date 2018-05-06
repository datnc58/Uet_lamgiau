<link href="<?=base_url()?>assets/css/style_login.css" rel="stylesheet"/>
<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form id="loginform" class="form-horizontal" role="form" autocomplete="on">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?=lang('login');?></h4>
			</div>

			<div style="height: 35px;display:none; padding: 5px 10px;width:100%" id="login-alert" class="alert alert-danger col-sm-12"></div>

			<div class="modal-body">
				<input id="login-username" type="text" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" class="id_acc form-control"
                                    class="validate[required,custom[email]]"   name="email" value="" autocomplete="on" placeholder="Email">
				<input id="login-password" type="password" onkeypress=" var x = event.which || event.keyCode; if(x==13){ login()}" class="form-control pass_acc"
                                       name="password" placeholder="<?=lang('pass');?>">

				<div class="checkbox pull-left check_ghinho">
					<label><input type="checkbox" value=""><?=lang('remenber_login');?></label>
				</div>
				<div class="pull-right"><a href="javascript:void(0)" onclick="getModalForgotPass()" class="quen_pass"><?=lang('forget_pass');?></a></div>
				<div class="clearfix"></div>
				<div class="sys_btn_open_login login_zz" onclick="login()" id="btn-login" ><?=lang('login');?></div>

				<div class="login_ft">
					<div class=""><?=lang('not_username');?></div>
					<div class="sys_btn_open_register register_zzz" href="javascript:void(0)" onclick="registerModal()"><?=lang('register');?></div>
				</div>
			</div>
			 </form>
		</div>
	</div>
</div>

