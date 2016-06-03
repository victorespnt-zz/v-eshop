<?php /* Smarty version Smarty-3.1.19, created on 2016-06-03 14:35:10
         compiled from "/Applications/MAMP/htdocs/victor_espinet/prestashop/modules/themeszonecarousel/views/templates/hook/hook.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7851291505751797e1eba26-29845140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6b62a7f782cdcd5fce72db7dd0c6fbd3903f66b' => 
    array (
      0 => '/Applications/MAMP/htdocs/victor_espinet/prestashop/modules/themeszonecarousel/views/templates/hook/hook.tpl',
      1 => 1464872298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7851291505751797e1eba26-29845140',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'title' => 0,
    'product' => 0,
    'link' => 0,
    'homeSize' => 0,
    'quick_view' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'priceDisplay' => 0,
    'currency' => 0,
    'tzc_new_show' => 0,
    'tzc_but_show' => 0,
    'add_prod_display' => 0,
    'static_token' => 0,
    'tzc_more_show' => 0,
    'tzc_qty_show' => 0,
    'PS_STOCK_MANAGEMENT' => 0,
    'page_name' => 0,
    'comparator_max_item' => 0,
    'compared_products' => 0,
    'items_wide' => 0,
    'items_desktop' => 0,
    'items_desktop_small' => 0,
    'items_tablet' => 0,
    'items_mobile' => 0,
    'tzc_autoplay' => 0,
    'tzc_nav' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5751797e6b98d5_68613263',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5751797e6b98d5_68613263')) {function content_5751797e6b98d5_68613263($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>

    <div class="tz-carousel">
    <h2 class="title_block">
					<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

			</h2>

        <!-- Products list -->
        <ul id="owl-slider" class="owl-carousel product_list grid">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>

                <li class="item ajax_block_product">
                    <div class="product-container" itemscope itemtype="http://schema.org/Product">
                        <div class="left-block">
                            <div class="product-image-container">
                                <a class="product_img_link"	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url">
                                    <img class="replace-2x img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['homeSize']->value)) {?> width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
"<?php }?> itemprop="image" />
                                </a>
                                <?php if (isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
                                    <div class="quick-view-wrapper-mobile">
                                        <a class="quick-view-mobile" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <i class="icon-eye-open"></i>
                                        </a>
                                    </div>
                                    <a class="quick-view" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <span><?php echo smartyTranslate(array('s'=>'Quick view','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                    </a>
                                <?php }?>
                                <?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
                                    <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
                                            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
                                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>

                                                <span class="old-price product-price">
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>

										</span>
                                            <?php }?>
                                            <span itemprop="price" class="price product-price">
										<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?>
									</span>
                                            <meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" />

                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

                                        <?php }?>
                                    </div>
                                <?php }?>
                                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['tzc_new_show']->value&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?>
                                    <a class="new-box" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <span class="new-label"><?php echo smartyTranslate(array('s'=>'New','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                    </a>
                                <?php }?>
                                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                                    <a class="sale-box" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <span class="sale-label"><?php echo smartyTranslate(array('s'=>'Sall','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                    </a>
                                <?php }?>
                            </div>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductDeliveryTime",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"weight"),$_smarty_tpl);?>

                        </div>
                        <div class="right-block">
                            <h5 itemprop="name">
                                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])&&$_smarty_tpl->tpl_vars['product']->value['pack_quantity']) {?><?php echo (intval($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])).(' x ');?>
<?php }?>
                                <a class="product-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url" >
                                    <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],45,'...'), ENT_QUOTES, 'UTF-8', true);?>

                                </a>
                            </h5>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

                            <p class="product-desc" itemprop="description">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),360,'...');?>

                            </p>
                            <?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>

                                            <span class="old-price product-price">
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>

								</span>
                                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'id_product'=>$_smarty_tpl->tpl_vars['product']->value['id_product'],'type'=>"old_price"),$_smarty_tpl);?>

                                        <?php }?>
                                        <span itemprop="price" class="price product-price">
								<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?>
							</span>
                                        <meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" />

                                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

                                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

                                    <?php }?>
                                </div>
                            <?php }?>
                            <div class="button-container">
                                <?php if (($_smarty_tpl->tpl_vars['tzc_but_show']->value&&($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value)) {?>
                                    <?php if ((!isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])||!$_smarty_tpl->tpl_vars['product']->value['customization_required'])&&($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
                                        <?php if (isset($_smarty_tpl->tpl_vars['static_token']->value)) {?>
                                            <a class="button ajax_add_to_cart_button btn btn-default" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp7=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,"add=1&amp;id_product=".$_tmp7."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
                                                <span><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                            </a>
                                        <?php } else { ?>
                                            <a class="button ajax_add_to_cart_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,'add=1&amp;id_product={$product.id_product|intval}',false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
                                                <span><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                            </a>
                                        <?php }?>
                                    <?php } else { ?>
                                        <span class="button ajax_add_to_cart_button btn btn-default disabled">
									<span><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
								</span>
                                    <?php }?>
                                <?php }?>
                                <?php if (($_smarty_tpl->tpl_vars['tzc_more_show']->value)) {?>
                                <a itemprop="url" class="button lnk_view btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
">
                                    <span><?php if ((isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])&&$_smarty_tpl->tpl_vars['product']->value['customization_required'])) {?><?php echo smartyTranslate(array('s'=>'Customize','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'More','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
<?php }?></span>
                                </a>
                                <?php }?>
                            </div>
                            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['color_list'])) {?>
                                <div class="color-list-container"><?php echo $_smarty_tpl->tpl_vars['product']->value['color_list'];?>
</div>
                            <?php }?>
                            <div class="product-flags">
                                <?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['online_only'])&&$_smarty_tpl->tpl_vars['product']->value['online_only']) {?>
                                        <span class="online_only"><?php echo smartyTranslate(array('s'=>'Online only','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                    <?php }?>
                                <?php }?>
                                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                                <?php } elseif (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                                    <span class="discount"><?php echo smartyTranslate(array('s'=>'Reduced price!','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</span>
                                <?php }?>
                            </div>
                            <?php if (($_smarty_tpl->tpl_vars['tzc_qty_show']->value&&(!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']))))) {?>

                                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
                                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="availability">
								<?php if (($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
                                    <span class="<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']<=0&&!$_smarty_tpl->tpl_vars['product']->value['allow_oosp']) {?>out-of-stock<?php } else { ?>available-now<?php }?>">
										<link itemprop="availability" href="http://schema.org/InStock" /><?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']<=0) {?><?php if ($_smarty_tpl->tpl_vars['product']->value['allow_oosp']) {?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_later'])&&$_smarty_tpl->tpl_vars['product']->value['available_later']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['available_later'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'In Stock'),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php echo smartyTranslate(array('s'=>'Out of stock'),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_now'])&&$_smarty_tpl->tpl_vars['product']->value['available_now']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['available_now'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'In Stock'),$_smarty_tpl);?>
<?php }?><?php }?>
									</span>
								<?php } elseif ((isset($_smarty_tpl->tpl_vars['product']->value['quantity_all_versions'])&&$_smarty_tpl->tpl_vars['product']->value['quantity_all_versions']>0)) {?>
									<span class="available-dif">
										<link itemprop="availability" href="http://schema.org/LimitedAvailability" /><?php echo smartyTranslate(array('s'=>'Product available with different options','mod'=>'themeszonecarousel'),$_smarty_tpl);?>

									</span>
								<?php } else { ?>
									<span class="out-of-stock">
										<link itemprop="availability" href="http://schema.org/OutOfStock" /><?php echo smartyTranslate(array('s'=>'Out of stock','mod'=>'themeszonecarousel'),$_smarty_tpl);?>

									</span>
                                <?php }?>
							</span>
                                <?php }?>

                            <?php }?>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index') {?>
                            <div class="functional-buttons clearfix">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

                                <?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
                                    <div class="compare">
                                        <a class="add_to_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"><?php echo smartyTranslate(array('s'=>'Add to Compare','mod'=>'themeszonecarousel'),$_smarty_tpl);?>
</a>
                                    </div>
                                <?php }?>
                            </div>
                        <?php }?>
                    </div><!-- .product-container> -->
                </li>
            <?php } ?>
        </ul>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'min_item')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'min_item'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'min_item'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'max_item')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'max_item'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'max_item'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('comparator_max_item'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value),$_smarty_tpl);?>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('comparedProductsIds'=>$_smarty_tpl->tpl_vars['compared_products']->value),$_smarty_tpl);?>

    <script>

        $(document).ready(function() {

            var owl = $("#owl-slider");

            owl.owlCarousel({

                items : <?php echo $_smarty_tpl->tpl_vars['items_wide']->value;?>
, //10 items above 1000px browser width
                itemsDesktop : [1000,<?php echo $_smarty_tpl->tpl_vars['items_desktop']->value;?>
], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,<?php echo $_smarty_tpl->tpl_vars['items_desktop_small']->value;?>
], // 3 items betweem 900px and 601px
                itemsTablet: [600,<?php echo $_smarty_tpl->tpl_vars['items_tablet']->value;?>
], //2 items between 600 and 0;
                itemsMobile : <?php echo $_smarty_tpl->tpl_vars['items_mobile']->value;?>
, // itemsMobile disabled - inherit from itemsTablet option
                autoPlay: <?php echo $_smarty_tpl->tpl_vars['tzc_autoplay']->value;?>
,
                navigation: <?php echo $_smarty_tpl->tpl_vars['tzc_nav']->value;?>
,
                navigationText: false,
                pagination: false

            });




        });
    </script>
    </div>
<?php }?><?php }} ?>
