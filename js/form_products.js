// declare variables
let roomSelect = document.getElementById("rooms")
let areaSelect = document.getElementById("area")
let priceSelect = document.getElementById("price")

selectOptions()
setBtns()

function setBtns(){
  const btnTypes = document.querySelectorAll('.form__button--type')
  btnTypes.forEach(btn => {
    // console.log(btn.id)
  });
}

// select values
function selectOptions(){
  // rooms
  for(let i = 1; i <= 16; i++){
    if( i <= 15 ){ roomSelect.innerHTML += `<option value="${i}">${i}</option>` }
    if( i < 15 ){ roomSelect.innerHTML += `<option value="${i+0.5}">${i+0.5}</option>` }
    if( i > 14 && i%15==0 ){ roomSelect.innerHTML += `<option value="${i}">Över 15</option>` }
  }
}