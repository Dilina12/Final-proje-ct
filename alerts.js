// alerts.js
document.getElementById("alertForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    const alertMessage = document.getElementById("alertMessage").value;
    const alertResponse = document.getElementById("alertResponse");

    // Simulate sending alert (you can integrate with a backend)
    alertResponse.textContent = `Alert sent: "${alertMessage}"`;
    alertResponse.style.color = "green"; // Set response text color to green

    // Clear the message box
    document.getElementById("alertMessage").value = '';
});
