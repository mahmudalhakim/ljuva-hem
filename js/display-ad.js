// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => showAds(ads))

// show ads in DOM
function showAds(ads) {
  // get ad_id from url 
  let ad_id = window.location.search.replace("?ad_id=", "")
  let adSection = document.getElementById("adSection")
  adSection.innerHTML = ""
  if (ads.length > 0) {
    for (let i = 0; i < ads.length; i++) {
      if( ads[Object.keys(ads)[i]].ad_id == ad_id){
      let type = ads[Object.keys(ads)[i]].type
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
      adSection.innerHTML = `
          <img src="images/${ads[Object.keys(ads)[i]].images}" class="adImg">
          <div class="product-info">
            <p class="city">${typeText.toUpperCase()}</p>
            <h3>${ads[Object.keys(ads)[i]].address}</h3>
            <p class="city">${ads[Object.keys(ads)[i]].city}</p>
            <p class="city">${ads[Object.keys(ads)[i]].tagline}</p>
            <br>
            <table>
            <thead>
              <th>Boarea</th>
              <th>Rum</th>
              <th>Pris</th>
              <th>Avgift</th>
            </thead>
            <tr>
              <td><p>${ads[Object.keys(ads)[i]].area} m²</p></td>
              <td><p>${ads[Object.keys(ads)[i]].rooms} rum</p></td>
              <td><p>${parseInt(ads[Object.keys(ads)[i]].price).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</p></td>
              <td><p>${parseInt(ads[Object.keys(ads)[i]].rent).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</p></td>
            </tr>
            </table>
          </div>
        </div>`
        // break loop when correct ad is found
        break
      } else {
        adSection.innerHTML = "<h3>&#128577; Tyvärr, annonsen finns inte!</h3>"
      }
    }
  } else {
    adSection.innerHTML = "<h3>&#128577; Tyvärr, annonsen finns inte!</h3>"
  }
}