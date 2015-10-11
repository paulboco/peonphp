<div id="<?php echo $id ?>" class="function-definition">
    <h3>request</h3>
    <p>request - Get a request variable by key.</p>
    <h4>Description</h4>
    <figure class="function">mixed request(string $key, mixed [$default])</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>key</dt>
        <dd>The key of the request variable.</dd>
        <dt>default</dt>
        <dd>Optional return value if key not found. Default is <code>null</code>.</dd>
    </dl>
    <h4>Return</h4>
    <p>Mixed</p>
    <h4>Examples</h4>
    <p>Here is an example of retrieving a request variable with a default fallback:</p>
    <pre><code>&lt;?php

$username = request('username', 'peon');

echo $username; // prints "peon"
</code></pre>
</div>
