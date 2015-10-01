<?php

/**
* Tutorial Controller
*/
class Tutorials
{
    public function foreachLoop() {
        $data = array(
            'title' => 'Basic foreach() Tutorial',
            'description' => 'It\'s a tutorial about foreach loops.',
        );

        return view('tutorials/foreach_loop', $data);
    }

}
