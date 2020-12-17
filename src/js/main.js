'use strict';

function changesOnScroll() {
  const lastPosition = [0];
  const $header = document.querySelector('header');
  const $totop = document.getElementById('toTop');

  if (document.documentElement.scrollTop > 400) {
    $header.classList.add('scroll', 'goDown');
    $header.classList.add('is-scrolling');
    $totop.classList.add('show');
  } else {
    $header.classList.remove('scroll', 'goDown');
    $header.classList.remove('is-scrolling');
    $totop.classList.remove('show');
    lastPosition[0] = document.documentElement.scrollTop;
  }
} // Sub menu item toggle

function mobileMenuFunc() {
  // Menu button toggle
  const menuItemWithChildren = document.querySelectorAll(
    '.menu-item-has-children'
  );

  const $burgertoggler = document.getElementById('burgertoggler');
  $burgertoggler.addEventListener('click', function () {
    const isMenuOpen = JSON.parse($burgertoggler.getAttribute('aria-expanded'));
    if (isMenuOpen) {
      $burgertoggler.classList.remove('activated');
      document.querySelector('body').classList.remove('menu-open');
      document.querySelector('header').classList.remove('menu-open');
      // also close all the submenus when closing the main menu
      menuItemWithChildren.forEach((item) => {
        item.classList.remove('show');
        item.querySelector('.dropdown-menu').classList.remove('show');
      });
    } else {
      $burgertoggler.classList.add('activated');
      document.querySelector('body').classList.add('menu-open');
      document.querySelector('header').classList.add('menu-open');
    }
  });

  if (window.screen.width <= 768) {
    function openAndClose() {
      if (!this.classList.contains('show')) {
        this.classList.add('show');
        this.querySelector('.dropdown-menu').classList.add('show');
      } else {
        this.classList.remove('show');
        this.querySelector('.dropdown-menu').classList.remove('show');
      }
    }

    menuItemWithChildren.forEach((item) => {
      item.addEventListener('click', openAndClose);
    });
  } else {
    menuItemWithChildren.forEach((item) =>
      item.removeEventListener('click', openAndClose)
    );
  }

  window.addEventListener('resize', mobileMenuFunc);
}

// Youtube API
var tag = document.createElement('script');

tag.src = 'https://www.youtube.com/iframe_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

const homepageVideo = document.querySelector('.home .iframe-wrapper .iframe');

if (homepageVideo) {
  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('videoIframe', {
      height: '390',
      width: '640',
      videoId: homepageVideo.dataset.youtubeId,
      events: {
        onReady: onPlayerReady,
        onStateChange: onPlayerStateChange,
      },
    });
  }
}

function onPlayerReady(event) {
  event.target.playVideo();
  event.target.mute();
}

var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    // setTimeout(stopVideo, 6000);
    document.querySelector('.video-overlay').classList.add('video-is-active');
    done = true;
  } else {
    document
      .querySelector('.video-overlay')
      .classList.remove('video-is-active');
  }
}

function stopVideo() {
  player.stopVideo();
}
// END Youtube API

document.addEventListener('DOMContentLoaded', function () {
  const elem = document.querySelector('.industries-wrapper');
  if (elem) {
    const industryIsotope = new Isotope(elem, {
      itemSelector: '.industry',
      layoutMode: 'masonry',
    });
  }

  window.onload = function () {
    changesOnScroll();
  };
  window.onscroll = function () {
    changesOnScroll();
  };

  window.addEventListener('load', mobileMenuFunc);

  var testimonials = new Swiper('.testimonials .testimonies-wrapper', {
    speed: 400,
    loop: true,
    grabCursor: true,
    slidesPerView: 1,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    watchSlidesVisibility: true,
    breakpoints: {
      769: {
        slidesPerView: 2,
      },
    },
  });
});
