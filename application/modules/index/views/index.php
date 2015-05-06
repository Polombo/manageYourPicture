<?php

require './src/Instagram.php';
use MetzWeb\Instagram\Instagram;

session_start();

if (isset($_SESSION['access_token'])) {
  // user authentication -> redirect to media
  header('Location: success.php');
}

// initialize class
$instagram = new Instagram(array(
  'apiKey'      => '347cba88348f415b8338f90b1cc289b6',
  'apiSecret'   => 'a11565cb51a6435a85ea967fe6725e0f',
  'apiCallback' => 'http://localhost/manageYourPicture/'
));

// create login URL
$loginUrl = $instagram->getLoginUrl(array(
  'basic',
  'likes',
  'relationships'
));

?>

<body>
    <div class="row">
        <div class="span1 centrico">
            <div class="gray">
                <div id="signin-button" class="show">
                    <div class="g-signin" data-callback="loginFinishedCallback"
                         data-approvalprompt="force"
                         data-clientid="536615385842-ikn3igee9opa552h87ppgu3st9hh603h.apps.googleusercontent.com"
                         data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"
                         data-height="short"
                         data-cookiepolicy="single_host_origin"
                         >
                    </div>
                </div> 
                <div id="name" class="hide"></div>     
                <div id="email" class="hide"></div>  
            </div>
            <div>
                <ul class="grid">
                    <!--<li><img src="assets/instagram-big.png" alt="Instagram logo"></li>-->
                    <li>
                        <a class="login" href="<?php echo $loginUrl ?>">» Login with Instagram</a>
                        <!--<h4>Use your Instagram account to login.</h4>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
