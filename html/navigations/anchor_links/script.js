scrollToElement("#main_part");

(function () {
    addSmoothScroll();
})();


window.onhashchange = function (event) {
    event.preventDefault();
    scrollToElement(location.hash);
};

document.querySelector('.menu nav').onclick = function (event) {
    if (event.target.tagName != 'A') {
        return;
    }

    if (event.target.getAttribute('href') == location.hash) {
        event.preventDefault();
        scrollToElement(location.hash);
    }

    document.querySelector('.hamburger').classList.remove('active');
}


function scrollToElement(hash) {
    const correction = document.querySelector('.menu_wrapper').offsetHeight;
    const element = document.querySelector(hash);
    console.log(element.offsetTop, correction);
    window.scrollTo(0, element.offsetTop - correction);
}

function addSmoothScroll() {
    const style_el = document.createElement("style");
    style_el.textContent = `
html {
  scroll-behavior: smooth;
}
  `;
    document.querySelector("head").append(style_el);
}