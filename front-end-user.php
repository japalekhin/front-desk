<?php

/*
  Plugin Name: Front-End User
  Plugin URI:  https://alekhin.llemos.com/front-end-user
  Description: A WP plugin that enables front-end user functionality including login, register, password recovery and profile editor.
  Version:     1.0.0.20170613
  Author:      Alekhin
  Author URI:  https://alekhin.llemos.com
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: frontenduser
  Domain Path: /languages

  Front-End User is free software: you can redistribute it and/or
  modify it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or any later
  version.

  Front-End User is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
  FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
  details.

  You should have received a copy of the GNU General Public License along with
  Front-End User.
  If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

namespace Alekhin\FrontEndUser;

if (!defined('ABSPATH')) {
    echo 'really?';
    exit;
}

define(__NAMESPACE__ . '\version', '1.0.0.20170613' . (WP_DEBUG ? '.' . time() : ''));
define(__NAMESPACE__ . '\dir', plugin_dir_path(__FILE__));
define(__NAMESPACE__ . '\url', plugin_dir_url(__FILE__));

require_once dir . 'classes/vendor/autoload.php';

$symfony_loader = new \Symfony\Component\ClassLoader\Psr4ClassLoader();
$symfony_loader->addPrefix('Alekhin\\', dir . 'classes/Alekhin');
$symfony_loader->register();

\Alekhin\FrontEndUser\Admin\Admin::initialize();
\Alekhin\FrontEndUser\Admin\Theme::initialize();
\Alekhin\FrontEndUser\Admin\Pages::initialize();
\Alekhin\FrontEndUser\Admin\Menu::initialize();
\Alekhin\FrontEndUser\Admin\Settings::initialize();

\Alekhin\FrontEndUser\Menu::initialize();
\Alekhin\FrontEndUser\Login::initialize();
\Alekhin\FrontEndUser\Register::initialize();
\Alekhin\FrontEndUser\Reset::initialize();
\Alekhin\FrontEndUser\Recover::initialize();
//\Alekhin\FrontEndUser\TwoStep::initialize();

$loader = new \Alekhin\WebsiteHelpers\ReturnObject();

// TODO: basic styles
// TODO: limit failed login attempts
// TODO: profile page
// --------------- BREAKING POINT ---------------
// TODO: additional fields in profile and registration (filter)
// TODO: action to save additional fields
// TODO: add auto page setup for pages (single and multi)
// TODO: delete account in profile page
// TODO: add default user role on admin/settings
// TODO: add 2-step authentication