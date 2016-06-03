<?php

/*
 * ThemesZoneCarouselModule
 * 
 * @author Themes Zone <contacts@themes.zone>
 * @copyright 2014 Themes Zone
 * @version 0.9.5
 * @license http://creativecommons.org/licenses/by/3.0/ CC BY 3.0
 */

if (!defined('_PS_VERSION_'))
    exit;

class ThemesZoneCarousel extends Module {

    public function __construct() {
        $this->name = 'themeszonecarousel'; // internal identifier, unique and lowercase
        $this->tab = ''; // backend module coresponding category - optional since v1.6
        $this->version = '0.9.5'; // version number for the module
        $this->author = 'Themes Zone'; // module author
        $this->need_instance = 0; // load the module when displaying the "Modules" page in backend
        $this->secure_key = Tools::encrypt($this->name);
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Themes Zone Products Carousel'); // public name
        $this->description = $this->l('Products Carousel Module by Themes Zone'); // public description
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->module_path = _PS_MODULE_DIR_.$this->name.'/';
        $this->uploads_path = _PS_MODULE_DIR_.$this->name.'/img/';
        $this->admin_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/admin/';
        $this->hooks_tpl_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hook/';

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?'); // confirmation message at uninstall
    }

    /**
     * Install this module
     * @return boolean
     */
    public function install() {

        return  parent::install() &&
                $this->initConfig() &&
                $this->registerHook('displayHeader') &&
                $this->registerHook('displayCarousel') &&
                $this->registerHook('displayHome');
    }

    /**
     * Uninstall this module
     * @return boolean
     */
    public function uninstall() {
        return  Configuration::deleteByName($this->name) &&
                parent::uninstall();
    }
    
    /**
     * Set the default configuration
     * @return boolean
     */
    protected function initConfig() {
        $languages = Language::getLanguages(false);
        $config = array();

        $config['items_wide'] = 4;
        $config['items_desktop'] = 4;
        $config['items_desktop_small'] = 2;
        $config['items_tablet'] = 2;
        $config['items_mobile'] = 1;
        $config['items_number'] = 12;
        $config['items_set'] = 'new_products';
        $config['tzc_autoplay'] = 1;
        $config['tzc_nav'] = 1;
        $config['tzc_but_show'] = true;
        $config['tzc_more_show'] = true;
        $config['tzc_qty_show'] = true;
        $config['slide_speed'] = 200;
        $config['cat_id'] = 0;
        $config['tzc_new_show'] = true;

        foreach ($languages as $lang) {
            $config['title'][$lang['id_lang']] = $this->l('Products Carousel');
        }

        return Configuration::updateValue($this->name, json_encode($config));
    }

    /**
     * Header of pages hook (Technical name: displayHeader)
     */
    public function hookHeader() {
        $this->context->controller->addCSS($this->_path .'/css/'. 'owl.carousel.css');
        $this->context->controller->addCSS($this->_path .'/css/'. 'owl.theme.css');
        $this->context->controller->addCSS($this->_path .'/css/'. 'owl.transitions.css');
        //$this->context->controller->addCSS($this->_path .'/css/'. 'font-awesome.min.css');
        $this->context->controller->addCSS($this->_path .'/css/'. 'style.css');
        $this->context->controller->addJS($this->_path .'/js/'. 'owl.carousel.min.js');
        $this->context->controller->addJS($this->_path .'/js/'. 'script.js');
    }

    /**
     * Homepage content hook (Technical name: displayHome)
     */
    public function hookDisplayHome($params) {
        $config = json_decode(Configuration::get($this->name), true);

        $product_set = array();

        switch($config['items_set']){
            case 'new_products':
                $product_set = $this->getNewProducts($config['items_number']);
                break;
            case 'featured_products':
                $product_set = $this->FeaturedProducts($config['items_number']);
                break;
            case 'best_sellers':
                $product_set = $this->getBestSellers($params, $config['items_number']);
                break;
            case 'category':
                if ( isset($config['cat_id']) && $config['cat_id'] > 0 ) $product_set = $this->getProducts($config['cat_id']);
                break;
            default:
                $product_set = $this->getNewProducts($config['items_number']);
        }



        $this->smarty->assign(array(
            'items_wide' => $config['items_wide'],
            'items_desktop' => $config['items_desktop'],
            'items_desktop_small' => $config['items_desktop_small'],
            'items_tablet' => $config['items_tablet'],
            'items_mobile' => $config['items_mobile'],
            'items_set' => $config['items_set'],
            'items_number' => $config['items_number'],
            'slide_speed' => $config['slide_speed'],
            'title' => $config['title'][$this->context->language->id],
            'products' => $product_set,
            'tzc_autoplay' => $config['tzc_autoplay'] ? 'true' : 'false',
            'tzc_nav' => $config['tzc_nav'] ? 'true' : 'false',
            'tzc_but_show' => $config['tzc_but_show'] ? true : false,
            'tzc_more_show' => $config['tzc_more_show'] ? true : false,
            'tzc_qty_show' => $config['tzc_qty_show'] ? true : false,
            'tzc_new_show' => $config['tzc_new_show'] ? true : false,
            'cat_id' => $config['cat_id'],
            'homeSize' => Image::getSize(ImageType::getFormatedName('home')),

        ));

        return $this->display(__FILE__, 'hook.tpl');

    }

    public function FeaturedProducts($nbr)
    {

            $category = new Category((int)Configuration::get('HOME_FEATURED_CAT'), (int)Context::getContext()->language->id);
            $nb = $nbr;
            if (Configuration::get('HOME_FEATURED_RANDOMIZE'))
                return $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), null, null, false, true, true, ($nb ? $nb : 8));
            else
                return $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), 'position');



    }


    private function getProducts($cat_id){

        $products = false;
        if (!$cat_id) return;
        $category = new Category((int)$cat_id, (int)Context::getContext()->language->id);
        $nb = 10000;
        $products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 10));
        if (!$products)
            return;
        return $products;
    }

    private function getNewProducts($nbr){

        $newProducts = false;
        if (Configuration::get('PS_NB_DAYS_NEW_PRODUCT'))
            $newProducts = Product::getNewProducts((int) $this->context->language->id, 0, $nbr);

        if (!$newProducts)
            return;
        return $newProducts;
    }

    private function getBestSellers($params, $nbr){
        if (Configuration::get('PS_CATALOG_MODE'))
            return false;

        $result = ProductSale::getBestSalesLight((int)$params['cookie']->id_lang, 0, $nbr);


        $currency = new Currency($params['cookie']->id_currency);
        $usetax = (Product::getTaxCalculationMethod((int)$this->context->customer->id) != PS_TAX_EXC);
        foreach ($result as &$row)
            $row['price'] = Tools::displayPrice(Product::getPriceStatic((int)$row['id_product'], $usetax), $currency);

        return $result;
    }

    /**
     * Configuration page
     */
    public function getContent() {
        return $this->postProcess() . $this->renderForm();
    }

    /*
     * Configuration page form builder
     */
    public function renderForm() {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Themes Zone Products Carousel'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'label' => $this->l('Title'),
                        'type'  => 'text',
                        'lang'  => true,
                        'name'  => 'title',
                        'desc' => $this->l('Set Block\'s title'),
                    ),

                    array(
                        'label' => $this->l('Number of Items to use'),
                        'type'  => 'text',
                        'name'  => 'items_number',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to use in slider'),
                    ),
                    array(
                        'label' => $this->l('Number of items in the carousel for wide screens'),
                        'type'  => 'text',
                        'name'  => 'items_wide',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to show in a view port on wide screens'),
                    ),
                    array(
                        'label' => $this->l('Number of items in the carousel for desktop screens'),
                        'type'  => 'text',
                        'name'  => 'items_desktop',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to show in a view port on regular screens'),
                    ),
                    array(
                        'label' => $this->l('Number of items in the carousel for desktop small screens'),
                        'type'  => 'text',
                        'name'  => 'items_desktop_small',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to show in a view port on wide tablets'),
                    ),
                    array(
                        'label' => $this->l('Number of items in the carousel for tablets'),
                        'type'  => 'text',
                        'name'  => 'items_tablet',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to show in a view port on regular tablets'),
                    ),
                    array(
                        'label' => $this->l('Number of items in the carousel for mobile'),
                        'type'  => 'text',
                        'name'  => 'items_mobile',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the number of items to show in a view port on mobile devices'),
                    ),
                    array(
                        'label' => $this->l('Slide Speed'),
                        'type'  => 'text',
                        'name'  => 'slide_speed',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the slide\'s speed'),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Select Products Set to show'),
                        'name' => 'items_set',
                        'required' => false,
                        'default_value' => 'new_products',
                        'options' => array(
                            'query' => array(
                                array('set_id' => 'new_products', 'set_name' => $this->l('New Products')),
                                array('set_id' => 'featured_products', 'set_name' => $this->l('Featured Products')),
                                array('set_id' => 'best_sellers', 'set_name' => $this->l('Best Sellers')),
                                array('set_id' => 'category', 'set_name' => $this->l('A Category')),
                            ),
                            'id' => 'set_id',
                            'name' => 'set_name'
                        )
                    ),
                    array(
                        'label' => $this->l('Category ID'),
                        'type'  => 'text',
                        'name'  => 'cat_id',
                        'class' => 'fixed-width-xs',
                        'desc' => $this->l('Set the Category Id if you wish to show specific category products'),
                    ),

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show Add to Cart Button'),
                        'name' => 'tzc_but_show',
                        'is_bool' => true,
                        'desc' => $this->l('Should the Add to Cart button be displayed?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('No')
                            )
                        ),
                    ),

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show More Button'),
                        'name' => 'tzc_more_show',
                        'is_bool' => true,
                        'desc' => $this->l('Should the More button be displayed?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('No')
                            )
                        ),
                    ),

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show Products Qty Button'),
                        'name' => 'tzc_qty_show',
                        'is_bool' => true,
                        'desc' => $this->l('Should the products stock info be displayed?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('No')
                            )
                        ),
                    ),

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show New Badge'),
                        'name' => 'tzc_new_show',
                        'is_bool' => true,
                        'desc' => $this->l('Should the New Badge be displayed?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => true,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => false,
                                'label' => $this->l('No')
                            )
                        ),
                    ),


                    array(
                        'type' => 'switch',
                        'label' => $this->l('Autoplay'),
                        'name' => 'tzc_autoplay',
                        'is_bool' => true,
                        'desc' => $this->l('Should the slides auto play at start?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        ),
                    ),

                    array(
                        'type' => 'switch',
                        'label' => $this->l('Show Navigation'),
                        'name' => 'tzc_nav',
                        'is_bool' => true,
                        'desc' => $this->l('Should the navigation buttons be displayed?'),
                        'values' => array(
                            array(
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Yes')
                            ),
                            array(
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('No')
                            )
                        ),
                    ),



                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'class' => 'button pull-right'
                )
            )
        );


        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int) Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $this->fields_form = array();
        $helper->module = $this;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'saveBtn';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
                . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues(),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );

        $out = '<iframe src="'.$this->_path.'/banner/banner.html" width="728" height="90" align="center" border="0" style="margin: 10px auto 40px; border:none"></iframe>';
        $out .= $helper->generateForm(array($fields_form));
        return $out;
    }

    /*
     * Process data from Configuration page after form submition.
     */
    public function postProcess() {
        if (Tools::isSubmit('saveBtn')) {
            $languages = Language::getLanguages();
            $config = array();

            $config['items_wide'] = Tools::getValue('items_wide');
            $config['items_desktop'] = Tools::getValue('items_desktop');
            $config['items_desktop_small'] = Tools::getValue('items_desktop_small');
            $config['items_tablet'] = Tools::getValue('items_tablet');
            $config['items_mobile'] = Tools::getValue('items_mobile');
            $config['items_set'] = Tools::getValue('items_set');
            $config['items_number'] = Tools::getValue('items_number');
            $config['slide_speed'] = Tools::getValue('slide_speed');
            $config['tzc_autoplay'] = Tools::getValue('tzc_autoplay');
            $config['tzc_but_show'] = Tools::getValue('tzc_but_show');
            $config['tzc_more_show'] = Tools::getValue('tzc_more_show');
            $config['tzc_qty_show'] = Tools::getValue('tzc_qty_show');
            $config['tzc_new_show'] = Tools::getValue('tzc_new_show');
            $config['tzc_nav'] = Tools::getValue('tzc_nav');
            $config['cat_id'] = Tools::getValue('cat_id');

            foreach ($languages as $lang) {
                $config['title'][$lang['id_lang']] = Tools::getValue('title_'.$lang['id_lang']);
            }

            Configuration::updateValue($this->name, json_encode($config));
            
            return $this->displayConfirmation($this->l('Settings updated'));
        }
    }
    
    /**
     *  Display input values into the form after process
     */
    public function getConfigFieldsValues() {
        return json_decode(Configuration::get($this->name), true);
    }

}
