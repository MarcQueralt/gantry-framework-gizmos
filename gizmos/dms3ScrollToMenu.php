<?php

/**
 * @version   1.1
 * @author    DeMomentSomTres http://demomentsomtres.com
 * @copyright Copyright (C) 2014 DeMomentSomTres
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('GANTRY_VERSION') or die();

gantry_import('core.gantrygizmo');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoDms3ScrollToMenu extends GantryGizmo {

    var $_name = 'dms3ScrollToMenu';

    function isEnabled() {
        global $gantry;
        $menu_enabled = $this->get('enabled');

        if (1 == (int) $menu_enabled)
            return true;
        return false;
    }

    function query_parsed_init() {

        /** @global $gantry Gantry */
        global $gantry;
        if ($gantry->get('layout-mode', 'responsive') == 'responsive'):
            //$gantry->addScript('dms3ScrollToMenu.js');
            wp_enqueue_script($this->_name,get_template_directory_uri().'/js/dms3ScrollToMenu.js',array('jquery'),'',true);
        endif;
    }

}
