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
<div class="zone-card">
    <div class="wrap">
        <h1 class="zone-title">Zone Pandemic Covid19 Data</h1>
        <span class="zone-version">v<?= $this->version ?></span>
    </div>
    <hr class="wp-header-end">
    <div class="container-fluid">
        <?php
        $tab_option = array('Home');
        echo '<ul class="nav nav-tabs nav-tab-wrapper" role="tablist">';
        foreach ($tab_option as $key => $option_setting) {
            if ($key == 0) {
                $class = "nav-tab nav-tab-active active";
            } else {
                $class = "nav-tab";
            }
            echo '<li class="nav-item">';
            echo '<a class="' . $class . '" data-toggle="tab" href="#tab-' . $key . '">' . $option_setting . '</a>';
            echo '</li>';
        }
        echo ' </ul>';
        ?>
        <div class="tab-content">
            <div id="tab-0" class="container-fluid tab-pane nav-tab-active active">
                <h1 class="zone-title text-center mt-5">Pandemic Covid19 Data</h1>
                <p><strong>Information:</strong> This plugin displays the data records of all cases of the Pandemic Covid19 all over the world.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="zone-home form">
                            <div class="card">
                                <div class="form-group">
                                    <label><strong>Zone IO Shortcode</strong></label>
                                    <input class="form-control txt-shortcode" type="text" value="[zone-covid19]" readonly>
                                    <small class="pull-left">Examples</small><br>
                                    <ul>
                                        <li>[zone-covid19 country="US"]</li>
                                        <li>[zone-covid19 continent="North America"]</li>
                                        <li>[zone-covid19 background="#1c1c1c"]</li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label><strong>Zone IO using Category ID Shortcode</strong></label>
                                    <input class="form-control txt-shortcode" type="text" value='[zone-covid19-table]' readonly>
                                    <small class="pull-left">Shows all cases.</small>
                                    <ul>
                                        <li>[zone-covid19-table background="#1c1c1c"]</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-2"><strong>Credits</strong></p>
                <p>https://github.com/disease-sh/API - <a href="//github.com/disease-sh/API/blob/master/privacy.md">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>

