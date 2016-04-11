<?php /*%%SmartyHeaderCode:1796918383570b4c87344538-46542253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bcc5da46e927f3ee8582953166d7fbb6bd15d55' => 
    array (
      0 => '/Applications/MAMP/htdocs/victor_espinet/prestashop/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1452091828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1796918383570b4c87344538-46542253',
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_570b4c873a4996_90412067',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570b4c873a4996_90412067')) {function content_570b4c873a4996_90412067($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//localhost:8888/victor_espinet/prestashop/recherche" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Rechercher" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Rechercher</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
