<?php


// for own plugin logic
require_once($CFG->dirroot.'/blocks/forumslist/locallib.php');

// this extend the block base class from moodle core
class block_forumslist extends block_base {

    // ********************************************************************************
    // overwriting moodles own block methods taken from blocks/moodleblockclass.php
    // ********************************************************************************

    // there has to be always an init function for a block
    public function init() {
        //
        $this->title = "Forumslist";
    }
    // The PHP tag and the curly bracket for the class definition
    // will only be closed after there is another function added in the next section.
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }


        $forums = get_forums_list();

        // Render discussions.
        $renderable = new \block_forumslist\output\forums_list($forums);
        $renderer = $this->page->get_renderer('block_forumslist');

        $this->content = new stdClass;
        $this->content->footer = '';
        $this->content->text = $renderer->render($renderable);

        return $this->content;

    }


    // this block is only allowed on the users dashboard
    public function applicable_formats() {
        return array('my' => true);
    }

    // hide the block instance header on the page if the block is configured in that way
    public function hide_header() {
        return False;
    }

    // important when there are admin settings, otherwise, they will not show up
    public function has_config() {
        return False;
    }


}