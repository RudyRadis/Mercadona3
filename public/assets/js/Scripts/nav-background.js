const removeClassesIfPresent = () => {
    if (window.innerWidth > 1250) {
        hamburgerToggler.classList.remove('open')
        navLinksContainer.classList.remove('open')
        divBackground.classList.remove('background-anim')
        scrollSecondNavText.forEach(link => {
            link.style.color = '#006d77'
            link.style.transition = 'all 0.3s ease-out'
            link.style.color = '#edf6f9'
        })
    }
}

window.addEventListener('resize', removeClassesIfPresent)
removeClassesIfPresent()