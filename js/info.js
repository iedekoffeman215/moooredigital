// Deze functie toont of verbergt extra informatie over een land wanneer erop wordt geklikt.
function toggleInfo(button) {
    const countryDiv = button.parentNode;
    countryDiv.classList.toggle('show-info');
}

// Deze functie zoekt naar landen op basis van de ingevoerde zoektekst en past de weergave aan.
function searchCountries() {
    // Haal de ingevoerde zoektekst op uit het zoekveld en zet deze om naar kleine letters.
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    
    // Selecteer alle landendivs op de pagina.
    const countryDivs = document.querySelectorAll('.country');

    // Loop door alle landendivs en vergelijk de naam en landcode met de zoektekst.
    countryDivs.forEach(countryDiv => {
        const countryName = countryDiv.querySelector('h2').textContent.toLowerCase();
        const countryCode = countryDiv.querySelector('.country-code').textContent.toLowerCase();

        // Toon of verberg het land op basis van de zoekresultaten.
        if (countryName.includes(searchInput) || countryCode.includes(searchInput)) {
            countryDiv.style.display = 'block';
        } else {
            countryDiv.style.display = 'none';
        }
    });
}
