<?php
// outputs have their own namespace, for automtic class loading to work
namespace block_forumslist\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use templatable;
use renderer_base;

// the renderable for the forums list
class forums_list implements renderable, templatable {

    // initializing the renderable with the data it needs
    public function __construct($forums) {
        $this->forums = $forums;
    }

    // export for the template
    public function export_for_template(renderer_base $output) {
        global $DB;

        // The rendering context is the object to render
        $renderingcontext = new \stdClass();

        // to render: a list of forums
        $renderingcontext->forums = $this->forums;

        // Return renderable.
        return $renderingcontext;
    }
}
