function validateForm(){
  let allValidatedOK = true;

  // check rooms
  document.getElementById('roomsFeedback').innerHTML = "";
  roomsLengthCheck = checkLength('formCreate','rooms','roomsFeedback')
  if(roomsLengthCheck == false){
    allValidatedOK = false
  }
  roomsNumbersCheck = checkNumbers('formCreate','rooms','roomsFeedback')
  if(roomsNumbersCheck == false){
    allValidatedOK = false
  }

  // check area
  document.getElementById('areaFeedback').innerHTML = "";
  areaLengthCheck = checkLength('formCreate','area','areaFeedback')
  if(areaLengthCheck == false){
    allValidatedOK = false
  }
  areaNumbersCheck = checkNumbers('formCreate','area','areaFeedback')
  if(areaNumbersCheck == false){
    allValidatedOK = false
  }

  // check price
  document.getElementById('priceFeedback').innerHTML = "";
  priceLengthCheck = checkLength('formCreate','price','priceFeedback')
  if(priceLengthCheck == false){
    allValidatedOK = false
  }
  priceNumbersCheck = checkNumbers('formCreate','price','priceFeedback')
  if(priceNumbersCheck == false){
    allValidatedOK = false
  }
  priceSpacesCheck = checkSpaces('formCreate','price','priceFeedback')
  if(priceSpacesCheck == false){
    allValidatedOK = false
  }

  // check rent
  document.getElementById('rentFeedback').innerHTML = "";
  rentLengthCheck = checkLength('formCreate','rent','rentFeedback')
  if(rentLengthCheck == false){
    allValidatedOK = false
  }
  rentNumbersCheck = checkNumbers('formCreate','rent','rentFeedback')
  if(rentNumbersCheck == false){
    allValidatedOK = false
  }

  // check address
  document.getElementById('addressFeedback').innerHTML = "";
  addressSpacesCheck = checkSpaces('formCreate','address','addressFeedback')
  if(addressSpacesCheck == false){
    allValidatedOK = false
  }
  addressLengthCheck = checkLength('formCreate','address','addressFeedback')
  if(addressLengthCheck == false){
    allValidatedOK = false
  }
  addressNumbersCheck = checkLetters('formCreate','address','addressFeedback')
  if(addressNumbersCheck == false){
    allValidatedOK = false
  }

  // check city
  document.getElementById('cityFeedback').innerHTML = "";
  citySpacesCheck = checkSpaces('formCreate','city','cityFeedback')
  if(citySpacesCheck == false){
    allValidatedOK = false
  }
  cityLengthCheck = checkLength('formCreate','city','cityFeedback')
  if(cityLengthCheck == false){
    allValidatedOK = false
  }
  cityNumbersCheck = checkLetters('formCreate','city','cityFeedback')
  if(cityNumbersCheck == false){
    allValidatedOK = false
  }

  // check municipality
  document.getElementById('municipalityFeedback').innerHTML = "";
  municipalitySpacesCheck = checkMunicipality('formCreate','municipality','municipalityFeedback')
  if(municipalitySpacesCheck == false){
    allValidatedOK = false
  }

  return allValidatedOK
}

function checkLetters(formName, inputName, feedbackId){
  // check for latin letters
  let input = document.forms[formName][inputName].value;
  let onlyLetters = /^[a-zA-Z\- .\.ÅåÄäÖöØøÆæÉéÈèÜüÊêÛûÎî0123456789]*$/.test(input);
  if (onlyLetters == false) {
    document.getElementById(feedbackId).innerHTML = "Bara de vanligaste tecknen tillåtna";
    return false;
  } else {
    return true;
  }
}

function checkNumbers(formName, inputName, feedbackId){
  // check for latin numbers
  let input = document.forms[formName][inputName].value;
  let onlyNumbers = /^[0-9.,]*$/.test(input);
  if (onlyNumbers == false) {
    document.getElementById(feedbackId).innerHTML = "Bara nummer tillåtna";
    return false;
  } else {
    return true;
  }
}

function checkSpaces(formName, inputName, feedbackId){
  // check for mutliple spaces in begining of string
  let input = document.forms[formName][inputName].value;
  let findSpaces = /^(\s\s)/.test(input);
  if (findSpaces == true) {
    document.getElementById(feedbackId).innerHTML = "För många mellanslag";
    return false;
  } else {
    return true;
  }
}

function checkLength(formName, inputName, feedbackId){
  // check if right input lenght
  let input = document.forms[formName][inputName].value;
  if (input.length < 1 || input.length > 40) {
    if (input.length > 40) {
      document.getElementById(feedbackId).innerHTML = "Max 40 bokstäver";
    } else {
      document.getElementById(feedbackId).innerHTML = "Minst en bokstäver";
    }
    return false;
  }
}

function checkMunicipality(formName, inputName, feedbackId) {
  // check if right input is other than unknown
  let muniValue = document.forms[formName][inputName].value;
  if (muniValue == 'unknown') {
    document.getElementById(feedbackId).innerHTML = "Välj en kommun";
    return false;
  }

}