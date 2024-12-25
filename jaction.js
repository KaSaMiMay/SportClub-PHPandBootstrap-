document.getElementById('student-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    // Collect form data
    const formData = new FormData(this);

    // Send data using AJAX
    fetch('Registertion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('Successfully added')) {
            alert('Student registered successfully.');

            // Update badge dynamically
            const badge = document.getElementById('student-badge');
            let currentCount = parseInt(badge.textContent);
            badge.textContent = currentCount + 1;
        } else {
            alert('Error: ' + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});