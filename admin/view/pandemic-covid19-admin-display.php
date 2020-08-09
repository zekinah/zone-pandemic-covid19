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
    <p id="zone-api"><strong>API Status:</strong> <span id="zone-api__status" class="zone-status"></span></p>
    <hr class="wp-header-end">
    <div class="container-fluid">
        <?php
        $tab_option = array('Home', 'Help');
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
            <div id="tab-0" class="container-fluid tab-pane nav-tab-active active">.
            <!-- Home -->
                <?php require_once('tab-home.php'); ?>
            </div>
            <div id="tab-1" class="container-fluid tab-pane fade"><br>
            <!-- Help -->
                <?php require_once('tab-help.php'); ?>
            </div>
        </div>
    </div>
</div>

