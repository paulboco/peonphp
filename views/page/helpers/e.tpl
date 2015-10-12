<div id="<?php echo $id ?>" class="function-definition">
    <h3>e</h3>
    <p>e - Echo a string filtered by htmlentities().</p>
    <h4>Description</h4>
    <figure class="function">string e(string $string)</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>string</dt>
        <dd>
            The string to be encoded and then output.
        </dd>
    </dl>
    <h4>Return</h4>
    <p>void</p>
    <h4>Examples</h4>
    <p>Here is an example of outputting a string:</p>
    <pre><code>&lt;?php

$unsafe_string = <?php e("A 'quote' is <b>bold</b>") ?>;
e($unsafe_string);
/* prints
A 'quote' is &amp;lt;b&amp;gt;bold&amp;lt;/b&amp;gt;;
*/
</code></pre>
</div>
