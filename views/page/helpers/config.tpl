<div class="function-definition">
    <h3>config</h3>
    <p>config - Get a configuration variable.</p>
    <h4>Description</h4>
    <figure class="function">mixed config(string $path, mixed [$default])</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>path</dt>
        <dd>
            Path to the configuation item.
            It is a string using <em>dot notation</em>.
            The first segment of the path is the filename without the <code>.php</code>.
            Each subsequent segment in the path is an array key.
        </dd>
        <dt>default</dt>
        <dd>Optional return value if path not found. Default is <code>null</code>.</dd>
    </dl>
    <h4>Return</h4>
    <p>Mixed</p>
    <h4>Examples</h4>
    <p>Here is an example of retrieving this application's description:</p>
    <pre><code class="php">&lt;?php

$description = config('app.description');

echo $description; // prints "<?php e(config('app.description')) ?>"
</code></pre>
</div>
