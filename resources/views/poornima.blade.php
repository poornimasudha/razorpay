<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <style>
        .hide{
            display: none;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel - Razorpay Payment Gateway Integration</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
<form id="subscription-form">
    <label for="plan">Choose a plan:</label>

    <select name="plan" id="plans">
        <option value="plan_HQugIxfpdOVrT4">Lite</option>
        <option value="plan_HOYPR2vJgNBa1N">Growth</option>
    </select>
    <button id="subscribe">Subscribe</button>
    <button id = "rzp-button1" class="hide">Pay</button>
</form>
<script src = "https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $('#subscribe').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/poornima/subscribe",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                plan: $("#plans").val(),
            },
            success: function (response) {
                $("#rzp-button1").removeClass('hide')
                /* var options = {    "key": "key_id",    "subscription_id": "sub_HRDJGS6oXIECrs",
                     "name": "Acme Corp.",    "description": "Monthly Test Plan",    "image": "/your_logo.png",    "handler": function(response) {
                     alert(response.razorpay_payment_id);    },
                     "prefill": {      "name": "Gaurav Kumar",      "email": "poornimamadappally@gmail.com",      "contact": "9496766575"    },
                     "notes": {      "note_key_1": "Tea. Earl Grey. Hot",      "note_key_2": "Make it so."    },    "theme": {      "color": "#F37254"    }  };var rzp1 = new Razorpay(options);
                    document.getElementById('rzp-button1').onclick = function(e) {  rzp1.open();  e.preventDefault();}*/
            },
        });
    });
    var options = {    "key": "rzp_test_6Inx0V1f7yvtbn",    "subscription_id": "sub_HRDJGS6oXIECrs",
        "name": "Acme Corp.",    "description": "Monthly Test Plan",    "image": "/your_logo.png",    "handler": function(response) {      alert(response.razorpay_payment_id);    },
        "prefill": {      "name": "Gaurav Kumar",      "email": "poornimamadappally@gmail.com",      "contact": "9496766575"    },
        "notes": {      "note_key_1": "Tea. Earl Grey. Hot",      "note_key_2": "Make it so."    },    "theme": {      "color": "#F37254"    }  };var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e) {  rzp1.open();  e.preventDefault();}
</script>
</body>
</html>

