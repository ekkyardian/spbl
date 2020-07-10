<?php

if( isset($_POST['ajax']) && isset($_POST['lineID']) ){
    $lineID = $_POST['lineID'];
    echo $lineID;
    exit;
}

?>
<!-- End: Pemanggilan dan pendeklarasian class -->

<html>
<body>
<form method='post' action>
    <p id='response'></p>
</form>

<script charset="utf-8" src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
<script src="../../../../assets/js/jquery-2.1.4.min.js"></script>

<!-- inline scripts related to this page -->
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

    initializeLiff(myLiffId);

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

    function registerButtonHandlers() {
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

            // document.getElementById('userIdProfileField').textContent = profile.userId;
            // document.getElementById('displayNameField').textContent = profile.displayName;

            // const profilePictureDiv = document.getElementById('profilePictureDiv');
            // if (profilePictureDiv.firstElementChild) {
            //     profilePictureDiv.removeChild(profilePictureDiv.firstElementChild);
            // }
            // const img = document.createElement('img');
            // img.src = profile.pictureUrl;
            // img.alt = 'Profile Picture';
            // img.style.height  = '66px';
            // img.style.width   = '66px';
            // profilePictureDiv.appendChild(img);

        }).catch(function(error) {
            window.alert('Error getting profile: ' + error);
        });
    }

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