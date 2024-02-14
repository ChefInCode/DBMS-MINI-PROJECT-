function validateForm() {
    const staff_name = document.getElementById('staff_name').value;
    const designation = document.getElementById('designation').value;
  
    // Simple checks (not exhaustive)
    if (staff_name.trim() === '') {
      alert('Please enter a  Staff name');
      return false;
    }
    if (designation.trim() === '') {
      alert('Please enter a designation');
      return false;
    }
  
    // You can add more validation here (e.g., length limits, regex for formats)
  
    return true; // If all validations pass
  }
  
  // Add event listener to form submission
  document.getElementById('add-staff-form').addEventListener('submit', function(event) {
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
    } else {
      // Send form data to the server-side script using AJAX or form submission
      const formData = new FormData(document.getElementById('add-staff-form'));
  
      // Example using fetch API (adapt based on your preferred method)
      fetch('staff_add.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          alert(data.message);
          // Clear the form or handle success as needed
        } else {
          alert(data.message);
        }
      })
      .catch(error => {
        console.error('Error submitting form:', error);
        alert('An error occurred. Please try again later.');
      });
    }
  });
  validateForm();