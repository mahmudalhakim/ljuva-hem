function validateForm(){
  let allValidatedOK = true;

  // clear feedback 
  document.getElementById('imagesFeedback').innerHTML = "";

  // check images address for special characters
  imagesLettersCheck = checkLetters('formImages','image[]','imagesFeedback')
  if(imagesLettersCheck == false){
    allValidatedOK = false
  }

  // check number of images
  imagesNumbersCheck = numberOfImages('formImages','image[]','imagesFeedback')
  if(imagesNumbersCheck == false){
    allValidatedOK = false
  }

  // check file endings
  imagesEndingsCheck = fileEndings('formImages','image[]','imagesFeedback')
  if(imagesEndingsCheck == false){
    allValidatedOK = false
  }

  // check file sizes
  imagesSizeCheck = fileSizes('formImages','image[]','imagesFeedback')
  if(imagesSizeCheck == false){
    allValidatedOK = false
  }

  // if everything is let form be submitted
  return allValidatedOK
}

// checks that no invalid characters are used
function checkLetters(formName, inputName, feedbackId){
  // check for latin letters
  let input = document.forms[formName][inputName].value;
  let onlyLetters = /^[a-zA-Z\-_. ÅåÄäÖöØøÆæÉéÈèÜüÊêÛûÎî0123456789:\\]*$/.test(input);
  if (onlyLetters == false) {
    document.getElementById(feedbackId).innerHTML = "Bara de vanligaste tecknen tillåtna";
    return false;
  } else {
    return true;
  }
}

// checks number of files that user is trying to upload
function numberOfImages(formName, inputName, feedbackId) {
  let numberOfFiles = document.forms[formName][inputName].files.length;
  let numberOfFilesLeft = document.getElementById('left').value
  if(numberOfFiles > numberOfFilesLeft){
    if(numberOfFilesLeft == 1){
      document.getElementById(feedbackId).innerHTML = "Du kan bara lägga till en bild";
    } else {
      document.getElementById(feedbackId).innerHTML = "Du kan bara lägga till "+numberOfFilesLeft+" bilder";
    }
    return false;
  } else {
    return true;
  }
}

// checks file endings
function fileEndings(formName, inputName, feedbackId) {
  let filesToUpload = document.forms[formName][inputName].files;
  for (let i = 0; i < filesToUpload.length; i++) {
    const element = filesToUpload[i].type;
    let imgType = false;
    // check for correct file-type
    switch (element) {
      case "image/png": imgType = true;
        break;
      case "image/jpg": imgType = true;
        break;
      case "image/jpeg": imgType = true;
        break;
    }
    // if not approved file-type, return false
    if(!imgType){
      document.getElementById(feedbackId).innerHTML = 'Du kan bara lägga till png, jpeg eller jpg';
      return false;
    }
  }
  return true;
}

// checks file sizes
function fileSizes(formName, inputName, feedbackId) {
  let filesToUpload = document.forms[formName][inputName].files;
  for (let i = 0; i < filesToUpload.length; i++) {
    const fileSize = filesToUpload[i].size;
    if(fileSize > 2000000){
      document.getElementById(feedbackId).innerHTML = 'Bilderna får vara max 2MB/st';
      return false;
    }
  }
  return true;
}