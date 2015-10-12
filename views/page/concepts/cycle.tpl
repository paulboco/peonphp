<h2>Request Cycle</h2>
<p>
    The request cycle goes like this:
    <ul>
        <li>
            All incoming requests are handled by the
            <em class="hint" data-toggle="tooltip" data-placement="top" title="i. e. public/index.php">
                front controller.
            </em>
            The front controller:
            <ol>
                <li>Sets PHP's error reporting level.</li>
                <li>Registers the autoloader.</li>
                <li>Boots the application.</li>
                <li>
                    Dispatches the route to the appropriate controller method or responds with a
                    <a href="page/doesnt-exist">404</a>.
                </li>
            </ol>
        </li>
        <li>
            The controller processes the request and sends a response.
            Usually a view (200) or redirect (302).
        </li>
        <li>Processing ends.</li>
    </ul>
</p>
