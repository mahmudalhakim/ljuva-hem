// get select from DOM
let select = document.getElementById("municipality")

// get muni info from json
function getMuni() {
  fetch('resources/munipicipalities.json')
  .then( municipalities => municipalities.json() )
  .then (municipalities => muniToSelectOptions(municipalities))
  function muniToSelectOptions(municipalities){
    for(let i = 0; i < Object.keys(municipalities.municipalities).length; i++){
      let key = Object.keys(municipalities.municipalities)[i]
      let municipality = municipalities.municipalities[key].municipality
      select.innerHTML += `<option value="${municipality}">${municipality}</option>`
    }
  }
}
getMuni()