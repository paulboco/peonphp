<h2>Routing</h2>
<p>
    The Peon Router is based on the assumption that:
    <ol>
        <li>Segment one of the requested URI can be mapped to an existing controller</li>
        <li>Segment two is the name of an existing method on that controller.</li>
        <li>If conditions 1 and 2 don't match, return a 404 response.</li>
    </ol>
</p>
<p>
    For example, the URL <code>http://example.com/user/dashboard</code> would map to
    the <code>dashboard()</code> method on class <code>UserController</code>.
</p>

<p>
e.g.
<pre><code class="php">&lt;?php
namespace App\Controllers;

class UserController
{
    public function dashboard()
    {
        // ...
    }
}
</code></pre>
</p>
<p>
    Controllers are just classes and exist in the <code>&lt;project>/app/Controllers</code>
    directory.  Their names are formatted using
    <em class="hint"
        tabindex="0"
        data-toggle="popover"
        data-trigger="focus"
        data-placement="top"
        title="StudlyCaps"
        data-content="Words strung together without spaces and the first letter of each word capitalized. e.g. MyStudlyClassName ">
        studly caps
    </em>
    with the text <code>Controllers</code> at the end.
</p>
<p>
    Therefore, if segment one is <code>user</code>, the full class name
    would be <code>UserController</code> and the file containing the class
    would be <code>&lt;project>/app/Controllers/UserController.php</code>.
</p>
<p>
    If no controller method can be found matching segments one and two, a
    404 response is returned to the browser. One exception is when the
    base URL (<code>http://example.com</code>) is requested.
    In this case, the router will map the request to the <code>PageController</code>'s
    <code>home()</code> method.
</p>
