const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.copy('./bower_components/bootstrap/dist/fonts', 'public/fonts');
    mix.less([
        './resources/assets/less/styles.less'
    ], './resources/assets/css/styles.css');
    mix.styles([
        './bower_components/angular-material/angular-material.css',
        './resources/assets/css/styles.css'
    ], 'public/css/app.css');
    mix.scripts([
        './bower_components/angular/angular.js',
        './bower_components/angular-animate/angular-animate.js',
        './bower_components/angular-aria/angular-aria.js',
        './bower_components/angular-messages/angular-messages.js',
        './bower_components/angular-material/angular-material.js',
        './resources/assets/js/scripts.js'
    ], 'public/js/app.js');
    mix.version(['css/app.css', 'js/app.js']);
});