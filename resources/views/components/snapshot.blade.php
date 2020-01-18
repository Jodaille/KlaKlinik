<video autoplay></video>

@push('js')
<script>

  (function() {
    'use strict';
    var video = document.querySelector('video')
      , canvas;

    /**
     *  generates a still frame image from the stream in the <video>
     *  appends the image to the <body>
     */
    function takeSnapshot() {
        //var img = document.querySelector('img') || document.createElement('img');
        var img = document.createElement('img');
        var context;
        var width = video.offsetWidth
        , height = video.offsetHeight;

        canvas = canvas || document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;

        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);

        img.src = canvas.toDataURL('image/png');
        document.body.appendChild(img);
        var formData = new FormData();
        formData.append('image', img.src)
        formData.append('animal_id', {{$animal_id}})
        axios.post('/api/upload', formData).then(function (response) {
            var image = document.getElementById('image')
            console.log(response.data.animal.image, image);

            if (image) {
                image.setAttribute("src", response.data.animal.image_src);
            }
        })
        .catch(function (error) {
            console.log(error);
        });
    }

    // use MediaDevices API
    // docs: https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
    if (navigator.mediaDevices) {
      // access the web cam
      navigator.mediaDevices.getUserMedia({video: true})
      // permission granted:
        .then(function(stream) {
        //   video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream
          video.addEventListener('click', takeSnapshot);
        })
        // permission denied:
        .catch(function(error) {
          //document.body.textContent = 'Could not access the camera. Error: ' + error.name;
        });
    }
  })();
</script>

@endpush
