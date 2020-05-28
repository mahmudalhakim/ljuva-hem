function validateForm(){
  let allValidatedOK = true;

  // check email
  document.getElementById('emailFeedback').innerHTML = "";
  emailCheck = checkEmail('login','email','emailFeedback')
  if(emailCheck == false){
    allValidatedOK = false
  }
  emailLengthCheck = checkLength('login','email','emailFeedback')
  if(emailLengthCheck == false){
    allValidatedOK = false
  }

  // check password
  document.getElementById('passwordFeedback').innerHTML = "";
  passwordCheck = checkPassword('login','password','passwordFeedback')
  if(passwordCheck == false){
    allValidatedOK = false
  }

  return allValidatedOK
}

function checkLength(formName, inputName, feedbackId){
  // check if right input lenght
  let input = document.forms[formName][inputName].value;
  if (input.length < 5 || input.length > 40) {
    if (input.length > 40) {
      document.getElementById(feedbackId).innerHTML = "Max 40 tecken";
    } else {
      document.getElementById(feedbackId).innerHTML = "Minst 5 tecken";
    }
    return false;
  }
}

function checkEmail(formName, inputName, feedbackId){
  // check for 
  let input = document.forms[formName][inputName].value;
  let onlyLetters = /^[a-zA-Z\.-0123456789@]*$/.test(input);
  let includesAt = input.includes('@');
  let includesDot = input.includes('.');
  if (onlyLetters == false || includesAt == false || includesDot == false) {
    document.getElementById(feedbackId).innerHTML = "Fel format på e-mail";
    return false;
  } else {
    return true;
  }
}

function checkPassword(formName, inputName, feedbackId){
  // check for allowed characters & length
  let input = document.forms[formName][inputName].value;
  let allowedCharacters = /^[a-zA-Z-_ÅåÄäÖöØøÆæÉéÈèÜüÊêÛûÎî0123456789!?@#$%^&*.]*$/.test(input);
  if (allowedCharacters == false) {
    document.getElementById(feedbackId).innerHTML = "Kan endast bestå av bokstäver, siffror eller !@#$%^&*-_";
    return false;
  } else if (input.length < 5 || input.length > 20) {
    if (input.length < 5) {
      document.getElementById(feedbackId).innerHTML = "Lösenordet måste vara minst 5 tecken";
    } else {
      document.getElementById(feedbackId).innerHTML = "Lösenordet får vara max 20 tecken";
    }
    return false;
  } else {
    return true;
  }
}