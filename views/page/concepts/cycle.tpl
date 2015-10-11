<h2>Request Cycle</h2>
<p>
    The request cycle goes like this:
    <ul>
        <li>
            Incoming requests are handled by the <em class="hint" data-toggle="tooltip" data-placement="top" title="Jargon Alert!">front controller</em>.
            <br>i.e. <code>&lt;project>/public/index.php</code>.
        </li>
        <li>The front controller passes control to <code>&lt;project>/boot/app.php</code> which:</li>
            <ul>
                <li>Registers the autoloader.</li>
                <li>
                    Dispatches the route to the appropriate controller method or responds with a
                    <a href="page/doesnt-exist">404</a>.
                </li>
            </ul>
        </li>
        <li>
            The controller processes the request and sends a response.
            Usually a view (200) or redirect (302).
        </li>
        <li>Processing ends.</li>
    </ul>
</p>
