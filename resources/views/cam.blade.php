<!DOCTYPE html>
<html>
<head>
    <title>Webcam Test</title>
    <script src="https://cdn.jsdelivr.net/npm/webcamjs/webcam.min.js"></script>
</head>
<body>
    <h1>Webcam Test</h1>
    <div id="my_camera"></div>
    <button onclick="take_snapshot()">Take Snapshot</button>
    <div id="results"></div>

    <script language="JavaScript">
        // Configure the webcam
        Webcam.set({
            width: 490,
            height: 350,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        // Attach webcam after the page loads
        window.onload = function() {
            Webcam.attach('#my_camera');
        };

        // Function to take a snapshot
        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                // Display the captured image
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            });
        }
    </script>
</body>
</html>
