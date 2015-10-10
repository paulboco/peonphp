<h2>Routing</h2>
<p>
    The Peon Router (located at <code>&lt;project-name>/vendors/peon/Router.php</code>) is a VERY simple router based on the assumption that
    segment one of the requested URI is a controller name (without the 'Controller' appendage)
    and segment two is the name of controller's method.
</p>
<p>
    For example, the URL <code>http://example.com/user/dashboard</code> would map to
    the <code>dashboard()</code> method of class <code>UserController</code>.
    e.g.,
</p>
<p>
<pre><code class="php">&lt;?php

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
    All controllers exist in the <code>&lt;project-name>/Controllers</code>
    directory and use studly case with the word <code>Controllers</code>
    appending the class name.
    Therefore, if segment one is <code>user</code>, the full class name
    would be <code>UserController</code> and the file containing the class
    would be <code>&lt;project-name>/Controllers/UserController.php</code>.
</p>
<p>
    If no controller method can be found matching segments one and two, a
    404 response is returned to the browser.
</p>
<p>
    The one exception to this rule is when the base URL is requested -
    i.e., <code>http://example.com</code>.
    In this case, the router will map to controller <code>PageController</code>
    and its <code>home()</code> method.
</p>
