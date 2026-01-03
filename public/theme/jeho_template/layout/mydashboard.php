<?php

defined('MOODLE_INTERNAL') || die();

$templatecontext = [];
$templatecontext = $OUTPUT->get_template_context();

// special addition to the dashboard
$templatecontext['isdashboard'] = true;
$templatecontext['username'] = username($USER);

echo $OUTPUT->render_from_template('theme_jeho_template/drawers', $templatecontext);