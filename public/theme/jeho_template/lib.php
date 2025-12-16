<?php
defined('MOODLE_INTERNAL') || die();

// function theme_jeho_template_get_main_scss_content($theme) {
//     $parent = theme_config::load('boost');
//     $scss = file_get_contents($parent->dir . '/scss/preset/default.scss');

//     $childpreset = $theme->dir . '/scss/preset/default.scss';
//     if (file_exists($childpreset)) {
//         $scss .= "\n" . file_get_contents($childpreset);
//     }
//     return $scss;
// }   

function theme_jeho_template_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;

    $fs = get_file_storage();
    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/jeho_template/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/jeho_template/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_jeho_template', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        $scss .= file_get_contents($CFG->dirroot . '/theme/jeho_template/scss/preset/default.scss');
    }

    return $scss;
}