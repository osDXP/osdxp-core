<?php
/**
 * Plugin Name:         Open Source DXP Dashboard
 * Description:         An Augmentation of WordPress, creating a task-oriented Digital Experience Platform environment.
 * Plugin URI:          http://www.crowdfavorite.com
 * Author:              Crowd Favorite
 * Author URI:          http://www.crowdfavorite.com
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Version:             1.0
 * License:             GPL2
 * License URI:         https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text domain:         osdxp-dashboard
 *
 * @package osdxp-dashboard
 */

/*
Copyright (C) 2019 Crowd Favorite crowdfavorite@gmail.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

namespace OSDXP_Dashboard;

// phpcs:disable
// Define bootstrap constants
define('OSDXP_DASHBOARD_DIR', plugin_dir_path(__FILE__));
define('OSDXP_DASHBOARD_URL', plugins_url('/', __FILE__));

// Always mention the plugin version (enclose in quotes so it is processed as a string).
define('OSDXP_DASHBOARD_VER', '1.0');
define('OSDXP_DASHBOARD_SITE', 'https://opensourcedxp.com/');

define('OSDXP_DASHBOARD_PLUGIN_NAME', 'Open Source DXP Dashboard');
define('OSDXP_DASHBOARD_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('OSDXP_DASHBOARD_PLUGIN_LOGO', OSDXP_DASHBOARD_URL . 'assets/images/sample.png');
define('OSDXP_DASHBOARD_PLACEHOLDER_IMAGE_URL', OSDXP_DASHBOARD_URL . 'assets/images/placeholder.png');

// Defining various licensing and update checks constants.
define('OSDXP_DASHBOARD_GET_KEY_URL', 'https://modules.osdxp.org');
define('OSDXP_DASHBOARD_API_URL', OSDXP_DASHBOARD_GET_KEY_URL . '/api');
define('OSDXP_DASHBOARD_UPDATE_URL', 'https://osdxp.org/modules/osdxp-dashboard.json');
define('OSDXP_DASHBOARD_UPDATE_API_URL', OSDXP_DASHBOARD_API_URL . '/update');
define('OSDXP_DASHBOARD_API_KEY_OPTION', 'osdxp_license');
define('OSDXP_DASHBOARD_LICENSE_DATA_OPTION_NAME', 'osdxp_license_data');
define('OSDXP_DASHBOARD_LICENSE_ERROR_TRANSIENT_NAME', 'osdxp_authorization_error');

// Define available modules settings
define('OSDXP_DASHBOARD_AVAILABLE_MODULES_CRON_SCHEDULE', 'hourly');
define('OSDXP_DASHBOARD_AVAILABLE_MODULES_LIST_URL', OSDXP_DASHBOARD_API_URL . '/modules');
define('OSDXP_DASHBOARD_AVAILABLE_MODULES_TRANSIENT', 'osdxp-dashboard-modules-transient');
define('OSDXP_DASHBOARD_AVAILABLE_MODULES_TRANSIENT_EXPIRE', 4 * HOUR_IN_SECONDS);

define('OSDXP_DASHBOARD_REST_NAMESPACE', 'osdxp-dashboard/v1');

// Define RSS settings
if (!defined('OSDXP_DASHBOARD_NEWS_RSS_URL')) {
	define('OSDXP_DASHBOARD_NEWS_RSS_URL', 'https://crowdfavorite.com/feed/'); // @TODO: change this.
}

if (!defined('OSDXP_DASHBOARD_NEWS_RSS_MAX_ITEMS_COUNT')) {
	define('OSDXP_DASHBOARD_NEWS_RSS_MAX_ITEMS_COUNT', 5); // @TODO: change this.
}

// Define the plugin assets handle, this is used to give unique names to the plugin scripts.
define('OSDXP_DASHBOARD_HANDLE', 'osdxp-dashboard');
define('OSDXP_DASHBOARD_LOCALIZED_OBJECT_NAME', 'OSDXPDashboard');

// Define page types available to add
define('OSDXP_DASHBOARD_MENU_TYPE_MENU', 'menu');
define('OSDXP_DASHBOARD_MENU_TYPE_SUBMENU', 'submenu');
define('OSDXP_DASHBOARD_MENU_TYPE_ENDPOINT', 'endpoint');
// phpcs:enable
// We need get_plugins to filter for modules
if (!function_exists('get_plugins')) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

require_once('vendor/autoload.php');

register_deactivation_hook(__FILE__, __NAMESPACE__ . '\\osdxp_deactivate');
register_activation_hook(__FILE__, __NAMESPACE__ . '\\osdxp_activate');
