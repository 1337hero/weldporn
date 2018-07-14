<?php
/*------------------------------------*\
    WIHP CUSTOM ADMIN LOGIN
\*------------------------------------*/

function my_login_logo() { ?>
    <style type="text/css">
        html {
             background: #000;
        }
        body.login div#login h1 a {
        }
        body.login {
            background: transparent;
        }
        body.login #backtoblog a, 
        body.login #nav a {
            color:#434343;
            padding-bottom: 2px;
        }
        body.login #backtoblog a:hover, 
        body.login #nav a:hover {
            color:#2851af;
            border-bottom: 2px solid #2851af;
        }
        body.login #login_error, 
        body.login .message {
            border-left: 4px solid red;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
