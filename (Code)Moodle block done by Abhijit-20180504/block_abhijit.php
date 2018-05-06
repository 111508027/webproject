<?php
class block_abhijit extends block_base {
    public function init() {
        $this->title = get_string('abhijit', 'block_abhijit');
    }
	public function applicable_formats() {
		return array ('course-view' => true);
	}
	public function get_content_type() {
		return BLOCK_TYPE_TEXT;
	}
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
	public function get_content() {
		if ($this->content !== null) {
		  return $this->content;
		}
	
		$this->content         =  new stdClass;
		$this->content->text   = 'The content of our Abhijit block!';
		$this->content->footer = 'Footer here...';
		
		//$this->content->text .= json_encode(parent::applicable_formats());
		//return $this->content;
		global $COURSE, $DB;
		$url = new moodle_url('/blocks/abhijit/view.php', array('blockid' => $this->instance->id, 'courseid' => $COURSE->id));
		$this->content->footer = html_writer::link($url, get_string('addpage', 'block_abhijit'));
		/*if (!empty($this->config->text)) {
			$this->content->text = $this->config->text;
		} 
		*/ 
		// This is the new code.
		if ($abhijitpages = $DB->get_records('block_abhijit', array('blockid' => $this->instance->id))) {
			$this->content->text .= html_writer::start_tag('ul');
		foreach ($abhijitpages as $abhijitpage) {
				$pageurl = new moodle_url('/blocks/abhijit/view.php',
					array('blockid' => $this->instance->id, 'courseid' => $COURSE->id,
						'id' => $abhijitpage->id, 'viewpage' => '1'));
				$this->content->text .= html_writer::start_tag('li');
				$this->content->text .= html_writer::link($pageurl, $abhijitpage->pagetitle);
				$this->content->text .= html_writer::end_tag('li');
			}
			$this->content->text .= html_writer::end_tag('ul');
		}	
		return $this->content;
	}
	public function hide_header() {
		return false;
	}
	public function instance_delete() {
		global $DB;
		$DB->delete_records('block_abhijit', array('blockid' => $this->instance->id));
	}
	/*(public function _self_test() {
		return true;
	} */
}
