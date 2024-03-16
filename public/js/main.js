// Lấy tất cả các mục trong menu
const navItems = document.querySelectorAll(".nav-item");

// Gọi hàm xử lý khi một mục được click
function handleNavItemClick(event) {
    event.preventDefault();

    // Loại bỏ lớp active từ tất cả các mục
    navItems.forEach((item) => item.classList.remove("active"));

    // Thêm lớp active cho mục hiện tại
    this.classList.add("active");

    // Xác định phần mục được chọn dựa trên href của liên kết
    const targetId = this.querySelector("a").getAttribute("href").substring(1);
    const targetSection = document.getElementById(targetId);

    // Cuộn đến phần mục được chọn
    if (targetSection) {
        targetSection.scrollIntoView({ behavior: "smooth" });
    }
}

// Gán hàm xử lý cho tất cả các mục
navItems.forEach((item) => item.addEventListener("click", handleNavItemClick));


// MOBILE MENU
let menu_tablet = document.querySelector('.menu-tablet');
let menu_toggle = document.querySelector('.menu-toggle');

menu_toggle.onclick = function () {
    menu_toggle.classList.toggle('active');
    menu_tablet.classList.toggle('active');
};

// SLIDE
let big_slider = document.querySelector("#big-slider");
let big_slide_items = big_slider.querySelectorAll('.big-slide-item');
let big_slide_index = 0;
let slide_play = true;
let slide_next = big_slider.querySelector(".slide-next");
let slide_prev = big_slider.querySelector(".slide-prev");

function showSlide(index) {
    big_slider.querySelector(".big-slide-item.active").classList.remove('active');
    big_slide_items[index].classList.add('active');
}

function nextSlide() {
    big_slide_index = big_slide_index + 1 === big_slide_items.length ? 0 : big_slide_index + 1;
    showSlide(big_slide_index);
}

function prevSlide() {
    big_slide_index = big_slide_index - 1 < 0 ? big_slide_items.length - 1 : big_slide_index - 1;
    showSlide(big_slide_index);
}

slide_next.addEventListener("click", () => nextSlide());
slide_prev.addEventListener("click", () => prevSlide());

big_slider.addEventListener("mouseover", () => slide_play = false);
big_slider.addEventListener("mouseleave", () => slide_play = true);

setTimeout(() => big_slide_items[0].classList.add('active'), 200);

setInterval(() => {
    if (!slide_play) return;
    nextSlide();
}, 5000);

// Header Shrink
window.addEventListener("scroll", () => {
    const header = document.querySelector(".nav");
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        header.classList.add("shrink");
    } else {
        header.classList.remove('shrink');
    }
});

// Scroll Animation
let scroll = window.requestAnimationFrame || function (callback) {
    window.setTimeout(callback, 1000 / 60);
};

let el_to_show = document.querySelectorAll('.show-on-scroll');

function isElInViewPort(el) {
    let rect = el.getBoundingClientRect();
    let distance = 200;
    return rect.top <= (window.innerHeight - distance || document.documentElement.clientHeight - distance);
}

function loop() {
    el_to_show.forEach(el => {
        if (isElInViewPort(el))
            el.classList.add('show');
    });
    scroll(loop);
}

loop();

// PROGRESS BAR
let scrollPercentage = () => {
    let scrollProgress = document.getElementById('progress-bar');
    let progressVal = document.getElementById("progress-val");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollVal = Math.round(pos * 100 / calcHeight);
    scrollProgress.style.background = `conic-gradient(#e70634 ${scrollVal}%, #2b2f38 ${scrollVal}%)`;
};

window.onscroll = scrollPercentage;
window.onload = scrollPercentage;

// MOBILE NAV
var list = document.querySelectorAll('.item');

function activeLink() {
    list.forEach((item) => item.classList.remove('active'));
    this.classList.add('active');
}

list.forEach((item) => item.addEventListener('click', activeLink));



// cuộn heaher
const header = document.querySelector('.header');
let lastScrollTop = 0;

window.addEventListener('scroll', function() {
  const scrollTop = window.scrollY;
  if (scrollTop > lastScrollTop) {
    // Cuộn xuống, ẩn header
    header.style.opacity = '0';
    header.style.transform = 'translateY(-100%)';
  } else {
    // Cuộn lên, hiện header
    header.style.opacity = '1';
    header.style.transform = 'translateY(0)';
  }
  lastScrollTop = scrollTop;
});




// ĐỔI MÀU SETTING

