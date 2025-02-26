Product API Selector - AJAX & SweetAlert Integration

Overview

This project provides a web-based interface where users can select a product from a dropdown list, confirm their choice using SweetAlert, and make an AJAX API request to fetch and display parsed JSON responses.

Features

Bootstrap-based UI for a responsive design.

AJAX-based API calls for seamless interaction without page reloads.

SweetAlert (Swal) for confirmation and response notifications.

PHP (OOP) for backend API handling and response parsing.

cURL for API requests ensuring compatibility with PHP 7.*.

Technologies Used

Frontend: HTML, Bootstrap, jQuery, SweetAlert

Backend: PHP 7.*, cURL, OOP principles

Installation

Clone or download the repository.

Ensure your server is running PHP 7 or later.

Place the project in a server environment (e.g., XAMPP, Apache, Nginx).

Start the server and access the index.php file from the browser.

File Structure

/project-root
│── index.php            # Main frontend file
│── ajax/
│   ├── processApi.php   # Handles API requests
│── classes/
│   ├── ProductHandler.php # Maps product selection to API URL
│   ├── ApiCaller.php    # Makes API calls using cURL
│   ├── ResponseParser.php # Parses API response
│── assets/
│   ├── css/             # (Optional) Additional stylesheets
│   ├── js/              # (Optional) Additional JS files

How It Works

1. Select a Product

The user selects a product from the dropdown list in index.php.

2. Confirmation via SweetAlert

A confirmation pop-up appears before proceeding.

3. AJAX Request to Backend

If confirmed, an AJAX request is sent to ajax/processApi.php with the selected product.

The backend fetches the corresponding API URL and calls the external API using cURL.

4. Parsing the Response

The ResponseParser.php formats the response into:

{product name}-{parsed JSON response element}

Example Output:

Validifiv3-fi-risk-index-Result: 00

5. Display the Response

The parsed response is displayed on the page dynamically.

Troubleshooting

Invalid JSON Response in AJAX

Issue:

If you see an error like Invalid JSON response, it may be due to HTML content inside the JSON response.

Solution:

Ensure the processApi.php response is set correctly with:

header('Content-Type: application/json');
echo json_encode([...]);

Also, in the AJAX request, ensure dataType: 'json' is set to avoid double parsing:

$.ajax({
    url: "ajax/processApi.php",
    type: "POST",
    data: { product: product },
    dataType: "json", // Ensures jQuery auto-parses JSON
    success: function (response) {
        $('#response').html(response.parsedData);
    }
});

Future Enhancements

Add error handling for API failures.

Implement caching for faster response times.

Enhance UI with real-time loading indicators.

License

This project is open-source. Feel free to modify and use it as needed.
