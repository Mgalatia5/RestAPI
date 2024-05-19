<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="row mt-2 mx-3">
        <div class="col-md-12 text-center alert alert-secondary">
            <h3 style="font-weight:bold;">REST API : Product Model</h3>
        </div>
        <div class="col-md-6 m-auto">
            <div class="alert alert-primary" role="alert">
                <span class=" pr-2" style="border-right: 2px solid red;">POST</span> <a class=" pl-2 text-truncate"
                    style="font-size: 20px; text-decoration:none; "
                    href="{{ url('product') }}">https://api.appneti.com/product</a>
                <button type="button" class="close" style="border: none" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 14px" class="copy"
                        onclick="return copyLink(this)">Copy</span>
                </button>
            </div>
            <div class="alert alert-success" role="alert">
                <span class=" pr-2" style="border-right: 2px solid red;">GET</span> <a class=" pl-2 text-truncate"
                    style="font-size: 20px; text-decoration:none; "
                    href="{{ url('product') }}">https://api.appneti.com/product</a>
                <button type="button" class="close" style="border: none" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 14px" class="copy"
                        onclick="return copyLink(this)">Copy</span>
                </button>
            </div>
            <div class="alert alert-warning" role="alert">
                <span class=" pr-2" style="border-right: 2px solid red;">GET</span> <a class=" pl-2 text-truncate"
                    style="font-size: 20px; text-decoration:none; "
                    href="{{ url('product', 1) }}">https://api.appneti.com/product/{id}</a>
                <button type="button" class="close" style="border: none" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 14px" class="copy"
                        onclick="return copyLink(this)">Copy</span>
                </button>
            </div>
            <div class="alert alert-info" role="alert">
                <span class=" pr-2" style="border-right: 2px solid red;">PUT</span> <a class=" pl-2 text-truncate"
                    style="font-size: 20px; text-decoration:none; "
                    href="{{ url('product') }}">https://api.appneti.com/product/{id}</a>
                <button type="button" class="close" style="border: none" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 14px" class="copy"
                        onclick="return copyLink(this)">Copy</span>
                </button>
            </div>
            <div class="alert alert-danger" role="alert">
                <span class=" pr-2" style="border-right: 2px solid red;">DELETE</span> <a class=" pl-2 text-truncate"
                    style="font-size: 20px; text-decoration:none; "
                    href="{{ url('product', 1) }}">https://api.appneti.com/product/{id}</a>
                <button type="button" class="close" style="border: none" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 14px" class="copy"
                        onclick="return copyLink(this)">Copy</span>
                </button>
            </div>
        </div>
        <div class="col-md-6" style="box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.5);">
            <img class=" w-100 h-100" src="assets/db.png" alt="">
        </div>
    </div>

    <div class="col-md-12 dropdown-divider mb-2"></div>
    {{-- <div class="row mx-2">
        <div class="col-md-6">
            <img class=" w-100 h-100 rounded" src="assets/prod.png" alt="">
        </div>
        <div class="col-md-6">
            <img class=" w-100 h-100 rounded" src="assets/product.png" alt="">
        </div>
    </div> --}}
</body>

</html>

<script>
    function copyLink(e) {
        var copyText = e.parentElement.previousElementSibling;
        var textArea = document.createElement("textarea");
        textArea.value = copyText.href;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        $(e).text('').append(`<span class="text-success">Copied</span>`);

        setTimeout(() => {
            $(e).text('Copy');
        }, 5000);
    }

    // INPUT FIELDS
    var product = {
        "name": "Product Name",
        "price": 100.00,
        "description": "Product Description",
        "category": "Product Category",
        "image": "Image Path",
    }
</script>
