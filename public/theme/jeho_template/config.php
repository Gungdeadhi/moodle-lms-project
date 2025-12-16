<?php
defined('MOODLE_INTERNAL') || die();

$THEME->name = 'jeho_template';
$THEME->parents = ['boost'];
$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->usefallback = true;

$THEME->iconsystem = \theme_boost\output\icon_system::class;
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->scss = function($theme) {
    return theme_jeho_template_get_main_scss_content($theme);
};
