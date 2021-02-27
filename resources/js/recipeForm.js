const needsSideDish = document.querySelector('#needsSideDish');
const isSideDish = document.querySelector('#isSideDish');

window.addEventListener('load', function () {
    if (needsSideDish.checked) {
        isSideDish.setAttribute('disabled', '')
    } else if (isSideDish.checked) {
        needsSideDish.setAttribute('disabled', '')
    }
})

needsSideDish.addEventListener('change', function () {
    if (needsSideDish.checked) {
        isSideDish.setAttribute('disabled', '')
    } else {
        isSideDish.removeAttribute('disabled')
    }
})

isSideDish.addEventListener('change', function () {
    if (isSideDish.checked) {
        needsSideDish.setAttribute('disabled', '')
    } else {
        needsSideDish.removeAttribute('disabled')
    }
})