// DISPLAY PROFILE PIC -------------------------------------------------
let profilePic = document.getElementById("profile-pic");
let inputFile = document.getElementById("input-file");
inputFile.onchange = function () {
  profilePic.src = URL.createObjectURL(inputFile.files[0]);
};

// CONTACT NUMBER LIMIT DIGIT (12)--------------------------------------------------------
document.getElementById("emp-contact").addEventListener("input", function () {
  // Remove non-numeric characters from the input
  let inputValue = this.value.replace(/\D/g, "");

  // Limit the input to 12 digits
  if (inputValue.length > 12) {
    inputValue = inputValue.slice(0, 12);
  }

  // Update the input value
  this.value = inputValue;
});
