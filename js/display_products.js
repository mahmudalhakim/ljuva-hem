// get file with info and save it in local storage
makeUseable()

// get info from local storage
let products = localStorage.getItem("key")
let productsObj = JSON.parse(products)

// display products
displayProducts(productsObj)

function displayProducts(products) {
  for (let i = 0; i < Object.keys(products).length; i++) {
    document.getElementById("addSection").innerHTML += 
    `<div id="${Object.keys(products)[i]}" class="product">
      <div>
        <img src="${products[Object.keys(products)[i]].image}">
      </div>
      <div class="product-info">
        <h3>${products[Object.keys(products)[i]].address}</h3>
        <p class="city">${products[Object.keys(products)[i]].city}</p>
        <table>
          <td><p>${products[Object.keys(products)[i]].price.toLocaleString().replace(',',' ').replace(',',' ')} kr</p></td>
          <td><p>${products[Object.keys(products)[i]].area} m²</p></td>
          <td><p>${products[Object.keys(products)[i]].rooms} rum</p></td>
        </table>
      </div>
    </div>`
  }
}

function makeUseable() {
  fetch('../resources/info.json')
  .then((response) => {
    return response.json()
  })
  .then((myJson) => {
    myJson = JSON.stringify(myJson)
    localStorage.setItem("key",myJson)
  })
}