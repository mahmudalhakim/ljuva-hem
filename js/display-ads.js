// get ad info from file
fetch('information.php')
  .then(resp => resp.json())
  .then(ads => showAds(ads))


// show ads in DOM
function showAds(ads) {
  for (let i = 0; i < ads.length; i++) {
    // show ad thats publicated
    if( ads[Object.keys(ads)[i]].publicated == "yes" ){
      document.getElementById("addSection").innerHTML += 
      `<div id="${Object.keys(ads)[i]}" class="product">
        <div>
          <img src="images/${ads[Object.keys(ads)[i]].images}">
        </div>
        <div class="product-info">
          <h3>${ads[Object.keys(ads)[i]].address}</h3>
          <p class="city">${ads[Object.keys(ads)[i]].city}</p>
          <p class="city">${ads[Object.keys(ads)[i]].tagline}</p>
          <table>
            <td><p>${parseInt(ads[Object.keys(ads)[i]].price).toLocaleString().replace(',',' ').replace(',',' ')} kr</p></td>
            <td><p>${ads[Object.keys(ads)[i]].area} m²</p></td>
            <td><p>${ads[Object.keys(ads)[i]].rooms} rum</p></td>
          </table>
        </div>
      </div>`
    }
  }
}