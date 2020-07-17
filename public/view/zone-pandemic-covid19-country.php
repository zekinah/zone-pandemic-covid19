<?php

/**
 * By Country Statistic of Covid19
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
<input id="country" type="hidden" value="<?=$atts['country']?>">
<section id="zn-covid19-country" class="section">
    <div class="card by-country">
        <div class="zn-loading"><span class="covid19">🦠</span></div>
        <div class="card-content">
            <div class="zn-title">
                <div class="flag mr-3"><img src="🗺️" alt="<?=$atts['country']?>"></div>
                <div class="zn-subtitle">
                    <h2 id="zn-country-name" class="title is-3"></h2>
                    <h3 id="zn-country-population" class="subtitle is-5 mb-3"><?= __('Population: ') ?></h3>
                </div>
            </div>
            <div class="zn-statistics">
                <div class="country-stats">
                    <h3 class="title is-3"><?=__('🧑🏻‍🤝‍🧑🏽 Cases: ')?> <span id="zn-country-cases" class="title is-3"></span></h3> 
                </div>
                <div class="columns is-desktop">
                    <div class="column">
                        <div class="country-stats">
                            <h3 class="title is-4"><?=__('🤧 Active')?></h3>
                            <div class="country-stats__values">
                                <h3 id="zn-country-active" class="title is-3"></h3>
                                <h5 class="subtitle is-5">(+<span id="zn-country-activePerM"></span>)</h5>
                            </div>
                        </div>
                        <div class="country-stats">
                            <h3 class="title is-4"><?=__('😄 Recovered')?></h3>
                            <div class="country-stats__values">
                                <h3 id="zn-country-recovered" class="title is-3"></h3>
                                <h5 class="subtitle is-5">(+<span id="zn-country-recoveredPerM"></span>)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="country-stats">
                            <h3 class="title is-4"><?=__('😷 Critical')?></h3>
                            <div class="country-stats__values">
                                <h3 id="zn-country-critical" class="title is-3"></h3>
                                <h5 class="subtitle is-5">(+<span id="zn-country-criticalPerM"></span>)</h5>
                            </div>
                        </div>
                        <div class="country-stats">
                            <h3 class="title is-4"><?=__('💀 Deaths')?></h3>
                            <div class="country-stats__values">
                                <h3 id="zn-country-deaths" class="title is-3"></h3>
                                <h5 class="subtitle is-5">(+<span id="zn-country-deathsPerM"></span>)</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>