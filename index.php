<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product API Selector</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg rounded-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Select a Product</h3>
        </div>
        <div class="card-body">
            <form id="productForm">
                <div class="form-group">
                    <label for="product">Product Listing</label>
                    <select class="form-control" id="product" name="product" required>
                        <option value="">Select a Product</option>
                        <option value="Validifiv3-fi-risk-index">Validifiv3-fi-risk-index</option>
                        <option value="Validifiv3-account-validation">Validifiv3-account-validation</option>
                        <option value="Validifiv3-pi-risk4-individual">Validifiv3-pi-risk4-individual</option>
                    </select>
                </div>
                <button type="button" id="submitBtn" class="btn btn-success btn-block">Submit</button>
            </form>
            <div id="response" class="mt-4"></div>
        </div>
    </div>
</div>
<script language="JavaScript" src="js/script.js"></script>
</body>
</html>
