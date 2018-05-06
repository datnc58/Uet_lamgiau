</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017-2018 <a href=""></a>.</strong> All rights
    reserved.
  </footer>
</div>

<!-- Slimscroll -->
<script src="<?= base_url('assets/css_admin/back_end/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/css_admin/back_end/plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/js_admin/app.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= base_url('assets/js_admin/dashboard.js')?>"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="<?= base_url('assets/js_admin/demo.js')?>"></script>-->

<!--<script src="<?=base_url('assets/js_admin/main_site.js')?>"></script>-->
<script src="<?=base_url('assets/js_admin/mainadmin_qts.js')?>"></script>

<link rel="stylesheet" href="<?= base_url('assets/plugin/ValidationEngine/css/validationEngine.jquery.css') ?>">
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js') ?>"
        charset="utf-8"></script>
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<input type="hidden" id="baseurl" value="<?=base_url('')?>"/>
<div id="show_success_mss" style="position: fixed; top: 40px; right: 20px;z-index:9999;">
	<?php if($this->session->flashdata('mess')): ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-success"></i><?=$this->session->flashdata('mess'); ?>
	</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('mess_err')): ?>
	<div class="alert alert-warning alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-warning"></i><?=$this->session->flashdata('mess_err'); ?>
	</div>
	<?php endif; ?>
</div>
<script>
    $(document).ready(function(){
        $(".validate").validationEngine();
    });
    setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 9000);

    function base_url(){
        return '<?php echo base_url();?>';
    }
</script>
</body>
</html>



