<div class="function-definition">
    <h3>view</h3>
    <p>view - Include a view with variables for display.</p>
    <h4>Description</h4>
    <figure class="function">string view(string $template, array $data)</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>template</dt>
        <dd>
            A string indicating the path to the template file.
        </dd>
        <dt>data</dt>
        <dd>
            An associative array that will be extracted into the global scope before the template is included.
        </dd>
    </dl>
    <h4>Return</h4>
    <p>void</p>
    <h4>Examples</h4>
    <p>Here is an example displaying a view:</p>
    <pre><code>&lt;?php

view('page/home', array('title' => 'My Title'));
</code></pre>
</div>
