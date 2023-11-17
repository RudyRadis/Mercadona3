document.addEventListener('DOMContentLoaded', function () {
    let currentRoute = window.location.pathname
    let selectOne = document.querySelector('#list-filter')
    let selectTwo = document.querySelector('#list-price')
    let navLinks = document.querySelectorAll('.main-nav__links-container a')
    let checkPromo = document.querySelector('#isPromo-check')

    if (currentRoute === '/') {
        localStorage.setItem('selectedCategory', 'default')
        localStorage.setItem('selectedOrder', 'default')
        localStorage.setItem('checkPromo', 'false')
    }

    let lastSelectedCategory = localStorage.getItem('selectedCategory') || 'default'
    let lastSelectedOrder = localStorage.getItem('selectedOrder') || 'default'
    let lastCheckPromo = localStorage.getItem('checkPromo') === 'true'

    selectOne.value = lastSelectedCategory
    selectTwo.value = lastSelectedOrder
    checkPromo.checked = lastCheckPromo

    navLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            localStorage.setItem('selectedOrder', 'default')
            localStorage.setItem('checkPromo', 'false')
            checkPromo.checked = false
            
            let selectedCategory = this.textContent
            localStorage.setItem('selectedCategory', selectedCategory)
        })
    })

    function updateFilter() {
        let selectedCategory = selectOne.value
        let selectedOrder = selectTwo.value
        let isPromoChecked = checkPromo.checked

        localStorage.setItem('selectedCategory', selectedCategory)
        localStorage.setItem('selectedOrder', selectedOrder)
        localStorage.setItem('checkPromo', isPromoChecked)
        
        window.location.href = `/filter/${selectedCategory}/${selectedOrder}/${isPromoChecked}`
    }

    selectOne.addEventListener('change', updateFilter)
    selectTwo.addEventListener('change', updateFilter)
    checkPromo.addEventListener('click', updateFilter)
})
