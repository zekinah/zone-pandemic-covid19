<?php

/**
 * World Wide Global Statistic of Covid19
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/public/partials
 * 
 */
$dark = '';
if($atts['dark']){
    $dark = 'dark';
}
?>
<section id="zn-covid19" class="section global <?=$dark?>">
    <div class="zn-loading"><span class="covid19">🦠</span></div>
    <div class="zn-covid19__content">
        <div id="zn-covid19-global"></div>
    </div>
</section>
