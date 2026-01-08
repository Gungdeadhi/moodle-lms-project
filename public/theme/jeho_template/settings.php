<?php 
defined('MOODLE_INTERNAL') || die();

// This class use for setting management theme jeho_template in moodle web

if ($ADMIN->fulltree) {

    // General settings page
    $settings = new theme_boost_admin_settingspage_tabs('themesettingjeho_template', get_string('configtitle', 'theme_jeho_template'));
    $page = new admin_settingpage('theme_jeho_template_general', get_string('generalsettings', 'theme_boost'));

    // uneeded blocks
    $setting = new admin_setting_configtext('theme_jeho_template/unaddableblocks',
        get_string('unaddableblocks', 'theme_boost'), get_string('unaddableblocks_desc', 'theme_boost'), '', PARAM_TEXT);
    $page->add($setting);

    // preset
    $name = 'theme_jeho_template/preset';
    $title = get_string('preset', 'theme_jeho_template');
    $description = get_string('preset_desc', 'theme_jeho_template');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_jeho_template', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }

    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configthemepreset($name, $title, $description, $default, $choices, 'jeho_template');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // preset files settings
    $name = 'theme_jeho_template/presetfiles';
    $title = get_string('presetfiles', 'theme_jeho_template');
    $description = get_string('presetfiles_desc', 'theme_jeho_template');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Background image settings
    $name = 'theme_jeho_template/backgroundimage';
    $title = get_string('backgroundimage', 'theme_boost');
    $description = get_string('backgroundimage_desc', 'theme_boost');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    $name = 'theme_jeho_template/loginbackgroundimage';
    $title = get_string('loginbackgroundimage', 'theme_boost');
    $description = get_string('loginbackgroundimage_desc', 'theme_boost');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbackgroundimage');
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    // Image poster dashboard settings
    $name = 'theme_jeho_template/imageposter';
    $title = get_string('imageposter', 'theme_jeho_template');
    $description = get_string('imageposter_desc', 'theme_jeho_template');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'imageposter');
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    // Variable body color
    $name = 'theme_jeho_template/brandcolor';
    $title = get_string('brandcolor', 'theme_boost');
    $description = get_string('brandcolor_desc', 'theme_boost');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    $settings->add($page);


    // Advanced Settings Page 
    $page = new admin_settingpage('theme_jeho_template_advanced', get_string('advancedsettings', 'theme_boost'));

    // Raw SCSS to include before the content
    $setting = new admin_setting_scsscode('theme_jeho_template/scsspre', get_string('rawscsspre', 'theme_boost'), 
        get_string('rawscsspre_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    // Raw SCSS to include after the content
    $setting = new admin_setting_scsscode('theme_jeho_template/scss', get_string('rawscss', 'theme_boost'),
        get_string('rawscss_desc', 'theme_boost'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_cache');
    $page->add($setting);

    $settings->add($page);
}