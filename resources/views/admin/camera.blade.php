<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Camera Capture</title>
</head>
<body>
    <video id="video" width="640" height="480" autoplay></video><br>
    <button id="capture-btn">Capture</button>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureBtn = document.getElementById('capture-btn');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error('Error accessing camera:', err);
            });

captureBtn.addEventListener('click', () => {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;  // Set the canvas width to match the video
    canvas.height = video.videoHeight; // Set the canvas height to match the video
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    canvas.toBlob((blob) => {
        const formData = new FormData();
        formData.append('image', blob, 'image.jpg');
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        formData.append('_token', csrfToken);
        
        // Send formData to Laravel backend via AJAX
        fetch('/upload_image', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken  // Ensure CSRF token is sent in headers
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert('Image uploaded successfully');
            } else if (data.error) {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to upload image');
        });
    }, 'image/jpeg');
});

    </script>
</body>
</html>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Capture</title>
</head>
<body>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture-btn">Capture</button>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureBtn = document.getElementById('capture-btn');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error('Error accessing camera:', err);
            });

        captureBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            canvas.toBlob((blob) => {
                const formData = new FormData();
                formData.append('image', blob, 'image.jpg');

                // Add CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                formData.append('_token', csrfToken);

                // Send formData to Laravel backend via AJAX
                fetch('/upload-image', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        alert('Image uploaded successfully');
                    } else {
                        throw new Error('Failed to upload image');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to upload image');
                });
            }, 'image/jpeg');
        });
    </script>
</body>
</html>
 -->



















<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera Capture</title>
</head>
<body>
    <video id="video" width="640" height="480" autoplay></video>
    <button id="capture-btn">Capture</button>
    <canvas id="canvas" style="display: none;"></canvas>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureBtn = document.getElementById('capture-btn');

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error('Error accessing camera:', err);
            });

        captureBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const imageData = canvas.toDataURL('image/jpeg');

            // Send imageData to Laravel backend via AJAX
            // Example:
            fetch('/upload-image', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ image: imageData })
            })
            .then(response => {
                alert('wow');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
 -->