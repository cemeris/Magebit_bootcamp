document.querySelector('.hamburger').onclick = function (event) {
    this.classList.toggle('active');
    document.querySelector('.sidebar').classList.toggle('open');
};