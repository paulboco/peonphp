<div id="<?php echo $id ?>" class="function-definition">
    <h3>segment</h3>
    <p>segment - Check a URI segment for equality.</p>
    <h4>Description</h4>
    <figure class="function">mixed segment(integer $position, string $value,  mixed [$default])</figure>
    <p>
        Compares the value of the URI segment at $position with $value.
        If they are a match, true is returned unless $default is defined in which
        case $default's value will be returned.
        If they are not a match, false is returned.
    </p>
    <h4>Parameters</h4>
    <dl>
        <dt>position</dt>
        <dd>The segment position to check.</dd>
        <dt>value</dt>
        <dd>The value to check against the segment's value.</dd>
        <dt>default</dt>
        <dd>A value that will be returned when the condition is true.</dd>
    </dl>
    <h4>Return</h4>
    <p>Mixed</p>
    <h4>Examples</h4>
    <p>Here is an example of retrieving this application's description:</p>
    <pre><code>&lt;?php

// URI: home/page
$result = segment(2, 'page', 'active');

echo $result;
/* prints
active
*/
</code></pre>
</div>
