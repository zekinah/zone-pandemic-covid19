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
<input id="country" type="hidden" value="PH">
<section id="zn-covid19" class="section">
    <div class="zn-loading"><span class="covid19">🦠</span></div>
    <div class="zn-covid19__content">
        <div class="title has-text-centered">
            <h2 id="zn-global-cases" class="is-2"></h2>
            <h4 class="is-4">🌎 <?= __('Global Total') ?></h4>
        </div>
        <div><p class="subtitle is-4"><?= __('Affected Countries: ') ?><span id="zn-global-affected-countries"></span></p></div>
        <div><p class="subtitle is-4"><?= __('Last update on: ') ?><span id="zn-global-updates"></span></p></div>
        <div class="columns is-desktop">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">🤧</div>
                            <div class="zn-subtitle">
                                <h2 class="title is-3"><?= __('Active') ?></h2>
                                <h5 class="subtitle is-6">(<?= __('+onePerMillion') ?>)</h5>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <h3 id="zn-global-active" class="title is-3"></h3>
                            <h5 class="subtitle is-5">(+<span id="zn-global-activePerM"></span>)</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">😄</div>
                            <div class="zn-subtitle">
                                <h2 class="title is-3"><?= __('Recovered') ?></h2>
                                <h5 class="subtitle is-6">(<?= __('+onePerMillion') ?>)</h5>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <h3 id="zn-global-recovered" class="title is-3"></h3>
                            <h5 class="subtitle is-5">(+<span id="zn-global-recoveredPerM"></span>)</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">😷</div>
                            <div class="zn-subtitle">
                                <h2 class="title is-3"><?= __('Critical') ?></h2>
                                <h5 class="subtitle is-6">(<?= __('+onePerMillion') ?>)</h5>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <h3 id="zn-global-critical" class="title is-3"></h3>
                            <h5 class="subtitle is-5">(+<span id="zn-global-criticalPerM"></span>)</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                    <div class="zn-title">
                            <div class="emoji mr-2">💀</div>
                            <div class="zn-subtitle">
                                <h2 class="title is-3"><?= __('Deaths') ?></h2>
                                <h5 class="subtitle is-6">(<?= __('+onePerMillion') ?>)</h5>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <h3 id="zn-global-deaths" class="title is-3"></h3>
                            <h5 class="subtitle is-5">(+<span id="zn-global-deathsPerM"></span>)</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
