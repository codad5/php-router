<html lang="">
<meta charset="utf-8">
<style>
    html, body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<title>@data(more.last_name)</title>
<body>
<h1>Hello World</h1>
<h3>Rendered page</h3>
<ul>
    <li>
        Host: @headers(host)
    </li>
    <li>
        Name (FM): <b>@data(name)</b>
    </li>
    <li>
        Nested Firstname (FM): <b>@data(more.first_name)</b>
    </li>
</ul>
<p>FM is short for &quot;From Middleware&quot;</p>
</body>
</html>