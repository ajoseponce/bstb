<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <title>Banco de Sangre Central de la Provincia</title>

    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">
    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/plugins.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/themes.css">
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!--*********************************************/-->
    <script src="js/Functions.js" type="text/javascript"></script>
    <script src="js/funciones.js" type="text/javascript"></script>
    <link href="css/autosuggest_inquisitor.css" rel="stylesheet" type="text/css"/>
    <link href="css/lightwindow.css" rel="stylesheet" type="text/css"/>
    <!--******************************************--->
    <script src="js/jquery.min.js"></script>
    <script src="js/block-ui.js"></script>
    <script>
        $(document).ready(function () {

            $(document).ajaxStart(function () {
                $.blockUI(
                    {
                        message: '<h1><img src="img/loader.gif" /></h1>'
                    }
                );
            }).ajaxStop($.unblockUI);;

        });
    </script>

    <!--        <link rel="stylesheet" href="css/tooltips.css">-->

</head>