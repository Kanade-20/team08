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

 mix.js('resources/js/app.js', 'public/js')  // 编译 JS 文件
    .sass('resources/sass/app.scss', 'public/css')  // 编译 Sass 文件

// 浏览器兼容性设置
mix.postCss('resources/css/app.css', 'public/css', [require('autoprefixer'),]);
mix.postCss('resources/css/sdg3.css', 'public/css', [require('autoprefixer'),]);
mix.postCss('resources/css/sdgs.css', 'public/css', [require('autoprefixer'),]);
mix.postCss('resources/css/table.css', 'public/css', [require('autoprefixer'),]);