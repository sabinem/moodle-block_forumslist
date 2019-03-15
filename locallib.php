<?php
// here are all custom functions for the block

require_once($CFG->dirroot.'/mod/forum/lib.php');
require_once($CFG->dirroot.'/lib/coursecatlib.php');
require_once($CFG->dirroot.'/course/lib.php');

// enrich forum data
function enrich_forum_data($forum){
    global $DB;

    // the course
    $course = get_course($forum->course);
    $forum->coursename = $course->fullname;

    // get the category
    $category = $DB->get_record('course_categories', (array('id' => $course->category)));
    $forum->category = $category->name;

    // get the course url
    $forum->courseurl = new \moodle_url("/course/view.php", array('id' => $course->id,
        'notifyeditingon' => 1));

    // get the forum url
    $forum->forumurl = new \moodle_url("/mod/forum/view.php", array('id' => $forum->coursemodule));
}

// builds the data to be rendered
function get_forums_list() {
    // get the users courses
    $courses = enrol_get_my_courses();

    // get all forums to these courses
    $forums = get_all_instances_in_courses('forum', $courses);


    foreach ($forums as $forum) {
        enrich_forum_data($forum);
    }
    return $forums;
}


