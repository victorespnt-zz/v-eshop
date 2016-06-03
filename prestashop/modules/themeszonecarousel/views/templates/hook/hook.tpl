{if isset($products) && $products}

    <div class="tz-carousel">
    <h2 class="title_block">
					{$title}
			</h2>

        <!-- Products list -->
        <ul id="owl-slider" class="owl-carousel product_list grid">
            {foreach from=$products item=product name=products}

                <li class="item ajax_block_product">
                    <div class="product-container" itemscope itemtype="http://schema.org/Product">
                        <div class="left-block">
                            <div class="product-image-container">
                                <a class="product_img_link"	href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
                                    <img class="replace-2x img-responsive" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} itemprop="image" />
                                </a>
                                {if isset($quick_view) && $quick_view}
                                    <div class="quick-view-wrapper-mobile">
                                        <a class="quick-view-mobile" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}">
                                            <i class="icon-eye-open"></i>
                                        </a>
                                    </div>
                                    <a class="quick-view" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}">
                                        <span>{l s='Quick view' mod='themeszonecarousel'}</span>
                                    </a>
                                {/if}
                                {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                                    <div class="content_price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                            {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                                                {hook h="displayProductPriceBlock" product=$product type="old_price"}
                                                <span class="old-price product-price">
											{displayWtPrice p=$product.price_without_reduction}
										</span>
                                            {/if}
                                            <span itemprop="price" class="price product-price">
										{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
									</span>
                                            <meta itemprop="priceCurrency" content="{$currency->iso_code}" />

                                            {hook h="displayProductPriceBlock" product=$product type="price"}
                                            {hook h="displayProductPriceBlock" product=$product type="unit_price"}
                                        {/if}
                                    </div>
                                {/if}
                                {if isset($product.new) && $tzc_new_show && $product.new == 1}
                                    <a class="new-box" href="{$product.link|escape:'html':'UTF-8'}">
                                        <span class="new-label">{l s='New' mod='themeszonecarousel'}</span>
                                    </a>
                                {/if}
                                {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                                    <a class="sale-box" href="{$product.link|escape:'html':'UTF-8'}">
                                        <span class="sale-label">{l s='Sall' mod='themeszonecarousel'}</span>
                                    </a>
                                {/if}
                            </div>
                            {hook h="displayProductDeliveryTime" product=$product}
                            {hook h="displayProductPriceBlock" product=$product type="weight"}
                        </div>
                        <div class="right-block">
                            <h5 itemprop="name">
                                {if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}
                                <a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >
                                    {$product.name|truncate:45:'...'|escape:'html':'UTF-8'}
                                </a>
                            </h5>
                            {hook h='displayProductListReviews' product=$product}
                            <p class="product-desc" itemprop="description">
                                {$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}
                            </p>
                            {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">
                                    {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
                                        {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                                            {hook h="displayProductPriceBlock" product=$product type="old_price"}
                                            <span class="old-price product-price">
									{displayWtPrice p=$product.price_without_reduction}
								</span>
                                            {hook h="displayProductPriceBlock" id_product=$product.id_product type="old_price"}
                                        {/if}
                                        <span itemprop="price" class="price product-price">
								{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
							</span>
                                        <meta itemprop="priceCurrency" content="{$currency->iso_code}" />

                                        {hook h="displayProductPriceBlock" product=$product type="price"}
                                        {hook h="displayProductPriceBlock" product=$product type="unit_price"}
                                    {/if}
                                </div>
                            {/if}
                            <div class="button-container">
                                {if ( $tzc_but_show && ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE)}
                                    {if (!isset($product.customization_required) || !$product.customization_required) && ($product.allow_oosp || $product.quantity > 0)}
                                        {if isset($static_token)}
                                            <a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart' mod='themeszonecarousel'}" data-id-product="{$product.id_product|intval}">
                                                <span>{l s='Add to cart' mod='themeszonecarousel'}</span>
                                            </a>
                                        {else}
                                            <a class="button ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart',false, NULL, 'add=1&amp;id_product={$product.id_product|intval}', false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart' mod='themeszonecarousel'}" data-id-product="{$product.id_product|intval}">
                                                <span>{l s='Add to cart' mod='themeszonecarousel'}</span>
                                            </a>
                                        {/if}
                                    {else}
                                        <span class="button ajax_add_to_cart_button btn btn-default disabled">
									<span>{l s='Add to cart' mod='themeszonecarousel'}</span>
								</span>
                                    {/if}
                                {/if}
                                {if ($tzc_more_show) }
                                <a itemprop="url" class="button lnk_view btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='View' mod='themeszonecarousel'}">
                                    <span>{if (isset($product.customization_required) && $product.customization_required)}{l s='Customize' mod='themeszonecarousel'}{else}{l s='More' mod='themeszonecarousel'}{/if}</span>
                                </a>
                                {/if}
                            </div>
                            {if isset($product.color_list)}
                                <div class="color-list-container">{$product.color_list}</div>
                            {/if}
                            <div class="product-flags">
                                {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
                                    {if isset($product.online_only) && $product.online_only}
                                        <span class="online_only">{l s='Online only' mod='themeszonecarousel'}</span>
                                    {/if}
                                {/if}
                                {if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                                {elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
                                    <span class="discount">{l s='Reduced price!' mod='themeszonecarousel'}</span>
                                {/if}
                            </div>
                            {if ($tzc_qty_show && (!$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order))))}

                                {if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
                                    <span itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="availability">
								{if ($product.allow_oosp || $product.quantity > 0)}
                                    <span class="{if $product.quantity <= 0 && !$product.allow_oosp}out-of-stock{else}available-now{/if}">
										<link itemprop="availability" href="http://schema.org/InStock" />{if $product.quantity <= 0}{if $product.allow_oosp}{if isset($product.available_later) && $product.available_later}{$product.available_later}{else}{l s='In Stock'}{/if}{else}{l s='Out of stock'}{/if}{else}{if isset($product.available_now) && $product.available_now}{$product.available_now}{else}{l s='In Stock'}{/if}{/if}
									</span>
								{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
									<span class="available-dif">
										<link itemprop="availability" href="http://schema.org/LimitedAvailability" />{l s='Product available with different options' mod='themeszonecarousel'}
									</span>
								{else}
									<span class="out-of-stock">
										<link itemprop="availability" href="http://schema.org/OutOfStock" />{l s='Out of stock' mod='themeszonecarousel'}
									</span>
                                {/if}
							</span>
                                {/if}

                            {/if}
                        </div>
                        {if $page_name != 'index'}
                            <div class="functional-buttons clearfix">
                                {hook h='displayProductListFunctionalButtons' product=$product}
                                {if isset($comparator_max_item) && $comparator_max_item}
                                    <div class="compare">
                                        <a class="add_to_compare" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}">{l s='Add to Compare' mod='themeszonecarousel'}</a>
                                    </div>
                                {/if}
                            </div>
                        {/if}
                    </div><!-- .product-container> -->
                </li>
            {/foreach}
        </ul>

        {addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
        {addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
        {addJsDef comparator_max_item=$comparator_max_item}
        {addJsDef comparedProductsIds=$compared_products}
    <script>

        $(document).ready(function() {

            var owl = $("#owl-slider");

            owl.owlCarousel({

                items : {$items_wide}, //10 items above 1000px browser width
                itemsDesktop : [1000,{$items_desktop}], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,{$items_desktop_small}], // 3 items betweem 900px and 601px
                itemsTablet: [600,{$items_tablet}], //2 items between 600 and 0;
                itemsMobile : {$items_mobile}, // itemsMobile disabled - inherit from itemsTablet option
                autoPlay: {$tzc_autoplay},
                navigation: {$tzc_nav},
                navigationText: false,
                pagination: false

            });




        });
    </script>
    </div>
{/if}