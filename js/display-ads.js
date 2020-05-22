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
  // check user input on submit
  submitBtn.addEventListener('click', function filterAds(event) {
    event.preventDefault()
    // onlys show published ads
    let publishedAds = ads.filter(ad => ad.published == "yes")
    // check input from user
    let userInput = publishedAds.filter(ad => 
      ad.municipality.toLowerCase().includes(searchInput.value.toLowerCase()) || 
      ad.city.toLowerCase().includes(searchInput.value.toLowerCase()) || 
      ad.address.toLowerCase().includes(searchInput.value.toLowerCase())
    )
    // check min number of rooms 
    let filterRooms = userInput.filter(ad => ad.rooms >= parseFloat(roomSelect.value))
    // check min area
    let filterArea = filterRooms.filter(ad => ad.area >= parseFloat(areaSelect.value))
    // check max price
    let filterPrice = filterArea.filter(ad => ad.price <= parseFloat(priceSelect.value))
    // check max rent
    let filterRent = filterPrice.filter(ad => ad.rent <= parseFloat(rentSelect.value))
    // check which buttons that are checked
    let btnTypes = document.querySelectorAll('.form__button--active')
    let filterTypes
    // either show all ads or only selected type of ads
    if (btnTypes[0].id == "all-btn" || btnTypes.length > 4) {
      filterTypes = filterRent
    } else {
      switch (btnTypes.length) {
        case 1: filterTypes = filterRent.filter(ad =>
          ad.type == btnTypes[0].id)
          break;
        case 2: filterTypes = filterRent.filter(ad =>
          ad.type == btnTypes[0].id ||
          ad.type == btnTypes[1].id)
          break;
        case 3: filterTypes = filterRent.filter(ad =>
          ad.type == btnTypes[0].id ||
          ad.type == btnTypes[1].id ||
          ad.type == btnTypes[2].id)
          break;
        case 4: filterTypes = filterRent.filter(ad =>
          ad.type == btnTypes[0].id ||
          ad.type == btnTypes[1].id ||
          ad.type == btnTypes[2].id ||
          ad.type == btnTypes[3].id)
          break;
      }
    }
    showAds(filterTypes)
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
            <img src="images/${ads[Object.keys(ads)[i]].images}">
          </div>
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
    }
  } else {
    adSection.innerHTML = "<h3>&#128577; Tyvärr, inga bostäder matchade dina sökkriterier!</h3>"
  }
}