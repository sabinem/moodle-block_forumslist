<?php

// outputs have their own namespace, for automtic class loading to work
namespace block_forumslist\output;

defined('MOODLE_INTERNAL') || die;

// renderers extend a moodle renderer
use plugin_renderer_base;

// now the renderer class is defined
class renderer extends plugin_renderer_base {

    // we add a new function, that has a renderable as its argument

    public function render_forumslist($forumslist) {

        // the renderer has a method that renderes from template
        return $this->render_from_template(

            // special: we give it the template it needs
            'block_forumslist/forums_list',

            // the renderable has a method export for template that we can call to fill the template
            $forumslist->export_for_template($this));
    }

}
