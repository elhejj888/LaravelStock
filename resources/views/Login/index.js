    // Function to show the custom alert
function showCustomAlert(message) {
  document.getElementById('custom-alert-message').textContent = message;
  document.getElementById('custom-alert').style.display = 'flex';
}

// Function to hide the custom alert
function hideCustomAlert() {
  document.getElementById('custom-alert').style.display = 'none';
}

// Attach click event to the OK button
document.getElementById('custom-alert-ok-btn').addEventListener('click', hideCustomAlert);
