const scrollMainNav = document.querySelector('nav')
const scrollSecondNav = document.querySelector('.main-nav__links-container')
const scrollSecondNavText = document.querySelectorAll('.main-nav__links-container a')
const scrollTextHover = document.querySelectorAll('.main-nav__links-container')

window.addEventListener('scroll', () => {
    if (window.scrollY > 300 && window.innerWidth <= 500) {
        scrollMainNav.classList.add('anim-nav')
        scrollSecondNav.style.backgroundColor = '#ffddd2'
        scrollSecondNav.style.transition = 'all 0.3s ease-out'
        scrollSecondNavText.forEach(link => {
            link.style.color = '#006d77'
            link.style.transition = 'all 0.3s ease-out'
        })
        scrollTextHover.forEach(link => {
            link.classList.add('scrolled')
        })
    } else if (window.scrollY > 266 && window.innerWidth <= 900) {
        scrollMainNav.classList.add('anim-nav')
        scrollSecondNav.style.backgroundColor = '#ffddd2'
        scrollSecondNav.style.transition = 'all 0.3s ease-out'
        scrollSecondNavText.forEach(link => {
            link.style.color = '#006d77'
            link.style.transition = 'all 0.3s ease-out'
        })
        scrollTextHover.forEach(link => {
            link.classList.add('scrolled')
        })
    } else if (window.scrollY > 300 && window.innerWidth <= 1250) {
        scrollMainNav.classList.add('anim-nav')
        scrollSecondNav.style.backgroundColor = '#ffddd2'
        scrollSecondNav.style.transition = 'all 0.3s ease-out'
        scrollSecondNavText.forEach(link => {
            link.style.color = '#006d77'
            link.style.transition = 'all 0.3s ease-out'
        })
        scrollTextHover.forEach(link => {
            link.classList.add('scrolled')
        })
    } else if (window.scrollY > 300 && window.innerWidth > 1250) {
        scrollMainNav.classList.add('anim-nav')
        scrollSecondNav.style.backgroundColor = ''
        scrollSecondNav.style.transition = 'all 0.3s ease-out'
        scrollSecondNavText.forEach(link => {
            link.style.color = '#edf6f9'
            link.style.transition = 'all 0.3s ease-out'
        })
        scrollTextHover.forEach(link => {
            link.classList.add('scrolled')
        })
    } else {
        scrollMainNav.classList.remove('anim-nav')
        scrollSecondNav.style.backgroundColor = ''
        scrollSecondNav.style.transition = 'all 0.3s ease-out'
        scrollSecondNavText.forEach(link => {
            link.style.color = '#edf6f9'
            link.style.transition = 'all 0.3s ease-out'
        })
        scrollTextHover.forEach(link => {
            link.classList.remove('scrolled')
        })
    }
})