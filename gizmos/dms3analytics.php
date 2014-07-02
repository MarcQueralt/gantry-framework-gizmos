<?php
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
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo $this->get('code'); ?>', 'auto');
        <?php if ($this->get('varIPenabled')): ?>
            ga('set','dimension<?php echo $this->get('varIPid'); ?>','<?php echo $_SERVER['REMOTE_ADDR']; ?>');
        <?php endif; ?>
        <?php if ($this->get('demographicsEnabled')): ?>
            ga('require', 'displayfeatures');
        <?php endif; ?>
        ga('send', 'pageview');
        <?php
        // end of Google Analytics javascript
        $gantry->addInlineScript(ob_get_clean());
    }

}
