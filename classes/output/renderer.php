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
 * Fraisa forum aggregator renderer
 *
 * @package block_fraisa_forumaggregator
 * @copyright 2016 onwards Fraisa <http://www.fraisa.com/>
 * @author Liip <https://www.liip.ch/>
 * @author Sabine Maennel <sabine.maennel@liip.ch>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_forumslist\output;
defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;

/**
 * Fraisa forum aggregator renderer
 *
 * @package block_fraisa_forumaggregator
 */
class renderer extends plugin_renderer_base {

    /**
     * Render discussion dashboard block.
     *
     * @param discussions_overview $discussionsoverview The renderable for dashboard block
     * @return string HTML string
     */
    public function render_forumslist($forumslist) {
        // Render dicussion dashboard block.
        return $this->render_from_template(
            'block_forumslist/forums_list',
            $forumslist->export_for_template($this));
    }

}
