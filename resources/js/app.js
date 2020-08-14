require('./bootstrap');

const scrollButton = document.querySelector('#toTopBtn');

if (scrollButton) {
    window.addEventListener('scroll', function () {
        if (document.documentElement.scrollTop > 70) {
            scrollButton.style.display = "block";
        } else {
            scrollButton.style.display = "none";
        }
    })

    scrollButton.addEventListener('click', function () {
        window.scroll({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    });
}


