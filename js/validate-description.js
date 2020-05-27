function validateForm(){
  let allValidatedOK = true;

  // check tagline
  document.getElementById('taglineFeedback').innerHTML = "";
  taglineSpacesCheck = checkSpaces('formInfo','tagline','taglineFeedback')
  if(taglineSpacesCheck == false){
    allValidatedOK = false
  }
  taglineLengthCheck = checkLengthTagline('formInfo','tagline','taglineFeedback')
  if(taglineLengthCheck == false){
    allValidatedOK = false
  }
  taglineNumbersCheck = checkLetters('formInfo','tagline','taglineFeedback')
  if(taglineNumbersCheck == false){
    allValidatedOK = false
  }

  // check description
  document.getElementById('descriptionFeedback').innerHTML = "";
  descriptionSpacesCheck = checkSpaces('formInfo','description','descriptionFeedback')
  if(descriptionSpacesCheck == false){
    allValidatedOK = false
  }
  descriptionLengthCheck = checkLengthDescription('formInfo','description','descriptionFeedback')
  if(descriptionLengthCheck == false){
    allValidatedOK = false
  }
  descriptionNumbersCheck = checkLetters('formInfo','description','descriptionFeedback')
  if(descriptionNumbersCheck == false){
    allValidatedOK = false
  }

  // if everything is let form be submitted
  return allValidatedOK
}

function checkLetters(formName, inputName, feedbackId){
  // check for latin letters
  let input = document.forms[formName][inputName].value;
  let onlyLetters = /^[a-zA-Z\- ÅåÄäÖöØøÆæÉéÈèÜüÊêÛûÎî0123456789]*$/.test(input);
  if (onlyLetters == false) {
    document.getElementById(feedbackId).innerHTML = "Bara de vanligaste tecknen tillåtna";
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

function checkLengthTagline(formName, inputName, feedbackId){
  // check if right input lenght
  let input = document.forms[formName][inputName].value;
  if (input.length > 1200) {
    document.getElementById(feedbackId).innerHTML = "Max 300 tecken";
    return false;
  }
}

function checkLengthDescription(formName, inputName, feedbackId){
  // check if right input lenght
  let input = document.forms[formName][inputName].value;
  if (input.length > 1200) {
    document.getElementById(feedbackId).innerHTML = "Max 1200 tecken";
    return false;
  }
}