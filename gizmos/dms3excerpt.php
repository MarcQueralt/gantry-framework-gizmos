<?php

defined('GANTRY_VERSION') or die();

gantry_import('core.gantrygizmo');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoDms3Excerpt extends GantryGizmo {

    var $_name = 'dms3excerpt';

    function query_parsed_init() {

        /** @global $gantry Gantry */
        global $gantry;

        add_filter('excerpt_more', 'dms3_excerpt_more');
        if($gantry->get('dms3excerpt-length-control')):
            $length=$gantry->get('dms3excerpt-length');
            add_filter('excerpt_length','dms3_excerpt_length',999);
        endif;
    }

}

function dms3_excerpt_more($more) {
    global $gantry;
    $more = $gantry->get('dms3excerpt-text');
    $link = $gantry->get('dms3excerpt-linkable');
    if ($link):
        return '<a class="dms3 read-more" href="'. get_permalink( get_the_ID() ) . '">'.$more.'</a>';
    else:
        return $more;
    endif;
}

function dms3_excerpt_length($length) {
    global $gantry;
    $newlength = (int) $gantry->get('dms3excerpt-length');
    return $newlength;
}