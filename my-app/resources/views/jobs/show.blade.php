<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Job</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <job-show></job-show>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        Vue.component('job-show', require('./components/JobShow.vue').default);

        const app = new Vue({
            el: '#app',
        });
    </script>
</body>
</html>
