document.addEventListener('DOMContentLoaded', function () {
    // Get all required input and select elements
    const requiredFields = document.querySelectorAll('input[required], select[required]');

    // Loop through each required field
    requiredFields.forEach(function (field) {
        // Add event listener to the field
        field.addEventListener('blur', function () {
            // Check if the field is empty
            if (!field.value.trim()) {
                // If empty, add a placeholder
                field.placeholder = 'يرجى إدخال المعلومات هنا';
                // Change the border color to red
                field.style.borderColor = 'red';
            } else {
                // If not empty, remove the placeholder and reset the border color
                field.placeholder = '';
                field.style.borderColor = ''; // Reset to default
            }
        });
    });
});


// this part is for the status :
document.addEventListener('DOMContentLoaded', function () {
    // Get references to the select element and additional input field
    const statusSelect = document.getElementById('status');
    const additionalextension = document.getElementById('additionalextension');
    const extension = document.getElementById('extension');

    // Event listener for changes in the select element
    statusSelect.addEventListener('change', function () {
        // If the selected value is "2" (قابل لتمديد), show the additional input field
        if (statusSelect.value === 'قابل للتمديد') {
            additionalextension.style.display = 'block';
        } else {
            // If the selected value is "1" (غير قابل لتمديد), hide the additional input field
            additionalextension.style.display = 'none';
            // Reset the value when hiding the input field
            extension.value = '';
        }
    });
    extension.addEventListener('input', function () {
        // Remove any non-numeric characters from the input value
        extension.value = extension.value.replace(/[^\d]/g, '');
    });
});
// Get a reference to the extension input field
var extensionInput = document.getElementById('extension');

// Add an event listener for input events on the extension input field
extensionInput.addEventListener('input', function () {
    // Get the value of the input field
    var extensionValue = extensionInput.value;

    // Check if the length of the value is greater than the maximum allowed length
    if (extensionValue.length > 3) { // Adjust the maximum length as needed
        // If the length is too long, display an error message or prevent form submission
        // For example, you can show an error message to the user
        alert('الرقم طويل جداً. يرجى إدخال قيمة أقصر.');
        // You can also prevent form submission by returning false or calling event.preventDefault()
        // return false;
    }
});



// this part is for the amount :
document.addEventListener('DOMContentLoaded', function () {
    const amountInput = document.getElementById('amount');

    // Event listener for input event
    amountInput.addEventListener('input', function () {
        // Remove any non-numeric characters from the input value
        let sanitizedValue = amountInput.value.replace(/[^\d]/g, '');

        // Update the input value
        amountInput.value = sanitizedValue;
    });
});


// this part is for the cancalation Button
document.addEventListener('DOMContentLoaded', function () {
    const cancelButton = document.querySelector('.btn-secondary');

    // Event listener for click event on the cancel button
    cancelButton.addEventListener('click', function () {
        // Select all input elements
        const inputs = document.querySelectorAll('input[type="text"], input[type="date"], select');

        // Loop through each input element and set its value to an empty string
        inputs.forEach(function (input) {
            input.value = '';
        });
    });
});






