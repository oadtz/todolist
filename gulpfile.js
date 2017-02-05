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
    mix.copy('./bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
    mix.styles([
        './bower_components/bootstrap/dist/css/bootstrap.css',
        './bower_components/angular-ui-grid/ui-grid.css'
    ], 'public/assets/css/vendor.css');
    mix.less([
        './resources/assets/less/styles.less',
    ], 'public/assets/css/styles.css');
    mix.scripts([
        './bower_components/angular/angular.js',
        './bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
        './bower_components/angular-ui-grid/ui-grid.js'
    ], 'public/assets/js/vendor.js');
    mix.scripts([
        './resources/assets/js/scripts.js',
    ], 'public/assets/js/scripts.js');

});