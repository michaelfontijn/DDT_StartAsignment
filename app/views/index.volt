<!DOCTYPE html>


<html>
    <head>
        <title>phalconOne</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        {#Render local css assets#}
        {{ assets.outputCss() }}

    </head>
    <body>
        <div class="container" id="siteContainer">
            {#The logo, using the tag helper prevents the image #}
            <a href="index">{{ image('img/DTT%20logo.png', 'class' : 'logo') }}</a>

            <hr/>

            <!-- Load in the content-->
            {{ content() }}

            <div id="footer">
                <hr/>
                <p>DTT Multimedia @ 2018. All rights reserved. <a href="user">Site Admin</a></p>
            </div>
        </div>

        <!--Load js  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        {# Render local js assets#}
        {{ assets.outputJs() }}

    </body>
</html>