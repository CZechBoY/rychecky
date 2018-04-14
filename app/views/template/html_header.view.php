<!DOCTYPE html>


<html lang="<?= Language::getLocale() ?>">
<head>
    <title>rychecky.cz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#41576D">
    <link rel="icon" href="<?= URL ?>/favicon.ico" type="image/x-icon"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800&subset=latin,latin-ext"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0/superhero/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/timeline.css/1.0.0/timeline.min.css"/>


    <link rel="stylesheet" type="text/css" href="<?= asset_with_hash('css/rychecky.css') ?>">
    <script src="<?= asset_with_hash('js/rychecky.min.js') ?>"></script>


    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= env('GOOGLE_ANALYTICS') ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '<?= env('GOOGLE_ANALYTICS') ?>');
    </script>
</head>


<body>
<div class="container">