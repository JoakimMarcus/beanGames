const Overlay = document.getElementById('Overlay')
const Cross = document.getElementById('Cross')
let removePopup = false;
if (Cross) {
    Cross.onclick = () => {
        Overlay.classList.remove('active')
        Overlay.style.display = "none"
        removePopup = true
    }
}
let oldPopupScrollHeight = 0
window.addEventListener('scroll', e => {
    const currentScrollHeight = window.scrollY;
    if (window.scrollY > 100) {
        Overlay.style.display = 'flex'
    }
    if (removePopup == true) {
        Overlay.style.display = 'none'
    }
    if (currentScrollHeight < oldPopupScrollHeight) {
        oldPopupScrollHeight = window.scrollY
    }
})