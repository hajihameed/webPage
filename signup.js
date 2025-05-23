// Redirect to order page when "Order Now" button is clicked
document.getElementById('signupBtn').addEventListener('click', function () {
  window.location.href = 'login.html'; // Replace 'order.html' with your order page URL
});
// JavaScript to toggle password visibility
document.addEventListener("DOMContentLoaded", function () {
  const togglePassword = document.getElementById("togglePassword");
  const passwordField = document.getElementById("password");

  togglePassword.addEventListener("click", function () {
    // Toggle the type attribute
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);

    // Toggle the class for the icon
    this.classList.toggle("show");
  });
});
