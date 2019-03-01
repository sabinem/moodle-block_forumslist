<?php
// ***************************************************************
// this file should be used for the plugins internal functions
// ***************************************************************

defined('MOODLE_INTERNAL') || die();


require_once($CFG->dirroot.'/mod/forum/lib.php');
require_once($CFG->dirroot.'/lib/coursecatlib.php');
require_once($CFG->dirroot.'/course/lib.php');


// ***************************************************************
// plugin setting helper functions
// ***************************************************************



function get_forums_list() {
    $courses = enrol_get_my_courses();
    $forums = get_all_instances_in_courses('forum', $courses);
    return $forums;
}


