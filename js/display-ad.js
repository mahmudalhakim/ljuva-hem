// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => showAds(ads))

// show ads in DOM
function showAds(ads) {
  // get ad_id from url 
  let ad_id = window.location.search.replace("?ad_id=", "")
  let adSection = document.getElementById("adSectionSingle")
  adSection.innerHTML = ""
  if (ads.length > 0) {
    for (let i = 0; i < ads.length; i++) {
      if (ads[Object.keys(ads)[i]].ad_id == ad_id) {
        let type = ads[Object.keys(ads)[i]].type
        let images = ads[Object.keys(ads)[i]].images
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
        let muniText = ads[Object.keys(ads)[i]].municipality.toUpperCase()+" kommun".toUpperCase()
        adSection.innerHTML += `
        <div><img src="images/${ads[Object.keys(ads)[i]].image_hero}" class="adImg--single adImg--main"></div>`
        adSection.innerHTML += `
          <div class="product-info--single">
            <div class="ad-single--desc">     
              <h1>${ads[Object.keys(ads)[i]].address}, ${ads[Object.keys(ads)[i]].city}</h1>  
              <p class="city">${muniText}</p>
              <p class="city">${ads[Object.keys(ads)[i]].tagline}</p>
              <h2>Beskrivning</h2>         
              <p class="city">${ads[Object.keys(ads)[i]].description}</p>      
              <br>
            </div>

            <div class="ad-single--info">
              <table class="table__ad-single">
              <tr>
                <th>Typ</th>
                <td>${typeText}</td>
              </tr>
              <tr>
                <th>Boarea</th>
                <td>${ads[Object.keys(ads)[i]].area} m²</td>
                </tr>
                <tr>
                <th>Rum</th>
                <td>${ads[Object.keys(ads)[i]].rooms} rum</td>
                </tr>
                <tr>
                <th>Pris</th>
                <td>${parseInt(ads[Object.keys(ads)[i]].price).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</td>
                </tr>
                <tr>
                <th>Avgift</th>             
                <td>${parseInt(ads[Object.keys(ads)[i]].rent).toLocaleString().replace(',', ' ').replace(',', ' ')} kr</td>
                </tr>
              </table>
            </div>

          </div>
        </div>`


        adSection.innerHTML += `
        <div class="product-info--single">
          <h2>Alla bilder</h2>
        </div>`
        for (let j = 0; j < images.length; j++) {
          const image = images[j];
          if( image !== ''){
            adSection.innerHTML += `<div><img src="images/${ads[Object.keys(ads)[i]].images[j]}" class="adImg--single"></div>`
          }
        }        
        // break loop when correct ad is found
        break
      } else {
        adSection.innerHTML = "<h3>&#128577; Tyvärr, annonsen hittas inte!</h3>"
      }
    }
  } else {
    adSection.innerHTML = "<h3>&#128577; Tyvärr, annonsen finns inte!</h3>"
  }
}