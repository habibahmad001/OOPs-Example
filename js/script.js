$(document).ready(function () {
    $('#submitBtn').click(function () {
        let product = $('#product').val();

        if (!product) {
            Swal.fire({
                title: "Error",
                text: "Please select a product before proceeding.",
                icon: "error",
                confirmButtonColor: "#d33",
            });
            return;
        }

        Swal.fire({
            title: "Confirmation",
            text: "Are you sure you want to proceed?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Proceed!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "ajax/processApi.php",
                    type: "POST",
                    data: { product: product },
                    dataType: "json", // Tell jQuery to expect JSON response
                    success: function (response) {
                        // No need to parse JSON again, jQuery already does it
                        if (response.status === "success") {
                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                            });
                            $('#response').html(response.parsedData);
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: response.message || "An unknown error occurred.",
                                icon: "error",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX Error:", error);
                        Swal.fire({
                            title: "Error",
                            text: "API call failed.",
                            icon: "error",
                        });
                    }
                });

            }
        });
    });
});