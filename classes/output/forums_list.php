<?php
// This file is part of the Fraisa Moodle
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Fraisa forum aggregator dashboard block as renderable component
 *
 * @package block_fraisa_forumaggregator
 * @copyright 2016 onwards Fraisa <http://www.fraisa.com/>
 * @author Liip <https://www.liip.ch/>
 * @author Sabine Maennel <sabine.maennel@liip.ch>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_forumslist\output;
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/lib/coursecatlib.php');
require_once($CFG->dirroot.'/course/lib.php');

use renderable;
use templatable;
use renderer_base;

global $CFG;

/**
 * Renderable for the forumaggregator block on the dashboard.
 */
class forums_list implements renderable, templatable {

    /**
     * Block initialization
     */
    public function __construct($forums) {
        $this->forums = $forums;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output
     * @return array of rendering context for the template
     */
    public function export_for_template(renderer_base $output) {
        global $DB;

        // Link to the Forum.
        $renderingcontext = new \stdClass();
        // Add forums list to renderable.
        $renderingcontext->forums = array();


        foreach ($this->forums as $forum){
            $displayforum = new \stdClass();
            $displayforum->name = $forum->name;
            $displayforum->type = $forum->type;
            $course = \get_course($forum->course);
            $displayforum->course = $course->fullname;
            $category = $DB->get_record('course_categories', (array('id' => $course->category)));
            $displayforum->category = $category->name;

            $displayforum->courseurl = new \moodle_url("/course/view.php", array('id' => $course->id,
                'notifyeditingon' => 1));

            $renderingcontext->forums[] = $displayforum;
        }

        // Return renderable.
        return $renderingcontext;
    }
}
