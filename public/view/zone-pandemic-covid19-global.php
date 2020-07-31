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
        <div class="has-text-centered mb-2">
            <p id="zn-global-cases" class="title is-1"></p>
            <p class="subtitle is-4">🌎 <?= __('Global Total') ?></p>
        </div>
        <div><p class="subtitle is-6"><?= __('Affected Countries: ') ?><span id="zn-global-affected-countries"></span></p></div>
        <div><p class="subtitle is-6"><?= __('Last update on: ') ?><span id="zn-global-updates"></span></p></div>
        <div class="columns is-multiline is-desktop mt-1">
            <div class="column is-6-desktop">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">🤧</div>
                            <div class="zn-subtitle">
                                <p class="title is-5"><?= __('Active') ?></p>
                                <p class="subtitle is-6">(<?= __('+onePerMillion') ?>)</p>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <p id="zn-global-active" class="title is-3"></p>
                            <p class="subtitle is-5">(+<span id="zn-global-activePerM"></span>)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-6-desktop">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">😄</div>
                            <div class="zn-subtitle">
                                <p class="title is-5"><?= __('Recovered') ?></p>
                                <p class="subtitle is-6">(<?= __('+onePerMillion') ?>)</p>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <p id="zn-global-recovered" class="title is-3"></p>
                            <p class="subtitle is-5">(+<span id="zn-global-recoveredPerM"></span>)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-6-desktop">
                <div class="card">
                    <div class="card-content">
                        <div class="zn-title">
                            <div class="emoji mr-2">😷</div>
                            <div class="zn-subtitle">
                                <p class="title is-5"><?= __('Critical') ?></p>
                                <p class="subtitle is-6">(<?= __('+onePerMillion') ?>)</p>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <p id="zn-global-critical" class="title is-3"></p>
                            <p class="subtitle is-5">(+<span id="zn-global-criticalPerM"></span>)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-6-desktop">
                <div class="card">
                    <div class="card-content">
                    <div class="zn-title">
                            <div class="emoji mr-2">💀</div>
                            <div class="zn-subtitle">
                                <p class="title is-5"><?= __('Deaths') ?></p>
                                <p class="subtitle is-6">(<?= __('+onePerMillion') ?>)</p>
                            </div>
                        </div>
                        <div class="zn-statistics">
                            <p id="zn-global-deaths" class="title is-3"></p>
                            <p class="subtitle is-5">(+<span id="zn-global-deathsPerM"></span>)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
