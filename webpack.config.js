var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css/app', './assets/css/app.scss')

    .createSharedEntry('vendor', [
        'jquery',
        'babel-polyfill',
        'promise-polyfill',
        'sweetalert2',
        '@fortawesome/fontawesome-free/scss/fontawesome.scss',
        '@fortawesome/fontawesome-free/scss/regular.scss',
        '@fortawesome/fontawesome-free/scss/solid.scss',
        'bootstrap',
        'bootstrap/scss/bootstrap.scss',
        'bootstrap-select',
        'bootstrap-select/sass/bootstrap-select.scss',
    ])

    .autoProvideVariables({
        selectpicker: 'bootstrap-select',
        swal: 'sweetalert2'
    })

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .enableSassLoader(function (sassOptions) {}, {resolveUrlLoader: false})

    .enableBuildNotifications()
    .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
