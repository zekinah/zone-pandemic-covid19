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
?>
<section id="zn-covid19" class="section">
<?php
/** World Cases */
// if (empty($atts)) {
?>
    <div class="title has-text-centered">
        <h2 id="zn-country-cases" class="is-2"></h2>
        <h4 class="is-4"><?= __('Global Total') ?></h4>
    </div>
    <div><p class="subtitle is-4"><?= __('Affected Countries: ') ?><span id="zn-country-affected-countries"></span></p></div>
    <div><p class="subtitle is-4"><?= __('Last update on: ') ?><span id="zn-country-updates"></span></p></div>
    <div class="columns is-desktop">
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <h2 class="title is-3">🤧 Active</h2>
                    <h5 class="subtitle is-6 mb-3">(+onePerMillion)</h5>
                    <h3 id="zn-country-active" class="title is-3"></h3>
                    <h5 class="subtitle is-5">(+<span id="zn-country-activePerM"></span>)</h5>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <h2 class="title is-3">😄 Recovered</h2>
                    <h5 class="subtitle is-6">(+onePerMillion)</h5>
                    <h3 id="zn-country-recovered" class="title is-3"></h3>
                    <h5 class="subtitle is-5">(+<span id="zn-country-recoveredPerM"></span>)</h5>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <h2 class="title is-3">😷 Critical</h2>
                    <h5 class="subtitle is-6">(+onePerMillion)</h5>
                    <h3 id="zn-country-critical" class="title is-3"></h3>
                    <h5 class="subtitle is-5">(+<span id="zn-country-criticalPerM"></span>)</h5>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <h2 class="title is-3">💀 Deaths</h2>
                    <h5 class="subtitle is-6">(+onePerMillion)</h5>
                    <h3 id="zn-country-deaths" class="title is-3"></h3>
                    <h5 class="subtitle is-5">(+<span id="zn-country-deathsPerM"></span>)</h5>
                </div>
            </div>
        </div>
    </div>
<?php
// }
?>
</section>
