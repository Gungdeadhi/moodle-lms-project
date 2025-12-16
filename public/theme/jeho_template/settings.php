<?php 
defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    // General settings page
    $settings = new theme_boost_admin_settingspage_tabs('themesettingjeho_template', get_string('configtitle', 'theme_jeho_template'));
    $page = new admin_settingpage('theme_jeho_template', get_string('generalsettings', 'theme_boost'));

    $name = 'theme_jeho_template/preset';
    $title = get_string('preset', 'theme_jeho_template');
    $description = get_string('preset_desc', 'theme_jeho_template');
    $default = 'default.scss';

    $choices = [
        'default.scss' => 'default.scss',
        'plain.scss'   => 'plain.scss',
    ];

    $presetsetting = new admin_setting_configthemepreset(
        $name,
        $title,
        $description,
        $default,
        $choices,
        'jeho_template'
    );

    $presetsetting->set_updatedcallback('theme_reset_all_caches');
    $page->add($presetsetting);

    $settings->add($page);

    //Advanced settings page
    $page = new admin_settingpage(
        'theme_jeho_template_advanced',
        get_string('advancedsettings', 'theme_jeho_template')
    );

    $setting = new admin_setting_scsscode(
        'theme_jeho_template/scsspre',
        get_string('rawscsspre', 'theme_boost'),
        get_string('rawscsspre_desc', 'theme_boost'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $setting = new admin_setting_scsscode(
        'theme_jeho_template/scss',
        get_string('rawscss', 'theme_boost'),
        get_string('rawscss_desc', 'theme_boost'),
        '',
        PARAM_RAW
    );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}