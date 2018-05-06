<?php

require_once("{$CFG->libdir}/formslib.php");

class abhijit_form extends moodleform {
	function definition() {
		$mform =& $this->_form;
		$mform->addElement('header', 'displayinfo', get_string('textfields', 'block_abhijit'));
	
		$mform->addElement('text', 'pagetitle', get_string('pagetitle', 'block_abhijit'));
		$mform->setType('pagetitle', PARAM_RAW);
		$mform->addRule('pagetitle', null, 'required', null, 'client');
		 
		// add display text field
		$mform->addElement('htmleditor', 'displaytext', get_string('displayedhtml', 'block_abhijit'));
		$mform->setType('displaytext', PARAM_RAW);
		$mform->addRule('displaytext', null, 'required', null, 'client');
		$mform->addElement('filepicker', 'filename', get_string('file'), null, array('accepted_types' => '*'));
		$mform->addElement('header', 'picfield', get_string('picturefields', 'block_simplehtml'), null, false);

		$mform->addElement('selectyesno', 'displaypicture', get_string('displaypicture', 'block_simplehtml'));
		$mform->setDefault('displaypicture', 1);
	
		$mform->addElement('hidden', 'blockid');
		$mform->addElement('hidden', 'courseid');
		$this->add_action_buttons();
	}
}
?>
