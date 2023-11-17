const hamburgerToggler = document.querySelector('.main-nav__links-hamburger')
const navLinksContainer = document.querySelector('.main-nav__links-container')
const divBackground = document.querySelector('.background')

const toggleNav = () => {
    hamburgerToggler.classList.toggle('open')
    const ariaToggle = hamburgerToggler.getAttribute('aria-expended') === 'true' ? 'false' : 'true'
    hamburgerToggler.setAttribute('aria-expended', ariaToggle)
    navLinksContainer.classList.toggle('open')
    divBackground.classList.toggle('background-anim')
}

hamburgerToggler.addEventListener('click', toggleNav)

