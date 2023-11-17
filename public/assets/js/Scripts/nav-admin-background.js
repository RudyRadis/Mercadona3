const removeClassesIfPresent = () => {
    if (window.innerWidth > 1250) {
        hamburgerToggler.classList.remove('open')
        navLinksContainer.classList.remove('open')
        divBackground.classList.remove('background-anim')
    }
}

window.addEventListener('resize', removeClassesIfPresent)
removeClassesIfPresent()