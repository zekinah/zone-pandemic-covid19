<?php

/**
 * By Continent Statistic of Covid19
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
<section id="zn-covid19" class="section">
    <div class="card">
        <div class="card-content">
            <div class="zn-title">
                <div class="emoji mr-2">🗺️</div>
                <div class="zn-subtitle">
                    <h2 class="title is-3"id="zn-country">Active</h2>
                    <h5 class="subtitle is-6 mb-3">(+onePerMillion)</h5>
                </div>
            </div>
            <div class="zn-statistics">
                <h3 id="zn-country-active" class="title is-3"></h3>
                <h5 class="subtitle is-5">(+<span id="zn-country-activePerM"></span>)</h5>
            </div>
        </div>
    </div>
</section>