<?php

require_once($CFG->dirroot.'/blocks/forumslist/locallib.php');

// we extend the block class of moodle
class block_forumslist extends block_base {

    // there has to be always an init function for a block
    public function init() {
        // the init function sets the block title
        $this->title = "Forumslist";
    }

    public function get_content() {

        // the content of the block is taken from the cache if possible
        if ($this->content !== null) {
            return $this->content;
        }

        // now we get the data
        $forums = get_forums_list();

        // the renderable to render the data is initialized with the data
        $renderable = new \block_forumslist\output\forums_list($forums);

        // the page has a renderer for every component on it
        $renderer = $this->page->get_renderer('block_forumslist');

        // now we build the content if it hasn't been returned from the cach
        $this->content = new stdClass;
        // there is a footer
        $this->content->footer = '';
        // and the content is build by the renderer receiving the renderable
        $this->content->text = $renderer->render($renderable);

        // the content is then returned
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