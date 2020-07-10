<?php
/**
 * Created by PhpStorm.
 * User: Ekky Ardian Fitran
 * Date: 10/07/2020
 * Time: 16:09
 */

if( isset($_POST['ajax']) && isset($_POST['lineID']) ){
    $lineID = $_POST['lineID'];
    //echo $lineID;

    $validasiLineID = "Ua275161a7af915419f9dd93c19904bdc";

    if ($lineID == $validasiLineID) {
        echo "<script>window.location='input_laporan_t1.php'</script>";
    }
    else {
        echo "<script>window.location='informasi.php'</script>";
    }
    exit;
}

require_once ('../../../../config/+koneksi.php');
require_once ('../../../../models/database.php');
require_once ('../../../../models/trc/liff/LiffLaporanObservasi.php');

$connection = new Database($host, $user, $pass, $database);
$LiffLaporanObservasi = new LiffLaporanObservasi($connection);

?>
<!-- End: Pemanggilan dan pendeklarasian class -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>SPBL</title>

    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../../assets/font-awesome/4.5.0/css/font-awesome.min.css"/>

    <!-- text fonts -->
    <link rel="stylesheet" href="../../../../assets/css/fonts.googleapis.com.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="../../../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../../assets/css/ace-part2.min.css" class="ace-main-stylesheet"/>
    <![endif]-->
    <link rel="stylesheet" href="../../../../assets/css/ace-skins.min.css"/>
    <link rel="stylesheet" href="../../../../assets/css/ace-rtl.min.css"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="../../../../assets/css/ace-ie.min.css"/>
    <![endif]-->

    <!-- ace settings handler -->
    <script src="../../../../assets/js/ace-extra.min.js"></script>

    <!--[if lte IE 8]>
    <script src="../../../../assets/js/html5shiv.min.js"></script>
    <script src="../../../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">

<!--| Start: Content Area |-->
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">

            <!-- Content -->
            <div id="liffAppContent">

                <form method='post' action>
                    <p id='response'></p>
                </form>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="page-content">

                            <!-- LOGIN LOGOUT BUTTONS -->
                            <div class="buttonGroup">
                                <button id="liffLoginButton">Log in</button>
                                <button id="liffLogoutButton">Log out</button>
                            </div>

                            <div class="space-10"></div>

                            <div id="statusMessage">
                                <div id="isInClientMessage"></div>
                                <div id="apiReferenceMessage">
                                    <p>Available LIFF methods vary depending on the browser you use to open the LIFF app.</p>
                                    <p>Please refer to the <a href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">API reference page</a> for more information.</p>
                                </div>
                            </div>

                            <!-- LIFF ID ERROR -->
                            <div id="liffIdErrorMessage" class="hidden">
                                <p>You have not assigned any value for LIFF ID.</p>
                                <p>If you are running the app using Node.js, please set the LIFF ID as an environment variable in your Heroku account follwing the below steps: </p>
                                <code id="code-block">
                                    <ol>
                                        <li>Go to `Dashboard` in your Heroku account.</li>
                                        <li>Click on the app you just created.</li>
                                        <li>Click on `Settings` and toggle `Reveal Config Vars`.</li>
                                        <li>Set `MY_LIFF_ID` as the key and the LIFF ID as the value.</li>
                                        <li>Your app should be up and running. Enter the URL of your app in a web browser.</li>
                                    </ol>
                                </code>
                                <p>If you are using any other platform, please add your LIFF ID in the <code>index.html</code> file.</p>
                                <p>For more information about how to add your LIFF ID, see <a href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">Initializing the LIFF app</a>.</p>
                            </div>

                            <!-- LIFF INIT ERROR -->
                            <div id="liffInitErrorMessage" class="hidden">
                                <p>Something went wrong with LIFF initialization.</p>
                                <p>LIFF initialization can fail if a user clicks "Cancel" on the "Grant permission" screen, or if an error occurs in the process of <code>liff.init()</code>.</p>
                            </div>

                            <!-- NODE.JS LIFF ID ERROR -->
                            <div id="nodeLiffIdErrorMessage" class="hidden">
                                <p>Unable to receive the LIFF ID as an environment variable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
            <!--            <script src="../liff-starter.js"></script>-->
        </div>
    </div>
</div>
<!--| End: Content Area |-->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="../../../../assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='../../../../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="../../../../assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="../../../../assets/js/jquery.dataTables.min.js"></script>
<script src="../../../../assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="../../../../assets/js/dataTables.buttons.min.js"></script>
<script src="../../../../assets/js/buttons.flash.min.js"></script>
<script src="../../../../assets/js/buttons.html5.min.js"></script>
<script src="../../../../assets/js/buttons.print.min.js"></script>
<script src="../../../../assets/js/buttons.colVis.min.js"></script>
<script src="../../../../assets/js/dataTables.select.min.js"></script>
<script src="../../../../assets/js/bootbox.js"></script>

<!-- ace scripts -->
<script src="../../../../assets/js/ace-elements.min.js"></script>
<script src="../../../../assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        const useNodeJS = false;   // if you are not using a node server, set this value to false
        const defaultLiffId = "1654238427-9nOJl4v7";   // change the default LIFF value if you are not using a node server

        // DO NOT CHANGE THIS
        let myLiffId = "";

        // if node is used, fetch the environment variable and pass it to the LIFF method
        // otherwise, pass defaultLiffId
        if (useNodeJS) {
            fetch('/send-id')
                .then(function(reqResponse) {
                    return reqResponse.json();
                })
                .then(function(jsonResponse) {
                    myLiffId = jsonResponse.id;
                    initializeLiffOrDie(myLiffId);
                })
                .catch(function(error) {
                    document.getElementById("liffAppContent").classList.add('hidden');
                    document.getElementById("nodeLiffIdErrorMessage").classList.remove('hidden');
                });
        } else {
            myLiffId = defaultLiffId;
            initializeLiffOrDie(myLiffId);
        }
    };

    /**
     * Check if myLiffId is null. If null do not initiate liff.
     * @param {string} myLiffId The LIFF ID of the selected element
     */
    function initializeLiffOrDie(myLiffId) {
        if (!myLiffId) {
            document.getElementById("liffAppContent").classList.add('hidden');
            document.getElementById("liffIdErrorMessage").classList.remove('hidden');
        } else {
            initializeLiff(myLiffId);
        }
    }

    /**
     * Initialize LIFF
     * @param {string} myLiffId The LIFF ID of the selected element
     */
    function initializeLiff(myLiffId) {
        liff
            .init({
                liffId: myLiffId
            })
            .then(() => {
                // start to use LIFF's api
                initializeApp();
            })
            .catch((err) => {
                document.getElementById("liffAppContent").classList.add('hidden');
                document.getElementById("liffInitErrorMessage").classList.remove('hidden');
            });
    }

    /**
     * Initialize the app by calling functions handling individual app components
     */
    function initializeApp() {
        displayLiffData();
        displayIsInClientInfo();
        registerButtonHandlers();

        // check if the user is logged in/out, and disable inappropriate button
        if (liff.isLoggedIn()) {
            document.getElementById('liffLoginButton').disabled = true;
        } else {
            document.getElementById('liffLogoutButton').disabled = true;
        }
    }

    /**
     * Display data generated by invoking LIFF methods
     */
    function displayLiffData() {
        // document.getElementById('browserLanguage').textContent = liff.getLanguage();
        // document.getElementById('sdkVersion').textContent = liff.getVersion();
        // document.getElementById('lineVersion').textContent = liff.getVersion();
        // document.getElementById('isInClient').textContent = liff.isInClient();
        // document.getElementById('isLoggedIn').textContent = liff.isLoggedIn();
        // document.getElementById('deviceOS').textContent = liff.getOS();
    }

    /**
     * Toggle the login/logout buttons based on the isInClient status, and display a message accordingly
     */
    function displayIsInClientInfo() {
        if (liff.isInClient()) {
            document.getElementById('liffLoginButton').classList.toggle('hidden');
            document.getElementById('liffLogoutButton').classList.toggle('hidden');
            document.getElementById('isInClientMessage').textContent = 'You are opening the app in the in-app browser of LINE.';
        } else {
            document.getElementById('isInClientMessage').textContent = 'You are opening the app in an external browser.';
        }
    }

    /**
     * Register event handlers for the buttons displayed in the app
     */
    function registerButtonHandlers() {
        // openWindow call
        // document.getElementById('openWindowButton').addEventListener('click', function() {
        //     liff.openWindow({
        //         url: 'https://line.me',
        //         external: true
        //     });
        // });

        // closeWindow call
        document.getElementById('closeWindowButton').addEventListener('click', function() {
            if (!liff.isInClient()) {
                sendAlertIfNotInClient();
            } else {
                liff.closeWindow();
            }
        });

        // sendMessages call
        // document.getElementById('sendMessageButton').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         liff.sendMessages([{
        //             'type': 'text',
        //             'text': "You've successfully sent a message! Hooray!"
        //         }]).then(function() {
        //             window.alert('Message sent');
        //         }).catch(function(error) {
        //             window.alert('Error sending message: ' + error);
        //         });
        //     }
        // });

        // scanCode call
        // document.getElementById('scanQrCodeButton').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         liff.scanCode().then(result => {
        //             // e.g. result = { value: "Hello LIFF app!" }
        //             const stringifiedResult = JSON.stringify(result);
        //             document.getElementById('scanQrField').textContent = stringifiedResult;
        //             toggleQrCodeReader();
        //         }).catch(err => {
        //             document.getElementById('scanQrField').textContent = "scanCode failed!";
        //         });
        //     }
        // });

        // get access token
        // document.getElementById('getAccessToken').addEventListener('click', function() {
        //     if (!liff.isLoggedIn() && !liff.isInClient()) {
        //         alert('To get an access token, you need to be logged in. Please tap the "login" button below and try again.');
        //     } else {
        //         const accessToken = liff.getAccessToken();
        //         document.getElementById('accessTokenField').textContent = accessToken;
        //         toggleAccessToken();
        //     }
        // });

        // get profile call
        //document.getElementById('getProfileButton').addEventListener('click', function() {
        liff.getProfile().then(function(profile) {

            $(document).ready(function () {
                var lineID = profile.userId;

                $.ajax({
                    url: 'index.php',
                    type: 'post',
                    data: {ajax: 1, lineID: lineID},
                    success: function (response) {
                        $('#response').text(response);
                    }
                });
            });

            document.getElementById('userIdProfileField').textContent = profile.userId;
            document.getElementById('displayNameField').textContent = profile.displayName;

            const profilePictureDiv = document.getElementById('profilePictureDiv');
            if (profilePictureDiv.firstElementChild) {
                profilePictureDiv.removeChild(profilePictureDiv.firstElementChild);
            }
            const img = document.createElement('img');
            img.src = profile.pictureUrl;
            img.alt = 'Profile Picture';
            img.style.height  = '66px';
            img.style.width   = '66px';
            profilePictureDiv.appendChild(img);

            //document.getElementById('statusMessageField').textContent = profile.statusMessage;
            //toggleProfileData();
        }).catch(function(error) {
            window.alert('Error getting profile: ' + error);
        });
        //});

        // document.getElementById('shareTargetPicker').addEventListener('click', function() {
        //     if (!liff.isInClient()) {
        //         sendAlertIfNotInClient();
        //     } else {
        //         if (liff.isApiAvailable('shareTargetPicker')) {
        //             liff.shareTargetPicker([
        //                 {
        //                     'type': 'text',
        //                     'text': 'Hello, World!'
        //                 }
        //             ])
        //                 .then(
        //                     document.getElementById('shareTargetPickerMessage').textContent = "Share target picker was launched."
        //                 ).catch(function(res) {
        //                 document.getElementById('shareTargetPickerMessage').textContent = "Failed to launch share target picker."
        //             })
        //         }
        //     }
        // });

        // login call, only when external browser is used
        document.getElementById('liffLoginButton').addEventListener('click', function() {
            if (!liff.isLoggedIn()) {
                // set `redirectUri` to redirect the user to a URL other than the front page of your LIFF app.
                liff.login();
            }
        });

        // logout call only when external browse
        document.getElementById('liffLogoutButton').addEventListener('click', function() {
            if (liff.isLoggedIn()) {
                liff.logout();
                window.location.reload();
            }
        });
    }

    /**
     * Alert the user if LIFF is opened in an external browser and unavailable buttons are tapped
     */
    function sendAlertIfNotInClient() {
        alert('This button is unavailable as LIFF is currently being opened in an external browser.');
    }

    /**
     * Toggle access token data field
     */
    function toggleAccessToken() {
        toggleElement('accessTokenData');
    }

    /**
     * Toggle profile info field
     */
    // function toggleProfileData() {
    //     toggleElement('profileInfo');
    // }

    /**
     * Toggle scanCode result field
     */
    function toggleQrCodeReader() {
        toggleElement('scanQr');
    }

    /**
     * Toggle specified element
     * @param {string} elementId The ID of the selected element
     */
    function toggleElement(elementId) {
        const elem = document.getElementById(elementId);
        if (elem.offsetWidth > 0 && elem.offsetHeight > 0) {
            elem.style.display = 'none';
        } else {
            elem.style.display = 'block';
        }
    }
</script>

</body>
</html>