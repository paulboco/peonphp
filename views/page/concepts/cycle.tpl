<h2>Request Cycle</h2>
<p>
    The request cycle goes like this:
    <ul>
        <li>The incoming request calls front controller <code>public/index.php</code>.</li>
        <li>The front controller requires <code>boot/app.php</code> which:</li>
            <ul>
                <li>Registers the autoloader.</li>
                <li>
                    Dispatches the route to the appropriate controller or returns a 404.<br>
                    <i>Click the '404' link in the navbar for a demonstration.</i>
                </li>
            </ul>
        </li>
        <li>The controller processes the request. Usually with a view or redirect.</li>
        <li>End processing.</li>
    </ul>
</p>
