<?php /* Smarty version Smarty-3.1.19, created on 2016-06-02 18:03:13
         compiled from "/Applications/MAMP/htdocs/victor_espinet/prestashop/admin312fiugpn/themes/default/template/controllers/modules/modal_not_trusted_country.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1278516777575058c116d459-91699128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64b813ae776569a9e72f8a7a1dc1641aa4d18373' => 
    array (
      0 => '/Applications/MAMP/htdocs/victor_espinet/prestashop/admin312fiugpn/themes/default/template/controllers/modules/modal_not_trusted_country.tpl',
      1 => 1452091828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278516777575058c116d459-91699128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_575058c119aaf1_55295509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575058c119aaf1_55295509')) {function content_575058c119aaf1_55295509($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['module_name'] = new Smarty_variable('<strong><span class="module-display-name-placeholder"></span></strong>', null, 0);?>

<div class="modal-body">
	<div class="alert alert-warning">
		<h4><?php echo smartyTranslate(array('s'=>'You are about to install "%s", a module which is not compatible with your country.','sprintf'=>$_smarty_tpl->tpl_vars['module_name']->value),$_smarty_tpl);?>
</h4>
		<p>
			<?php echo smartyTranslate(array('s'=>'This module was not verified by PrestaShop hence we cannot certify that it works well in your country and that it complies with our quality requirements.'),$_smarty_tpl);?>

			<strong><?php echo smartyTranslate(array('s'=>'Use at your own risk.'),$_smarty_tpl);?>
</strong>
		</p>
	</div>
	<h3><?php echo smartyTranslate(array('s'=>'What Should I Do?'),$_smarty_tpl);?>
</h3>
	<p>
		<?php echo smartyTranslate(array('s'=>'If you are unsure about this, you should contact the Customer Service of %s to ask them to make the module compatible with your country.','sprintf'=>$_smarty_tpl->tpl_vars['module_name']->value),$_smarty_tpl);?>
<br />
		<?php echo smartyTranslate(array('s'=>'Moreover, we recommend that you use an equivalent module: compatible modules for your country are listed in the "Modules" tab of your back office.'),$_smarty_tpl);?>

	</p>
	<p>
		<?php echo smartyTranslate(array('s'=>'If you are unsure about this module, you can look for similar modules on the official marketplace.'),$_smarty_tpl);?>

		<a class="_blank" href="http://addons.prestashop.com/"><?php echo smartyTranslate(array('s'=>'Click here to browse PrestaShop Addons.'),$_smarty_tpl);?>
</a>
	</p>
</div>

<div class="modal-footer">
	<div class="row">
		<div class="col-sm-12 text-center">
			<a id="proceed-install-anyway" href="#" class="btn btn-warning"><?php echo smartyTranslate(array('s'=>'Proceed with the installation'),$_smarty_tpl);?>
</a>
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Back to modules list'),$_smarty_tpl);?>
</button>
		</div>
	</div>
</div>
<?php }} ?>
