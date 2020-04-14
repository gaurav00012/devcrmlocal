const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/admin/user.js','public/js/admin')
    .js('resources/js/admin/projects/project.js','public/js/projects')
    .js('resources/js/admin/tasks/tasks.js','public/js/admin/tasks')
    .sass('resources/sass/app.scss', 'public/css');


    
