<?php

/**
 * Plugin Name: Карта сервиса Planograph с легендой
 * Version: 0.0.1
 * Author: Гусев Андрей (gusevandrey1988@gmail.com)
 */

define('FEATURE_PLANOGRAPH_LEGEND_ROOT', plugin_dir_path(__FILE__));

require_once FEATURE_PLANOGRAPH_LEGEND_ROOT . '/src/FeaturePlanographLegendPlugin.php';

register_activation_hook( __FILE__, array( Feature_Planograph_Legend_Plugin::class, 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( Feature_Planograph_Legend_Plugin::class, 'plugin_deactivation' ) );

add_action( 'init', array( Feature_Planograph_Legend_Plugin::class, 'init' ) );