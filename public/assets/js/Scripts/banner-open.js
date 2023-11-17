const buttonFilter = document.querySelector('.btn-filter')
const divFilter = document.querySelector('.filter-product')

buttonFilter.addEventListener('click', () => {
    if (buttonFilter.firstChild.nodeValue == 'Afficher les filtres') {
        divFilter.style.display = 'flex'
        buttonFilter.firstChild.nodeValue = "Cacher les filtres"
    } else {
        buttonFilter.firstChild.nodeValue = "Afficher les filtres"
        divFilter.style.display = 'none'
    }
})
