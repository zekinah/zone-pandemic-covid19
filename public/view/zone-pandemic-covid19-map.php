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
?>
<section id="zn-covid19" class="section global">
    <div class="zn-loading"><span class="covid19">🦠</span></div>
    <div class="zn-covid19__content">
        <div class="has-text-centered mb-3">
            <p class="title is-4">🌎 <?= __('World Heat Map of Covid19 Cases') ?></p>
        </div>
        <div id="zn-covid19__map"></div>
    </div>
</section>