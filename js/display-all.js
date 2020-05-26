// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => handleAds(ads))

function handleAds(ads) {
  const submitBtn = document.querySelector(".form__submit_btn")
  const roomSelect = document.getElementById("rooms")
  const areaSelect = document.getElementById("area")
  const priceSelect = document.getElementById("price")
  const rentSelect = document.getElementById("rent")
  const searchInput = document.getElementById("inputAddress")
  // FORCE CLICK!
  // searchInput.addEventListener("keyup", function(event) {
  //   if (event.keyCode === 13) {
  //     event.preventDefault();
  //     submitBtn.click();
  //   }
  // });
  // check user input on submit
  submitBtn.addEventListener('click', function filterAds(event) {
    event.preventDefault()
    // onlys show published ads
    let publishedAds = ads.filter(ad => ad.published == "yes")
    // check input from user if ok --> filter, otherwise --> feedback

    let input = searchInput.value
    let onlyLetters = /^[a-zA-Z- ÅåÄäÖöØøÆæÉéÈèÜüÊêÛûÎî0123456789]*$/.test(input);
    document.getElementById("inputFeedback").innerHTML = "";
    if (onlyLetters == false) {
      document.getElementById("inputFeedback").innerHTML = "Fel format på sökning";
    } else {
      // filter by user input
      let filteredByInput = publishedAds.filter(ad => 
        ad.municipality.toLowerCase().includes(searchInput.value.toLowerCase()) || 
        ad.city.toLowerCase().includes(searchInput.value.toLowerCase()) || 
        ad.address.toLowerCase().includes(searchInput.value.toLowerCase())
      )
      // filter by select choices
      let filteredByRooms = filteredByInput.filter(ad => ad.rooms >= parseFloat(roomSelect.value))
      let filteredByArea = filteredByRooms.filter(ad => ad.area >= parseFloat(areaSelect.value))
      let filteredByPrice = filteredByArea.filter(ad => ad.price <= parseFloat(priceSelect.value))
      let filteredByRent = filteredByPrice.filter(ad => ad.rent <= parseFloat(rentSelect.value))
      // filter by which choice buttons that are checked
      let btnTypes = document.querySelectorAll('.form__button--active')
      let filteredByTypes
      // either show all ads or only selected type of ads
      if (btnTypes[0].id == "all-btn" || btnTypes.length > 4) {
        filteredByTypes = filteredByRent
      } else {
        switch (btnTypes.length) {
          case 1: filteredByTypes = filteredByRent.filter(ad =>
            ad.type == btnTypes[0].id)
            break;
          case 2: filteredByTypes = filteredByRent.filter(ad =>
            ad.type == btnTypes[0].id ||
            ad.type == btnTypes[1].id)
            break;
          case 3: filteredByTypes = filteredByRent.filter(ad =>
            ad.type == btnTypes[0].id ||
            ad.type == btnTypes[1].id ||
            ad.type == btnTypes[2].id)
            break;
          case 4: filteredByTypes = filteredByRent.filter(ad =>
            ad.type == btnTypes[0].id ||
            ad.type == btnTypes[1].id ||
            ad.type == btnTypes[2].id ||
            ad.type == btnTypes[3].id)
            break;
        }
      }
      showAds(filteredByTypes)
      }
  })
}
// show ads in DOM
function showAds(ads) {
  let adSection = document.getElementById("adSection")
  adSection.innerHTML = ""
  if (ads.length > 0) {
    for (let i = 0; i < ads.length; i++) {
      let type = ads[Object.keys(ads)[i]].type;
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
      adSection.innerHTML +=
        `<div id="${Object.keys(ads)[i]}" class="product">
          <div>
            <a href="show-one.php?ad_id=${ads[Object.keys(ads)[i]].ad_id}"><img src="images/${ads[Object.keys(ads)[i]].image_hero}"></a>
          </div>
          <div class="product-info">
            <p class="city">${typeText.toUpperCase()}</p>
            <a href="show-one.php?ad_id=${ads[Object.keys(ads)[i]].ad_id}"><h3>${ads[Object.keys(ads)[i]].address}</h3></a>
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
            <a href="show-one.php?ad_id=${ads[Object.keys(ads)[i]].ad_id}">Läs mer</a>
          </div>
        </div>`
    }
  } else {
    adSection.innerHTML = "<h3>&#128577; Tyvärr, inga bostäder matchade dina sökkriterier!</h3>"
  }
}