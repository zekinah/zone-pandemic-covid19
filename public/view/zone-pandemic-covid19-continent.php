<?php

/**
 * By continent Statistic of Covid19
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
    <div class="zn-loading"><span class="covid19">🦠</span></div>
    <div class="zn-covid19__content">
        <div class="columns is-multiline">
            <div class="column is-6">
                <div class="card by-continent">
                    <div class="card-content">
                        <div class="zn-title">
                            <div id="zn-continent-globe" class="continent mr-3"></div>
                            <div class="zn-subtitle">
                                <p id="zn-continent-name" class="title is-4"></p>
                                <p id="zn-continent-population" class="subtitle is-6 mb-3"><?= __('Population: ') ?></p>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <div class="continent-stats">
                                <span class="emoji mr-1"><?=__('🧑🏻‍🤝‍🧑🏽')?></span>
                                <p class="title is-6"><?=__(' Cases: ')?> <span id="zn-continent-cases" class="title is-4"></span></p> 
                            </div>
                            <div class="columns is-desktop">
                                <div class="column">
                                    <div class="continent-stats">
                                        <div class="mr-1"><span class="emoji"><?=__('🤧')?></span></div>
                                        <div class="continent-stats__values">
                                            <span class="title is-6"><?=__('Active')?></span>
                                            <p id="zn-continent-active" class="title is-5"></p>
                                            <p class="subtitle is-6">(+<span id="zn-continent-activePerM"></span>)</p>
                                        </div>
                                    </div>
                                    <div class="continent-stats">
                                        <div class="mr-1"><span class="emoji"><?=__('😄')?></span></div>
                                        <div class="continent-stats__values">
                                            <span class="title is-6"><?=__('Recovered')?></span>
                                            <p id="zn-continent-recovered" class="title is-5"></p>
                                            <p class="subtitle is-6">(+<span id="zn-continent-recoveredPerM"></span>)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="continent-stats">
                                        <div class="mr-1"><span class="emoji"><?=__('😷')?></span></div>
                                        <div class="continent-stats__values">
                                            <span class="title is-6"><?=__('Critical')?></span>
                                            <p id="zn-continent-critical" class="title is-5"></p>
                                            <p class="subtitle is-6">(+<span id="zn-continent-criticalPerM"></span>)</p>
                                        </div>
                                    </div>
                                    <div class="continent-stats">
                                        <div class="mr-1"><span class="emoji"><?=__('💀')?></span></div>
                                        <div class="continent-stats__values">
                                            <span class="title is-6"><?=__('Deaths')?></span>
                                            <p id="zn-continent-deaths" class="title is-5"></p>
                                            <p class="subtitle is-6">(+<span id="zn-continent-deathsPerM"></span>)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>