<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       zekinahlecaros.com
 * @since      1.0.0
 *
 * @package    Pandemic_Covid19
 * @subpackage Pandemic_Covid19/admin/partials
 */
?>
<div class="container-fluid">
    <h1 class="zone-title text-center mt-5">Pandemic Covid-19 Data</h1>
    <p><strong>Information:</strong> This plugin displays the recorded global data of all for the total statistics of the Covid-19.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="zone-home form">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Zone IO Shortcode</strong></label>
                                <input class="form-control txt-shortcode" type="text" value="[zone-covid19]" readonly>
                                <small class="pull-left">Show all details</small><br>
                                <strong class="pull-left">Attributes Available to output a specific data.</strong><br>
                                <ul>
                                    <li>country</li>
                                    <li>continent</li>
                                    <li>dark</li>
                                </ul>
                                <strong class="pull-left">Examples Single Output</strong><br>
                                <ul>
                                    <li>[zone-covid19 country="US"]</li>
                                    <li>[zone-covid19 continent="North America"]</li>
                                </ul><hr>
                                <ul>
                                    <li>[zone-covid19 country="US" dark]</li>
                                    <li>[zone-covid19 continent="North America" dark]</li>
                                </ul>
                                <strong class="pull-left">Examples Multiple Output</strong><br>
                                <ul>
                                    <li>[zone-covid19 country="US,Philippines"]</li>
                                    <li>[zone-covid19 continent="North America, Asia"]</li>
                                </ul><hr>
                                <ul>
                                    <li>[zone-covid19 country="US,Philippines" dark]</li>
                                    <li>[zone-covid19 continent="North America, Asia" dark]</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Zone IO using Category ID Shortcode</strong></label>
                                <input class="form-control txt-shortcode" type="text" value='[zone-covid19-table]' readonly>
                                <small class="pull-left">Shows all cases.</small><br>
                                <strong class="pull-left">Attributes Available for Table</strong><br>
                                <ul>
                                    <li>dark</li>
                                </ul>
                                <strong class="pull-left">Examples</strong><br>
                                <ul>
                                    <li>[zone-covid19-table]</li>
                                    <li>[zone-covid19-table dark]</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="mt-2"><strong>Credits</strong></p>
    <p>https://github.com/disease-sh/API - <a href="//github.com/disease-sh/API/blob/master/privacy.md">Privacy Policy</a></p>
    <p class="mt-2"><strong>Sources</strong></p>
    <p><a href="https://github.com/CSSEGISandData/COVID-19">Johns Hopkins University</a></p>
    <p><a href="https://github.com/nytimes/covid-19-data">New York Times</a></p>
    <p><a href="https://www.worldometers.info/">Worldometers</a></p>
</div>
