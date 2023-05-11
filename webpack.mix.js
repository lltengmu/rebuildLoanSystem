const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .ts('resources/js/login/*.ts','public/js/login')
    .ts('resources/js/individual/dashboard/index.ts','public/js/individual/dashboard')
    .ts('resources/js/individual/loanApplication/index.ts','public/js/individual/loanApplication')
    .ts('resources/js/individual/approvalManagment/index.ts','public/js/individual/approvalManagment')
    .ts('resources/js/individual/clientsManagment/index.ts','public/js/individual/clientsManagment')
    .ts('resources/js/individual/serviceProviderManagement/index.ts','public/js/individual/serviceProviderManagement')
    .ts('resources/js/individual/individualManagment/index.ts','public/js/individual/individualManagment')
    .ts('resources/js/client/loanApplication/index.ts','public/js/client/loanApplication')
    .ts('resources/js/client/loanDetails/index.ts','public/js/client/loanDetails')
    .ts('resources/js/common/Form/index.ts','public/js/common/Form')
    .ts('resources/js/common/verification/index.ts','public/js/common/verification')
    .ts('resources/js/client/profile/index.ts','public/js/client/profile')
    .postCss('resources/css/global.css','public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    
