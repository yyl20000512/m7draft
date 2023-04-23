<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>Hello World</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<h1> Hello World</h1>
<h2> Hello World</h2>
<div id="app">
    <hello-world></hello-world>
    <another-vue></another-vue>
    <text-entry></text-entry>
</div>
</body>
</html>