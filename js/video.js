let listvideo = document.querySelectorAll('.video-list .vid');


listvideo.forEach(video => {
video.onclick = () =>{
  const mainvideo = document.querySelector('.main-video video');
  const title = document.querySelector('.main-video .title');
  listvideo.forEach(vid => vid.classList.remove('active'));
  video.classList.add('active');
  if(video.classList.contains('active'))
  {

    const src= video.children[0].getAttribute('src');
    mainvideo.src = src;
    const text = video.children[1].innerHTML;
    title.innerHTML=text;

  };

};

});
