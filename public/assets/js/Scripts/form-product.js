const promoBool = document.querySelector('#product_edit_promoBool')
const price = document.querySelector('#product_edit_price')
const promoValue = document.querySelector('#product_edit_promoValue')
const promoPrice = document.querySelector('#product_edit_promoPrice')
const creationDateMonth = document.querySelector('#product_edit_creationDate_month')
const creationDateDay = document.querySelector('#product_edit_creationDate_day')
const creationDateYear = document.querySelector('#product_edit_creationDate_year')
const endingDateMonth = document.querySelector('#product_edit_endingDate_month')
const endingDateDay = document.querySelector('#product_edit_endingDate_day')
const endingDateYear = document.querySelector('#product_edit_endingDate_year')

function updatePromoPrice() {
    const priceValue = parseFloat(price.value) || 0
    // console.log('priceValue = ' + priceValue)
    const promoValueValue = parseFloat(promoValue.value) || 0
    // console.log('promoValueValue = ' + promoValueValue)
    const promoPriceValue = priceValue * (1 - (promoValueValue / 100))
    // console.log('promoPriceValue = ' + (Math.ceil(promoPriceValue * 100) / 100).toFixed(2))
    if (promoBool.checked && price.value.trim() != '' && promoValue.value.trim() != '') {
        promoPrice.value = (Math.ceil(promoPriceValue * 100) / 100).toFixed(2)
    } else {
        promoPrice.value = ''
    }
}

price.addEventListener('input', updatePromoPrice)
promoValue.addEventListener('input', updatePromoPrice)

document.addEventListener('DOMContentLoaded', function () {
    // edf6f9
    function toggleFields(condition) {
        if (condition) {
            promoValue.disabled = true
            promoPrice.disabled = true
            promoValue.style.backgroundColor = 'grey'
            promoPrice.style.backgroundColor = 'grey'
            promoValue.value = ''
            promoPrice.value = ''
            creationDateMonth.disabled = true
            creationDateDay.disabled = true
            creationDateYear.disabled = true
            endingDateMonth.disabled = true
            endingDateDay.disabled = true
            endingDateYear.disabled = true
            creationDateMonth.selectedIndex = 0
            creationDateDay.selectedIndex = 0
            creationDateYear.selectedIndex = 0
            endingDateMonth.selectedIndex = 0
            endingDateDay.selectedIndex = 0
            endingDateYear.selectedIndex = 0
        } else {
            promoValue.disabled = false
            promoPrice.disabled = true
            promoValue.style.backgroundColor = ''
            promoPrice.style.backgroundColor = ''
            creationDateMonth.disabled = ''
            creationDateDay.disabled = ''
            creationDateYear.disabled = ''
            endingDateMonth.disabled = ''
            endingDateDay.disabled = ''
            endingDateYear.disabled = ''
        }
    }

    promoBool.addEventListener('change', function () {
        toggleFields(!promoBool.checked)
    })

    toggleFields(!promoBool.checked)
})

document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form')

    form.addEventListener('submit', function (event) {
        const creationDate = new Date(creationDateYear.value, creationDateMonth.value - 1, creationDateDay.value)
        const endingDate = new Date(endingDateYear.value, endingDateMonth.value - 1, endingDateDay.value)

        if (promoBool.checked && promoValue.value.trim() == '') {
            event.preventDefault()
            alert("Le produit en promotion n'a pas de promotion.")
        } else if (promoBool.checked && (promoValue.value < 0 || promoValue.value > 100)) {
            event.preventDefault()
            alert('La valeur de promotion doit être entre 0 et 100.')
        } else if (promoBool.checked && (creationDateYear.selectedIndex == 0 || creationDateMonth.selectedIndex == 0 || creationDateDay.selectedIndex == 0)) {
            event.preventDefault()
            alert('Veuillez compléter la date de création de la promotion.')
        } else if (promoBool.checked && (endingDateYear.selectedIndex == 0 || endingDateMonth.selectedIndex == 0 || endingDateDay.selectedIndex == 0)) {
            event.preventDefault()
            alert('Veuillez compléter la date de fin de la promotion.')
        } else if (promoBool.checked && endingDate < creationDate) {
            event.preventDefault()
            alert('La date de fin doit être postérieure à la date de création.')
        } else {
            promoPrice.disabled = false
        }

        if (!promoBool.checked) {
            console.log('rrr')
            creationDateYear.selectedIndex = 0
            creationDateMonth.selectedIndex = 0
            creationDateDay.selectedIndex = 0
            endingDateYear.selectedIndex = 0
            endingDateMonth.selectedIndex = 0
            endingDateDay.selectedIndex = 0
            // creationDateMonth.disabled = true
            // creationDateDay.disabled = true
            // creationDateYear.disabled = true
            // endingDateMonth.disabled = true
            // endingDateDay.disabled = true
            // endingDateYear.disabled = true
            // creationDateYear.value = null
            // creationDateMonth.value = null
            // creationDateDay.value = null
            // endingDateMonth.value = null
            // endingDateDay.value = null
            // endingDateYear.value = null
        }
        
    })
})


