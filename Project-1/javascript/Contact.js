document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contact-form");

    // Select the HTML element with the id "SubmitButton" and store it in the "submitButton" variable
    const submitButton = document.getElementById("SubmitButton");

    // Add an event listener for when the form is submitted
    form.addEventListener("submit", function (e) {
        // Prevent the default behavior of form submission (page reload)
        e.preventDefault();

        // Get the values entered by the user in the form's input fields
        const fname = document.getElementById("fname").value;
        const lname = document.getElementById("lname").value;
        const vraag = document.getElementById("vraag").value;

        // Create an object "data" to structure the form data
        const data = {
            content: `Nieuwe Vragen:\nVoornaam: ${fname}\nAchternaam: ${lname}\nVraag: ${vraag}`,
        };

        // Send a POST request to a Discord webhook URL with the form data
        fetch('https://discord.com/api/webhooks/1164101391086780447/F7_XAGe5whTveDE4CAnfQx9inLFRoxT9nZP8mbFKOC5-7bqUNEYIYjKs1fosR0-YL1fy', {
            method: 'POST',
            body: JSON.stringify(data), // Send the "data" object as JSON data
            headers: {
                'Content-Type': 'application/json', // Specify the content type as JSON
            },
        })
            .then(response => {
                if (response.ok) {
                    // If the response is successful (HTTP status code 200 OK), show a success alert and reset the form
                    alert('Form submitted successfully!');
                    form.reset();
                } else {
                    // If the response is not successful, show a failure alert
                    alert('Form submission failed. Please try again.');
                }
            })
            .catch(error => {
                // If there is an error during the HTTP request, log the error to the console
                console.error('Error:', error);
            });
    });
});
