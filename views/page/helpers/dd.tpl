<div class="function-definition">
    <h3>dd</h3>
    <p>dd - Dump a var(s) and die.</p>
    <h4>Description</h4>
    <figure class="function">void dd(mixed $var1[, mixed $var2 ...])</figure>
    <h4>Parameters</h4>
    <dl>
        <dt>var1 ...</dt>
        <dd>
            The variable(s) to be dumped.
        </dd>
    </dl>
    <h4>Return</h4>
    <p>void</p>
    <h4>Examples</h4>
    <p>Here is an example of dumping multiple variables:</p>
    <pre><code>&lt;?php

$var1 = 1;
$var2 = 'Sloth Rules!';

dd($var1, $var2);
/* prints
int 1
string 'Sloth Rules!' (length=12)
*/
</code></pre>
</div>
