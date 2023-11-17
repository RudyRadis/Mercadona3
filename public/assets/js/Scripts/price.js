document.addEventListener('DOMContentLoaded', function () {
    const pricePromos = document.querySelectorAll('.price__promo');
    const prices = document.querySelectorAll('.price__nopromo');
    const percentages = document.querySelectorAll('.price__percentage')

    pricePromos.forEach(function (pricePromo, index) {
        const pricePromoSpan = pricePromo.querySelector('span');
        let pricePromoValue = pricePromoSpan.textContent.trim();
        const price = prices[index]
        
        let percentageSpan = (percentages[index].querySelector('span'))

        if (pricePromoValue === '') {
            pricePromo.style.backgroundColor = 'transparent';
            price.style.textDecoration = 'none';
        } else {
            percentageSpan.textContent = '-' + percentageSpan.textContent + '%'
        }
    });
});

