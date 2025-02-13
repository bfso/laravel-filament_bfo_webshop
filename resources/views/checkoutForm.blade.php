<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>

    <form action="" method="get">
        <h2>Adress and Name fields</h2>
        <label for="firstnameInput">Firstname</label>
        <input type="text" name="checkout[first_name]" id="firstnameInput"><br>
        <label for="lastnameInput">Lastname</label>
        <input type="text" name="checkout[last_name]" id="lastnameInput"><br>
        <label for="dateInput">Birthdate</label>
        <input type="date" name="checkout[date]" id="dateInput"><br>
        <label for="emailInput">Email</label>
        <input type="email" name="checkout[email_address]" id="emailInput"><br>
        <label for="phoneInput">Phone number</label>
        <input type="text" name="checkout[phone_number]" id="phoneInput"><br>
        <label for="dateInput">Street</label>
        <input type="text" name="checkout[street]" id="dateInput"><br>
        <label for="zipInput">ZIP code</label>
        <input type="text" name="checkout[zip]" id="zipInput"><br>
        <label for="dateInput">City</label>
        <input type="text" name="checkout[city]" id="cityInput"><br>
        <label for="countryInput">Country</label>
        <input type="text" name="checkout[country]" id="countryInput"><br>

        <h2>Delivery</h2>
        <p>select delivery option</p>


        <h2>Payment</h2>


        <label for="agb">agb</label>
        <input type="checkbox" name="agb" id="agb"><br>
        <label for="save">Save data for future purchases</label>
        <input type="checkbox" name="save" id="save"><br>
        <input type="submit" value="Senden">

    </form>



</body>
</html>

