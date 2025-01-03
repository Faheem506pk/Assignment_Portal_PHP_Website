// JavaScript to handle section switching
function showSection(sectionId) {
  // Hide all sections
  document.querySelectorAll(".section").forEach((section) => {
    section.classList.remove("active");
  });
  // Show the selected section
  document.getElementById(sectionId).classList.add("active");
}

// Feedback function to show email input fields only
function toggleFeedbackForm() {
  const feedbackContainer = document.getElementById("feedback-details");
  const feedbackButton = document.getElementById("feedback-button");

  // Toggle feedback form visibility
  if (feedbackContainer.style.display === "none") {
    feedbackContainer.style.display = "block";
    feedbackButton.innerHTML = "Hide Feedback Emails";
  } else {
    feedbackContainer.style.display = "none";
    feedbackButton.innerHTML = "Show Feedback Emails";
  }
}

// Show the "Home" section by default on page load
window.onload = () => {
  showSection("home");
};
