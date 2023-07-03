// Get the image file input element

var inputElement = document.getElementById("image");

// Add an event listener to the input element
inputElement.addEventListener("change", function(event) {
  // Get the selected file
  var file = event.target.files[0];

  // Create a new form data object
  var formData = new FormData();

  // Append the file to the form data object
  formData.append("image", file);

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Set the request method and URL
  xhr.open("POST", "file.php");

  // Set the onload function
  xhr.onload = function() {
    // Handle the response
    console.log(xhr.responseText);
  };

  // Send the request
  xhr.send(formData);
});



/*

// Get the form element
var formElement = document.querySelector(".typing-area");

// Add an event listener to the form element
formElement.addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the user ID input element
  var userIdElement = document.querySelector(".incoming_id");

  // Get the user ID value
  var userId = userIdElement.value;

  // Get the image file input element
  var imageElement = document.getElementById("image");

  // Get the selected file
  var file = imageElement.files[0];

  // Create a new form data object
  var formData = new FormData();

  // Append the user ID and file to the form data object
  formData.append("incoming_id", userId);
  formData.append("image", file);

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Set the request method and URL
  xhr.open("POST", "file.php");

  // Set the onload function
  xhr.onload = function() {
    // Handle the response
    console.log(xhr.responseText);
  };

  // Send the request
  xhr.send(formData);
});


*/