<?php /* Smarty version Smarty-3.1.19, created on 2016-04-11 11:54:16
         compiled from "/Applications/MAMP/htdocs/victor_espinet/prestashop/themes/default-bootstrap/faq.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2121530639570b74483171a1-64965449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb78c67d02a4e06bad0cc2fb859bf2d178532bf1' => 
    array (
      0 => '/Applications/MAMP/htdocs/victor_espinet/prestashop/themes/default-bootstrap/faq.tpl',
      1 => 1460367415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2121530639570b74483171a1-64965449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'questions' => 0,
    'question' => 0,
    'answers' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_570b744831e1e3_11018911',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570b744831e1e3_11018911')) {function content_570b744831e1e3_11018911($_smarty_tpl) {?><h1>FAQ</h1><br/>
<p>
	 <ul>
	 <?php  $_smarty_tpl->tpl_vars['answers'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answers']->_loop = false;
 $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answers']->key => $_smarty_tpl->tpl_vars['answers']->value) {
$_smarty_tpl->tpl_vars['answers']->_loop = true;
 $_smarty_tpl->tpl_vars['question']->value = $_smarty_tpl->tpl_vars['answers']->key;
?>
	 <li style="color:#16A59B; font-size:2em;"><?php echo $_smarty_tpl->tpl_vars['question']->value;?>
</li><br/>
	 <li style="font-size: 1.5em; line-height:2em;"><?php echo $_smarty_tpl->tpl_vars['answers']->value;?>
</li><br/>
	 <?php } ?>
	</ul>
</p>	<?php }} ?>
