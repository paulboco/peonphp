<?php

/**
* Tutorial Controller
*/
class Tutorial
{
	public function foreach_loop() {
		$data = array(
			'title' => 'Basic foreach() Tutorial',
			'description' => 'It\'s a titorial about each four.',
		);

		return view('tutorials/foreach_loop', $data);
	}

}
