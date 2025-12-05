<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hardware Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Checkout</h1>

    <form action="/process-order" method="post">
        
        <section id="order-summary">
            <h2>Order Summary</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;">Subtotal:</td>
                        <td>£0.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;">Shipping:</td>
                        <td>£0.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;">**Order Total:**</td>
                        <td>**£                      0.00**</td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <hr>

        <section id="shipping-info">
            <h2>Shipping Information</h2>
            
            <label for="full-name">Full Name:</label><br>
            <input type="text" id="full-name" name="full_name" required><br><br>

            <label for="address-line1">Address Line 1:</label><br>
            <input type="text" id="address-line1" name="address_line1" required><br><br>
            
            <label for="address-line2">Address Line 2 (Optional):</label><br>
            <input type="text" id="address-line2" name="address_line2"><br><br>
            
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" required><br><br>
            
            <label for="state">State/Province:</label><br>
            <input type="text" id="state" name="state" required><br><br>
            
            <label for="zip">Zip/Postal Code:</label><br>
            <input type="text" id="zip" name="zip" required><br><br>
            
            <label for="country">Country:</label><br>
            <select id="country" name="country" required>
                <option value="usa">United States</option>
                <option value="can">Canada</option>
                <option value="gbr">United Kingdom</option>
                </select><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="phone">Phone (Optional):</label><br>
            <input type="tel" id="phone" name="phone"><br><br>
        </section>

        <hr>

        <section id="payment-info">
            <h2>Payment Information</h2>
            
            <fieldset>
                <legend>Payment Method:</legend>
                
                <input type="radio" id="credit-card" name="payment_method" value="credit_card" checked>
                <label for="credit-card">Credit Card</label><br>
                
                <input type="radio" id="paypal" name="payment_method" value="paypal">
                <label for="paypal">PayPal</label><br>
                
                <input type="radio" id="bank-transfer" name="payment_method" value="bank_transfer">
                <label for="bank-transfer">Bank Transfer</label><br>
            </fieldset>
            <br>
            
            <h3>Credit Card Details (if selected)</h3>
            
            <label for="card-number">Card Number:</label><br>
            <input type="text" id="card-number" name="card_number" placeholder="XXXX XXXX XXXX XXXX"><br><br>
            
            <label for="card-name">Name on Card:</label><br>
            <input type="text" id="card-name" name="card_name"><br><br>
            
            <label for="expiry-date">Expiry Date:</label><br>
            <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY"><br><br>
            
            <label for="cvv">CVV:</label><br>
            <input type="text" id="cvv" name="cvv" size="4" maxlength="4"><br><br>
            
        </section>

        <hr>

        <section id="final-actions">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the terms and conditions</label><br><br>
            
            <button type="submit">Place Order</button>
        </section>

    </form>

</body>
</html>
