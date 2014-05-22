<?php
/**
 * @version   $Id: analytics.php 59361 2013-03-13 23:10:27Z btowles $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2014 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
defined('GANTRY_VERSION') or die();

gantry_import('core.gantrygizmo');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoDMS3Analytics extends GantryGizmo {

    var $_name = 'dms3analytics';

    function init() {
        /** @global $gantry Gantry */
        global $gantry;
        ob_start();
        // start of Google Analytics javascript
        ?>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $this->get('code'); ?>']);
		_gaq.push(['_trackPageview']);
                
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
        <?php
        // end of Google Analytics javascript
        $gantry->addInlineScript(ob_get_clean());
    }

}
