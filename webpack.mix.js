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

mix.disableNotifications();

if (mix.inProduction()) { // npm run production
   mix.js('resources/js/bootstrap.js', 'public/js/bootstrap.min.js')
      .js('resources/js/app.js', 'public/js/app.min.js')
    //   .js('resources/js/admin.js', 'public/js/admin.min.js')
    //   .js('resources/js/user.js', 'public/js/user.min.js')
      .js('resources/js/pace.js', 'public/js/pace.min.js')
      .js('node_modules/jquery/src/jquery.js', 'public/js/jquery.min.js')
      .js('node_modules/popper.js/dist/popper.js', 'public/js/popper.min.js')
      .js('node_modules/perfect-scrollbar/dist/perfect-scrollbar.js', 'public/js/perfect-scrollbar.min.js')
      .js('resources/js/bootstrap-datetimepicker.js', 'public/js/bootstrap-datetimepicker.min.js')
      .js('node_modules/@coreui/coreui/dist/js/coreui.js', 'public/js/coreui.min.js');

   mix.sass('resources/sass/bootstrap.scss', 'public/css/bootstrap.min.css')
      .sass('resources/sass/coreui.scss', 'public/css/coreui.min.css')
      .sass('resources/sass/coreui-icons.scss', 'public/css/coreui-icons.min.css')
      .sass('node_modules/simple-line-icons/scss/simple-line-icons.scss', 'public/css/simple-line-icons.min.css')
      .sass('resources/sass/font-awesome.scss', 'public/css/font-awesome.min.css')
      .sass('node_modules/@sweetalert2/themes/default/default.scss', 'public/css/sweetalert2.min.css')
      .sass('node_modules/toastr/toastr.scss', 'public/css/toastr.min.css')
      .sass('resources/sass/bootstrap-datetimepicker.scss', 'public/css/bootstrap-datetimepicker.min.css');

   mix.scripts(['node_modules/moment/moment.js', 'node_modules/moment/locale/th.js'], 'public/js/moment.min.js');

   mix.styles('node_modules/pace-progress/themes/blue/pace-theme-minimal.css', 'public/css/pace.min.css')
      .styles('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/css/dataTables.bootstrap.min.css');

   mix.version();
}
else { // npm run development
   mix.js('resources/js/bootstrap.js', 'public/js')
      .js('resources/js/app.js', 'public/js')
      // .js('resources/js/admin.js', 'public/js')
      // .js('resources/js/user.js', 'public/js')
      .js('resources/js/pace.js', 'public/js')
      .js('node_modules/jquery/src/jquery.js', 'public/js')
      .js('node_modules/popper.js/dist/popper.js', 'public/js')
      .js('node_modules/perfect-scrollbar/dist/perfect-scrollbar.js', 'public/js')
      .js('resources/js/bootstrap-datetimepicker.js', 'public/js')
      .js('node_modules/@coreui/coreui/dist/js/coreui.js', 'public/js');

   mix.sass('resources/sass/bootstrap.scss', 'public/css')
      .sass('resources/sass/coreui.scss', 'public/css')
      .sass('resources/sass/coreui-icons.scss', 'public/css')
      .sass('node_modules/simple-line-icons/scss/simple-line-icons.scss', 'public/css')
      .sass('resources/sass/font-awesome.scss', 'public/css')
      .sass('node_modules/@sweetalert2/themes/default/default.scss', 'public/css/sweetalert2.css')
      .sass('node_modules/toastr/toastr.scss', 'public/css')
      .sass('resources/sass/bootstrap-datetimepicker.scss', 'public/css');

   mix.scripts(['node_modules/moment/moment.js', 'node_modules/moment/locale/th.js'], 'public/js/moment.js');

   mix.styles('node_modules/pace-progress/themes/blue/pace-theme-minimal.css', 'public/css/pace.css')
      .styles('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'public/css/dataTables.bootstrap.css');
}
