<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/public/partials
 */
$dark = '';
if($atts['dark']){
    $dark = 'dark';
}
?>
<section id="zn-covid19-table" class="section">
    <div class="zn-loading"><span class="covid19">🦠</span></div>
    <div class="zn-covid19__content">
        <div class="has-text-centered mb-3">
            <p class="title is-4">🌎 <?= __('World') ?></p>
        </div>
        <table id="tbl-covid19data" class="display nowrap <?=$dark?>" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Country</th>
                    <th>Active</th>
                    <th>Cases</th>
                    <th>Tested</th>
                    <th>Recovered</th>
                    <th>Deaths</th>
                </tr>
            </thead>
        </table>
    </div>
</section
