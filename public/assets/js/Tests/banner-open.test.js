// banner-open.test.js
global.TextEncoder = require('util').TextEncoder;
global.TextDecoder = require('util').TextDecoder;
// Utilisez jsdom pour simuler le DOM dans les tests
const { JSDOM } = require('jsdom');
const { setupButtonFilter } = require('../Scripts/banner-open.js'); // Ajustez le chemin d'accès

const dom = new JSDOM(`
  <button class='btn-filter'>Afficher les filtres</button>
  <div class='filter-product' style='display: none;'></div>
`);

global.document = dom.window.document;
global.window = dom.window;

console.log(document.querySelector('.btn-filter'));

setupButtonFilter();

describe('toggle filter functionality', () => {
  test('it toggles filter visibility and button text on click', () => {

    const buttonFilter = document.querySelector('.btn-filter');
    const divFilter = document.querySelector('.filter-product');

    // Simuler le clic en appelant directement la fonction
    buttonFilter.click(); // Premier clic
    expect(divFilter.style.display).toBe('flex');
    expect(buttonFilter.firstChild.nodeValue).toBe('Cacher les filtres');

    buttonFilter.click(); // Second clic
    expect(divFilter.style.display).toBe('none');
    expect(buttonFilter.firstChild.nodeValue).toBe('Afficher les filtres');
  });
});
