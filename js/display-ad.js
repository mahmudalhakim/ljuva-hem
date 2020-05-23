console.log(window.location.search)

// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => showAds(ads))

// show ads in DOM
function showAds(ads) {
  let adSection = document.getElementById("adSection")
  adSection.innerHTML = ""
  if (ads.length > 0) {
    let type = ads[Object.keys(ads)[0]].type
    let typeText = ""
    switch (type) {
      case 'flat':
        typeText = 'Lägenhet';
        break;
      case 'house':
        typeText = 'Villa';
        break;
      case 'townhouse':
        typeText = 'Radhus';
        break;
      case 'countryhouse':
        typeText = 'Fritidshus';
        break;
      case 'other':
        typeText = 'Övrigt';
        break;
    }
    adSection.innerHTML += `
          <img src="images/${ads[Object.keys(ads)[0]].images}" class="adImg">
          <div class="product-info">
            <p class="city">${typeText.toUpperCase()}</p>
            <h3>${ads[Object.keys(ads)[0]].address}</h3>
            <p class="city">${ads[Object.keys(ads)[0]].city}</p>
            <p class="city">${ads[Object.keys(ads)[0]].tagline}</p>
            <br>
            <table>
            <thead>
              <th>Boarea</th>
              <th>Rum</th>
              <th>Pris</th>
              <th>Avgift</th>
            </thead>
            <tr>
              <td><p>${ads[Object.keys(ads)[0]].area} m²</p></td>
              <td><p>${ads[Object.keys(ads)[0]].rooms} rum</p></td>
              <td><p>${parseInt(ads[Object.keys(ads)[0]].price).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</p></td>
              <td><p>${parseInt(ads[Object.keys(ads)[0]].rent).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</p></td>
            </tr>
            </table>
          </div>
        </div>`
  } else {
    adSection.innerHTML = "<h3>&#128577; Tyvärr, annonsen finns inte!</h3>"
  }
}