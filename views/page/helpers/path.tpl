<div class="function-definition">
    <h3>path</h3>
    <p>path - Get the application's base path.</p>
    <h4>Description</h4>
    <figure class="function">string path(string [$child_path])</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>child_path</dt>
        <dd>
            An optional child path that will be appended to the base path.
            <br>
            <b>Note:</b> The <code>child_path</code> must be prepended with a directory seperator (/).
        </dd>
    </dl>
    <h4>Return</h4>
    <p>string</p>
    <h4>Examples</h4>
    <p>Here is an example of finding the application's <code>public</code> path:</p>
    <pre><code class="php">&lt;?php

$public = path('/public');
echo $public; // prints <?php e(path('/public')) ?>
</code></pre>
</div>
