<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.21.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.21.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth-management">
                    <a href="#auth-management">Auth management</a>
                </li>
                                    <ul id="tocify-subheader-auth-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-management-POSTapi-auth-login">
                        <a href="#auth-management-POSTapi-auth-login">Get a JWT via given credentials.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-management-POSTapi-auth-logout">
                        <a href="#auth-management-POSTapi-auth-logout">Log the user out (Invalidate the token).</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-management-POSTapi-auth-refresh">
                        <a href="#auth-management-POSTapi-auth-refresh">Refresh a token.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="auth-management-POSTapi-auth-me">
                        <a href="#auth-management-POSTapi-auth-me">Get the authenticated User.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="contacts-management">
                    <a href="#contacts-management">Contacts management</a>
                </li>
                                    <ul id="tocify-subheader-contacts-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="contacts-management-GETapi-contacts">
                        <a href="#contacts-management-GETapi-contacts">Display a listing of the resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="contacts-management-POSTapi-contacts">
                        <a href="#contacts-management-POSTapi-contacts">Store a newly created resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="contacts-management-GETapi-contacts--id-">
                        <a href="#contacts-management-GETapi-contacts--id-">Display the specified resource.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="contacts-management-PUTapi-contacts--id-">
                        <a href="#contacts-management-PUTapi-contacts--id-">Update the specified resource in storage.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="contacts-management-DELETEapi-contacts--id-">
                        <a href="#contacts-management-DELETEapi-contacts--id-">Remove the specified resource from storage.</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 19 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="auth-management">Auth management</h1>

    <p>APIs for managing Auth</p>

            <h2 id="auth-management-POSTapi-auth-login">Get a JWT via given credentials.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"ea\",
    \"password\": \"aperiam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ea",
    "password": "aperiam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>email</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-login"
               value="ea"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>password</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="aperiam"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="auth-management-POSTapi-auth-logout">Log the user out (Invalidate the token).</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout"></code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                    </form>

            <h2 id="auth-management-POSTapi-auth-refresh">Refresh a token.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-refresh">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/refresh"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-refresh">
</span>
<span id="execution-results-POSTapi-auth-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-refresh"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-refresh"></code></pre>
</span>
<form id="form-POSTapi-auth-refresh" data-method="POST"
      data-path="api/auth/refresh"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-refresh"
                    onclick="tryItOut('POSTapi-auth-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-refresh"
                    onclick="cancelTryOut('POSTapi-auth-refresh');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-refresh" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/refresh</code></b>
        </p>
                    </form>

            <h2 id="auth-management-POSTapi-auth-me">Get the authenticated User.</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/auth/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/auth/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-me">
</span>
<span id="execution-results-POSTapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-me"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-me"></code></pre>
</span>
<form id="form-POSTapi-auth-me" data-method="POST"
      data-path="api/auth/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-me"
                    onclick="tryItOut('POSTapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-me"
                    onclick="cancelTryOut('POSTapi-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/me</code></b>
        </p>
                    </form>

        <h1 id="contacts-management">Contacts management</h1>

    

            <h2 id="contacts-management-GETapi-contacts">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/contacts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contacts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts"></code></pre>
</span>
<span id="execution-error-GETapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts"></code></pre>
</span>
<form id="form-GETapi-contacts" data-method="GET"
      data-path="api/contacts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts"
                    onclick="tryItOut('GETapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts"
                    onclick="cancelTryOut('GETapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts</code></b>
        </p>
                <p>
            <label id="auth-GETapi-contacts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-contacts"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="contacts-management-POSTapi-contacts">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-contacts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/contacts" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"vharris@example.org\",
    \"mobile\": \"99858987012\",
    \"birthdate\": \"2022-01-19T11:13:45\",
    \"active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contacts"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "vharris@example.org",
    "mobile": "99858987012",
    "birthdate": "2022-01-19T11:13:45",
    "active": true
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-contacts">
</span>
<span id="execution-results-POSTapi-contacts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-contacts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-contacts"></code></pre>
</span>
<span id="execution-error-POSTapi-contacts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-contacts"></code></pre>
</span>
<form id="form-POSTapi-contacts" data-method="POST"
      data-path="api/contacts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-contacts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-contacts"
                    onclick="tryItOut('POSTapi-contacts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-contacts"
                    onclick="cancelTryOut('POSTapi-contacts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-contacts" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/contacts</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-contacts" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-contacts"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-contacts"
               value="vharris@example.org"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="mobile"
               data-endpoint="POSTapi-contacts"
               value="99858987012"
               data-component="body" hidden>
    <br>
<p>The value format is invalid. Must be 11 digits.</p>
        </p>
                <p>
            <b><code>birthdate</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="birthdate"
               data-endpoint="POSTapi-contacts"
               value="2022-01-19T11:13:45"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>active</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="POSTapi-contacts" hidden>
            <input type="radio" name="active"
                   value="true"
                   data-endpoint="POSTapi-contacts"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-contacts" hidden>
            <input type="radio" name="active"
                   value="false"
                   data-endpoint="POSTapi-contacts"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
        </form>

            <h2 id="contacts-management-GETapi-contacts--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/contacts/6" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contacts/6"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-contacts--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-contacts--id-"></code></pre>
</span>
<span id="execution-error-GETapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-contacts--id-"></code></pre>
</span>
<form id="form-GETapi-contacts--id-" data-method="GET"
      data-path="api/contacts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-contacts--id-"
                    onclick="tryItOut('GETapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-contacts--id-"
                    onclick="cancelTryOut('GETapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-contacts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-contacts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-contacts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-contacts--id-"
               value="6"
               data-component="url" hidden>
    <br>
<p>The ID of the contact.</p>
            </p>
                    </form>

            <h2 id="contacts-management-PUTapi-contacts--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/contacts/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"ryan21@example.net\",
    \"mobile\": \"21882466046\",
    \"birthdate\": \"2022-01-19T11:13:45\",
    \"active\": true
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contacts/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "ryan21@example.net",
    "mobile": "21882466046",
    "birthdate": "2022-01-19T11:13:45",
    "active": true
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-contacts--id-">
</span>
<span id="execution-results-PUTapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-contacts--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-contacts--id-"></code></pre>
</span>
<form id="form-PUTapi-contacts--id-" data-method="PUT"
      data-path="api/contacts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-contacts--id-"
                    onclick="tryItOut('PUTapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-contacts--id-"
                    onclick="cancelTryOut('PUTapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-contacts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-contacts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-contacts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-contacts--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the contact.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="PUTapi-contacts--id-"
               value="ryan21@example.net"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>mobile</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="mobile"
               data-endpoint="PUTapi-contacts--id-"
               value="21882466046"
               data-component="body" hidden>
    <br>
<p>The value format is invalid. Must be 11 digits.</p>
        </p>
                <p>
            <b><code>birthdate</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="birthdate"
               data-endpoint="PUTapi-contacts--id-"
               value="2022-01-19T11:13:45"
               data-component="body" hidden>
    <br>
<p>Must be a valid date.</p>
        </p>
                <p>
            <b><code>active</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
                <label data-endpoint="PUTapi-contacts--id-" hidden>
            <input type="radio" name="active"
                   value="true"
                   data-endpoint="PUTapi-contacts--id-"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="PUTapi-contacts--id-" hidden>
            <input type="radio" name="active"
                   value="false"
                   data-endpoint="PUTapi-contacts--id-"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
        </form>

            <h2 id="contacts-management-DELETEapi-contacts--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-contacts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/contacts/17" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/contacts/17"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-contacts--id-">
</span>
<span id="execution-results-DELETEapi-contacts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-contacts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-contacts--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-contacts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-contacts--id-"></code></pre>
</span>
<form id="form-DELETEapi-contacts--id-" data-method="DELETE"
      data-path="api/contacts/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-contacts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-contacts--id-"
                    onclick="tryItOut('DELETEapi-contacts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-contacts--id-"
                    onclick="cancelTryOut('DELETEapi-contacts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-contacts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/contacts/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-contacts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-contacts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-contacts--id-"
               value="17"
               data-component="url" hidden>
    <br>
<p>The ID of the contact.</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
