// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => filterAds(ads))

function filterAds(ads){
  const submitBtn = document.querySelector(".form__submit_btn")
  let roomSelect = document.getElementById("rooms")
  let areaSelect = document.getElementById("area")
  let priceSelect = document.getElementById("price")
  let rentSelect = document.getElementById("rent")
  // check user input on submit
  submitBtn.addEventListener('click', function(event){
    event.preventDefault()
    // check input from user
    // check min number of rooms 
    let filterRooms = ads.filter( ad => ad.rooms >= parseFloat(roomSelect.value))
    // check min area
    let filterArea = filterRooms.filter( ad => ad.area >= parseFloat(areaSelect.value))
    // check max price
    let filterPrice = filterArea.filter( ad => ad.price <= parseFloat(priceSelect.value))
    // check max rent
    let filterRent = filterPrice.filter( ad => ad.rent <= parseFloat(rentSelect.value))
    // check which buttons that are checked
    let btnTypes = document.querySelectorAll('.form__button--active')
    let filterAds
    if(btnTypes[0].id == "all-btn" || btnTypes.length > 4){
      filterAds = filterRent
      console.log("all")
    } else {
      btnTypes.forEach(element => {
        console.log(element.id)
      });
      switch (btnTypes.length) {
        case 1 : filterAds = filterRent.filter( ad => 
          ad.type == btnTypes[0].id )
          break;
        case 2 : filterAds = filterRent.filter( ad => 
          ad.type == btnTypes[0].id || 
          ad.type == btnTypes[1].id )
          break;
        case 3 : filterAds = filterRent.filter( ad => 
          ad.type == btnTypes[0].id || 
          ad.type == btnTypes[1].id || 
          ad.type == btnTypes[2].id )
          break;
        case 4 : filterAds = filterRent.filter( ad => 
          ad.type == btnTypes[0].id || 
          ad.type == btnTypes[1].id || 
          ad.type == btnTypes[2].id || 
          ad.type == btnTypes[3].id )
          break;
      }
      
    }
    showAds(filterAds)
  })
}

// show ads in DOM
function showAds(ads) {
  // console.table(ads)
  document.getElementById("addSection").innerHTML = ""
  for (let i = 0; i < ads.length; i++) {
    // show ad thats publicated
    if( ads[Object.keys(ads)[i]].publicated == "yes" ){
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
      document.getElementById("addSection").innerHTML += 
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
            <td><p>${parseInt(ads[Object.keys(ads)[i]].price).toLocaleString().replace(',',' ').replace(',',' ')} kr</p></td>
            <td><p>${parseInt(ads[Object.keys(ads)[i]].rent).toLocaleString().replace(',',' ').replace(',',' ')} kr</p></td>
          </tr>
          </table>
        </div>
      </div>`
    }
  }
}