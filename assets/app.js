(()=>{"use strict";

const sliderItem = document.querySelector('.slider')
const sliderSquer = document.querySelector('.slider__square')
const sliderImageHorizont = document.querySelector('.slider__image-horizont')
const youtubes = document.querySelectorAll('.swiper-slide.youtube')
const modalItem = document.querySelectorAll('.modal')
const sliderImagesModals = document.querySelectorAll('.slider__images--modal')
const videoSrc = document.querySelector('.iframe').getAttribute("src")

const mediaQuery = window.matchMedia('(min-width: 769px)')

let clicked = false
let msnrySlider
let isMobileWidth = window.innerWidth < 769
let sliderThumbs
let carousel

function sliderThumbActive(images, thumbs) {
  if (images && thumbs) {
  sliderThumbs = new Swiper(thumbs, {
      direction: getDirection(),
      slidesPerView: 'auto',
      speed: 600,
      grabCursor: true,
      spaceBetween: 6,
      on: {
        click: function () {
          clicked = true
          if (mediaQuery.matches) {
            sliderThumbs.changeDirection(getDirection())
            sliderItem.classList.add('slider-vertical')
            sliderThumbs.wrapperEl.classList.add('slider-grid')
            youtubes.forEach(el => {
              el.classList.add('ratio-16x9')
            })
            if (this.clickedSlide.classList.contains('ratio-16x9')) {
              clicked = false
              sliderThumbs.changeDirection(getDirection())
              sliderItem.classList.remove('slider-vertical')
              sliderThumbs.wrapperEl.classList.remove('slider-grid')
              youtubes.forEach(el => el.classList.remove('ratio-16x9'))
            }
            if (document.querySelector('.slider-grid')) {
              masonrySlider()
            } else {
              masonrySliderDelete()
            }
          }
        }
      },
      breakpoints: {
        0: {
          direction: 'horizontal',
          spaceBetween: 4,
          allowSlideNext: true,
          allowSlidePrev: true,
          slideToClickedSlide: true,
        },
        768: {
          allowSlideNext: false,
          allowSlidePrev: false,
        }
      }
    })

    function getDirection() {
      let direction = clicked ? 'vertical' : 'horizontal'
      return direction
    }

    const sliderImages = new Swiper(images, {
      direction: 'horizontal',
      slidesPerView: 1,
      spaceBetween: 24,
      speed: 600,
      mousewheel: false,
      keyboard: false,
      allowSlidePrev: false,
      allowSlideNext: false,
      // grabCursor: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      freeMode: true,
      // allowTouchMove: true,
      on: {
        slideChange: function () {
          if (mediaQuery.matches) {
              clicked = true
                sliderItem.classList.add('slider-vertical')
                sliderThumbs.changeDirection(getDirection())
                sliderThumbs.wrapperEl.classList.add('slider-grid')
                console.log(this.activeIndex)
                if (this.activeIndex === 0) {
                  clicked = false
                  sliderThumbs.changeDirection(getDirection())
                  sliderItem.classList.remove('slider-vertical')
                  sliderThumbs.wrapperEl.classList.remove('slider-grid')
                  youtubes.forEach(el => el.classList.remove('ratio-16x9'))
                }
                if (document.querySelector('.slider-grid')) {
                  masonrySlider()
                } else {
                    masonrySliderDelete()
                }
          } else {
            sliderThumbs.wrapperEl.classList.remove('slider-grid')
          }
        }
      },
      thumbs: {
        swiper: sliderThumbs
      },
      breakpoints: {
        0: {
          direction: 'horizontal',
          autoHeight: true,
          mousewheel: true,
          keyboard: true,
          allowSlidePrev: true,
          allowSlideNext: true
        }
      },
    })

  }
}

function masonrySlider() {
  msnrySlider = new Masonry( document.querySelector('.slider-grid'), {
    gutter: 8,
    columnWidth: 110,
    percentPosition: true,
  })
}

function masonrySliderDelete() {
  msnrySlider.destroy();
}

function sliderImageActive(images) {
const sliderImagesSquer = new Swiper(images, {
  direction: 'horizontal',
  slidesPerView: 1,
  spaceBetween: 24,
  speed: 600,
  mousewheel: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  },
  grabCursor: true,
})
}

if (isMobileWidth) {
  sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
  sliderThumbActive('.slider__images--offer01', '.slider-thumb__images--offer01')
  sliderThumbActive('.slider__images--offer02', '.slider-thumb__images--offer02')
} else {
  sliderThumbActive('.slider__images--main', '.slider-thumb__images--main')
}

if (sliderSquer || sliderImageHorizont) {
  sliderImageActive('.slider__square')
  sliderImageActive('.slider__image-horizont')
}

//modals
function sliderModals(modal) {
  carousel = new bootstrap.Carousel(modal, {
    touch: true
  })
}

let src
let srcUrl
let videoURL
let videoIFrame
let iframeUrl

modalItem.forEach(modal => {
  if(modal) {
    modal.addEventListener('show.bs.modal', function (e) {
      let invoker = e.relatedTarget
      console.log(modal)
      console.log(invoker)
      iframeUrl = this.querySelector('.iframe')
      videoURL = iframeUrl.getAttribute('src')
      src = "?rel=0&autoplay=1"
      srcUrl = videoURL+src
      iframeUrl.setAttribute('src', srcUrl)


      sliderImagesModals.forEach(slider => {
        console.log(slider)
        sliderModals(slider)
        carousel.to(invoker.getAttribute('data-slider') - 1)
        slider.addEventListener('slid.bs.carousel', function(e) {

          var currentSlide = this.querySelector('.carousel-item')
          if (currentSlide) {
            videoIFrame = this.querySelector('.iframe')
            videoURL = videoIFrame.setAttribute('src', videoSrc);
            if (videoURL === videoIFrame.setAttribute('src', srcUrl)) {
              videoIFrame.setAttribute('src', videoSrc)
            }
            if (videoIFrame && videoIFrame.setAttribute('src', videoSrc)) {
              videoIFrame.setAttribute('src', srcUrl)
            }
          }
      })
    })
    modal.addEventListener('hidden.bs.modal', function(e) {
      iframeUrl = this.querySelector('.iframe')
      iframeUrl.setAttribute('src', videoSrc)
    });
  })

  }
})
//togglepassword
if (document.querySelector('.registration-form')) {
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('.password-eye');

  togglePassword.addEventListener('click', function() {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    const icon = this.getAttribute('class') === 'fa-regular fa-eye-slash' ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
    this.setAttribute('class', icon);
  });
}
//popup
const staticBackdrop = document.getElementById('staticBackdrop')
const staticBackdropVidio = document.getElementById('staticBackdropVidio')
if (staticBackdropVidio) {
    staticBackdropVidio.addEventListener('show.bs.modal', event => {
    const iframe = event.relatedTarget
    const recipient = iframe.getAttribute('data-bs-gallery')
    const modalBodyIframe = staticBackdropVidio.querySelector('.modal-body iframe')
    modalBodyIframe.src = recipient
  })
}

if (staticBackdrop) {
    staticBackdrop.addEventListener('show.bs.modal', event => {
    const img = event.relatedTarget
    const recipient = img.getAttribute('data-bs-gallery')
    const modalBodyImg = staticBackdrop.querySelector('.modal-body img')
    modalBodyImg.src = recipient
  })
}
//risize home
if (document.querySelector('.body-home')) {
  let vp,
    vidw = 640,
    vidh = 360,
    resizeTimeout;

  const resize = () => {
    const w = window,
      d = document,
      e = d.documentElement,
      g = d.getElementsByTagName("body")[0],
      iw = w.innerWidth || e.clientWidth || g.clientWidth,
      ih = w.innerHeight || e.clientHeight || g.clientHeight,
      wf = iw / vidw,
      hf = ih / vidh;

    let nw, nh, dx, dy;
    if (wf >= hf) {
      nw = iw;
      nh = vidh * wf;
      dx = 0;
      dy = -0.5 * (vidh * wf - ih);
    } else {
      nw = vidw * hf;
      nh = ih;
      dx = -0.5 * (vidw * hf - iw);
      dy = 0;
    }

    vp.style.width = `${nw}px`;
    vp.style.height = `${nh}px`;
    vp.style.transform = `translate(${dx}px, ${dy}px)`;
  };

  window.onresize = () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(resize, 200);
  };

  // Needed to set size
  vp = document.getElementById("vp");

  // Initial resize
  resize();
}

//count
document.querySelectorAll('.count .plus').forEach(item => {
    item.addEventListener('click', function () {
        ++item.parentElement.querySelector('input').value;
        if (item.parentElement.querySelector('input').value > 1) {
            item.parentElement.querySelector('.minus').classList.remove('min');
        }
    });
});
document.querySelectorAll('.count .minus').forEach(item => {
    item.addEventListener('click', function () {
        --item.parentElement.querySelector('input').value;
        if (item.parentElement.querySelector('input').value < 2) {
            item.parentElement.querySelector('input').value = 1;
            item.classList.add('min');
        }
    });
});

//bootstrap settings
const toastTrigger = document.getElementById('liveToastBtn');
const toastLiveExample = document.getElementById('liveToast');

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show();
  });
}

if (document.querySelectorAll('[data-bs-toggle="tooltip"]')) {
  let tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
  );
  let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
}


let b=window.innerWidth<769;const w=document.querySelector("#collapseExample2"),S=document.querySelector("#navigation"),f=document.querySelector("#buyers"),q=document.querySelector("#company"),v=document.querySelectorAll(".list-footer-item-overlay");function E(e){e.classList.contains("show")&&e.classList.remove("show")}w.classList.add("show"),S.classList.add("show"),f.classList.add("show"),q.classList.add("show"),b&&(E(w),E(S),E(f),E(q),v.forEach((e=>{e.style.display="none"}))),document.querySelectorAll(".count-content").forEach((e=>{e.addEventListener("show.bs.collapse",(e=>{const t=e.target.nextSibling.nextSibling;e.target&&(console.log(t),t.querySelector(".btn-block span").innerText="",t.querySelector(".btn-block .btn").style.maxWidth="60px",t.querySelector(".btn-block span").style.paddingLeft=0)})),e.addEventListener("hidden.bs.collapse",(e=>{const t=e.target.nextSibling.nextSibling;e.target&&(t.querySelector(".btn-block span").innerText="в корзину",t.querySelector(".btn-block span").style.paddingLeft="0.5rem",t.querySelector(".btn-block .btn").style.maxWidth="100%")}))}))})();
