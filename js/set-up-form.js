setSelectOptions()
setTypeBtns()

// set choice btns and switch style on click
function setTypeBtns(){
  let btnTypes = document.querySelectorAll('.form__button')
  let btnChoices = document.querySelectorAll('.form__button--choice')
  const allBtn = document.getElementById('all-btn')
  btnTypes.forEach(btn => {
    btn.addEventListener('click', function toggleClickedBtn(event) {
      event.preventDefault()
      // if clicked btn is a single choice btn, either add or remove active style
      if(this.id !== "all-btn") {
        if(this.classList.contains("form__button--active")){
          this.classList.remove("form__button--active")
        } else {
          this.classList.add("form__button--active")
        }
        let isItChecked = 0;
        btnChoices.forEach(btn => {
          if(btn.classList.contains("form__button--active")){
            isItChecked++;
          }
        })
        // if 0 or 1+ choices is checked toggle active style on choose-all-btn
        if( isItChecked > 0 ){
          allBtn.classList.remove('form__button--active')
        } else {
          allBtn.classList.add('form__button--active')
        }
      }
      // if clicked btn is choose-all-btn, add or remove active style both from this and others
      if( this.id == "all-btn" && !this.classList.contains("form__button--active")){
        allBtn.classList.add('form__button--active')
        btnChoices.forEach(btn => {
          if(btn.classList.contains("form__button--active")){
            btn.classList.remove('form__button--active')
          }
        })
      }
    })
  });
}

// set select values
function setSelectOptions(){
  // declare variables
  let roomSelect = document.getElementById("rooms")
  let areaSelect = document.getElementById("area")
  let priceSelect = document.getElementById("price")
  let rentSelect = document.getElementById("rent")
  // rooms
  for(let i = 1; i <= 15; i++){
    if( i <= 8 ){ roomSelect.innerHTML += `<option value="${i}">minst ${i}</option>` }
    if( i < 4 ){ roomSelect.innerHTML += `<option value="${i+0.5}">minst ${i+0.5}</option>` }
    if( i == 10 ){ roomSelect.innerHTML += `<option value="${i}">minst ${i}</option>` }
    if( i == 15 ){ roomSelect.innerHTML += `<option value="${i}">minst ${i}</option>` }
  }
  // area
  for( let i = 20; i <= 250; i += 5 ){
    if( i <= 155 ){ areaSelect.innerHTML += `<option value="${i}">minst ${i} m²</option>`} 
    else if( i <= 180 && i%10 == 0 ){ areaSelect.innerHTML += `<option value="${i}">minst ${i} m²</option>` } 
    else if ( i <= 200 && i%200 == 0 ){ areaSelect.innerHTML += `<option value="${i}">minst ${i} m²</option>` } 
    else if ( i <= 250 && i%50 == 0 ){ areaSelect.innerHTML += `<option value="${i}">minst ${i} m²</option>` }
  }
  // price 
  for( let i = 100000; i <= 13000000; i += 50000){
    if( i <= 150000 && i%100000 == 0){ priceSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ')} kr</option>` } 
    else if (i <= 2500000 && i%250000 == 0){ priceSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ').replace(',',' ')} kr</option>` } 
    else if ( i <= 6000000 & i%500000 == 0){ priceSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ').replace(',',' ')} kr</option>` } 
    else if ( i <= 13000000 & i%1000000 == 0){ priceSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ').replace(',',' ')} kr</option>` }
  }
  // rent 
  for( let i = 0; i <= 20000; i += 500){
    if( i <= 5000 && i%500 == 0){ rentSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ')} kr</option>` } 
    else if ( i <= 9000 & i%1000 == 0){ rentSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ').replace(',',' ')} kr</option>` } 
    else if ( i <= 20000 & i%5000 == 0){ rentSelect.innerHTML += `<option value="${i}">${i.toLocaleString().replace(',',' ').replace(',',' ')} kr</option>` }
  }
}