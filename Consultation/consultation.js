// consultation.js
document.getElementById("consultationForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const date = document.getElementById("date").value;
    const message = document.getElementById("message").value;
    const consultationResponse = document.getElementById("consultationResponse");

    // Simulate scheduling a consultation (you can integrate with a backend)
    consultationResponse.textContent = `Consultation scheduled for ${name} on ${date}. We will contact you at ${email}.`;
    consultationResponse.style.color = "green"; // Set response text color to green

    // Clear the form
    document.getElementById("consultationForm").reset();
});


document.getElementById("doctorSearch").addEventListener("input", function() {
    const searchValue = this.value.toLowerCase();
    const doctorCards = document.querySelectorAll(".doctor-card");

    doctorCards.forEach(card => {
        const name = card.getAttribute("data-name").toLowerCase();
        const specialization = card.getAttribute("data-specialization").toLowerCase();

        if (name.includes(searchValue) || specialization.includes(searchValue)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
});

function scheduleDoctor(doctorName) {
    const consultationForm = document.getElementById("consultationForm");
    const consultationResponse = document.getElementById("consultationResponse");
    consultationResponse.textContent = ""; // Clear any previous response

    // Prefill the message field with the selected doctor's name for convenience
    document.getElementById("message").value = `Consultation request for ${doctorName}`;

    // Scroll to the form for better UX
    consultationForm.scrollIntoView({ behavior: "smooth" });
}
