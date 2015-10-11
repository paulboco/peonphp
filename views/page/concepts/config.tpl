<h2>Configuration</h2>
<p>
    Application configuration variables are simply arrays stored in files in the
    <code>&lt;project>/config</code> directory. For example, Peon is shipped
    with the <code>&lt;project>/config/app.php</code> file which contains:
<pre><code class="php">&lt;?php

return array(

    /*
    |------------------------------------------------------
    | The Application Name
    |------------------------------------------------------
    */

    'name' => 'Peon',

    /*
    |------------------------------------------------------
    | The Application Description
    |------------------------------------------------------
    */

    'description' => 'A very simple PHP framework',

);
</code></pre>

<p>You may get a configuration item's value by calling the <a href="/page/helpers#config">config</a> helper function.</p>

<pre><code class="php">&lt;?php

$description = config('app.description');

echo $description; // prints "<?php e(config('app.description')) ?>"
</code></pre>
</p>


