<?php

require_once('../../config.php');
require_once('abhijit_form.php');

global $DB;
global $DB, $OUTPUT, $PAGE;

$courseid = required_param('courseid', PARAM_INT);
$blockid = required_param('blockid', PARAM_INT);
$id = optional_param('id', 0, PARAM_INT);

if(!($course = $DB->get_record('course', array('id' => $courseid)))) {
	print_error('invalidcourse', 'block_abhijit', $courseid);
}

require_login($courseid);
$PAGE->set_url('/blocks/abhijit/view.php', array('id' => $courseid));
$PAGE->set_pagelayout('standard');
$PAGE->set_heading(get_string('edithtml', 'block_abhijit'));

$abhijit = new abhijit_form();
$toform['blockid'] = $blockid;
$toform['courseid'] = $courseid;
$abhijit->set_data($toform);

if($abhijit->is_cancelled()) {
    // Cancelled forms redirect to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $id));
    redirect($courseurl);
} else if ($fromform = $abhijit->get_data()) {
    // We need to add code to appropriately act on and store the submitted data
    // but for now we will just redirect back to the course main page.
    $courseurl = new moodle_url('/course/view.php', array('id' => $courseid));
	//print_object($fromform);
	if (!$DB->insert_record('block_abhijit', $fromform)) 
    	print_error('inserterror', 'block_abhijit');
    redirect($courseurl);
} else {
    // form didn't validate or this is the first display
    $site = get_site();
	$settingsnode = $PAGE->settingsnav->add(get_string('abhijitsettings', 'block_abhijit'));
	$editurl = new moodle_url('/blocks/abhijit/view.php', array('id' => $id, 'courseid' => $courseid, 'blockid' => $blockid));
	$editnode = $settingsnode->add(get_string('editpage', 'block_abhijit'), $editurl);
	$editnode->make_active();
    echo $OUTPUT->header();
    $abhijit->display();
    echo $OUTPUT->footer();
}



/*
echo $OUTPUT->header();
$abhijit->display();
echo $OUTPUT->footer();
*/
