<h2>Routing</h2>
<p>
    The Peon Router is VERY simple and is based on the assumption that
    segment one of the requested URI is an existing controller
    and that segment two is an existings method on that controller.
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
    All controllers are classes and exist in the <code>&lt;project>/app/Controllers</code>
    directory and are named using
    <em class="hint"
        tabindex="0"
        data-toggle="popover"
        data-trigger="focus"
        data-placement="top"
        title="Studly Caps"
        data-content="Words strung together without spaces and the first letter of each word capitalized. e.g. MyStudlyClassName ">
        studly caps
    </em>
    with the text <code>Controllers</code> appending the class name.
    Therefore, if segment one is <code>user</code>, the full class name
    would be <code>UserController</code> and the file containing the class
    would be <code>&lt;project>/app/Controllers/UserController.php</code>.
</p>
<p>
    If no controller method can be found matching segments one and two, a
    404 response is returned to the browser.
</p>
<p>
    The one exception to this rule is when the base URL is requested -
    i.e., <code>http://example.com</code>.
    In this case, the router will map the request to the <code>PageController</code>'s
    <code>home()</code> method.
</p>
