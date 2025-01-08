// mood.js

document.getElementById('moodForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent page refresh on submit
  
    const mood = document.getElementById('mood').value;
    const note = document.getElementById('note').value;
  
    if (mood) {
      alert(`Mood Logged: ${mood}\nNotes: ${note ? note : 'No additional notes.'}`);
      // Clear the form after submission
      document.getElementById('moodForm').reset();
    } else {
      alert('Please select a mood.');
    }
  });
  