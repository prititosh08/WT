function playVideo(videoId) {
    // Show the overlay
    document.querySelector('.overlay').style.display = 'block';
    // Embed the video
    var iframe = document.createElement('iframe');
    iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
    iframe.setAttribute('width', '100%');
    iframe.setAttribute('height', '100%');
    iframe.setAttribute('frameborder', '0');
    document.querySelector('.video-container').appendChild(iframe);
}

function closeVideo() {
    //close the overlay and video
    document.querySelector('.overlay').style.display = 'none';
    document.querySelector('.video-container').innerHTML = '';
}