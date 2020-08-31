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
 * @subpackage Pandemic_Covid19/admin/view
 */
?>
<div class="container-fluid">
    <h1 class="zone-title text-center">Pandemic Covid-19 Data</h1>
    <p><strong>Information:</strong> This plugin displays the recorded global data of all for the total statistics of the Covid-19. Use shortcode or widgets from elementor to output the latest data.</p>
    <p><strong>Website:</strong> <a href="https://pandemiccovid19.netlify.app/" target="_blank">Pandemic Covid19</a></p>
    <div class="row">
        <div class="col-md-12">
            <div class="zone-home form">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Zone Covid-19 Shortcode</strong></label>
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
                                    <li>[zone-covid19 country="US" dark="true"]</li>
                                    <li>[zone-covid19 continent="North America" dark="true"]</li>
                                </ul>
                                <strong class="pull-left">Examples Multiple Output</strong><br>
                                <ul>
                                    <li>[zone-covid19 country="US,Philippines"]</li>
                                    <li>[zone-covid19 continent="North America, Asia"]</li>
                                </ul><hr>
                                <ul>
                                    <li>[zone-covid19 country="US,Philippines" dark="true"]</li>
                                    <li>[zone-covid19 continent="North America, Asia" dark="true"]</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Zone Covid-19 Table Shortcode</strong></label>
                                <input class="form-control txt-shortcode" type="text" value='[zone-covid19-table]' readonly>
                                <small class="pull-left">Shows all cases.</small><br>
                            </div><hr>
                            <div class="form-group">
                                <label><strong>Zone Covid-19 History Graph Shortcode</strong></label>
                                <input class="form-control txt-shortcode" type="text" value='[zone-covid19-history-graph]' readonly>
                                <small class="pull-left">Shows all cases.</small><br>
                            </div><hr>
                            <div class="form-group">
                                <label><strong>Zone Covid-19 World Map Shortcode</strong></label>
                                <input class="form-control txt-shortcode" type="text" value='[zone-covid19-map]' readonly>
                                <small class="pull-left">Shows all cases.</small><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="mt-2"><strong>API Used: </strong></p>
    <p><a href="https://github.com/disease-sh/API">Disease API</a> - <a href="//github.com/disease-sh/API/blob/master/privacy.md">Privacy Policy</a></p>
    <p class="mt-2"><strong>Data Sources:</strong></p>
    <p><a href="https://github.com/CSSEGISandData/COVID-19">Johns Hopkins University</a></p>
    <p><a href="https://github.com/nytimes/covid-19-data">New York Times</a></p>
    <p><a href="https://www.worldometers.info/">Worldometers</a></p>
</div>
