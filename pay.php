<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Rent | swiftRent</title>
    <link rel="stylesheet" href="./styles/pay.css"> <!-- Reusing our existing CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">swiftRent</div>
            <nav>
                <a href="index.php">Home</a>
                <a href="#help">Help</a>
            </nav>
        </header>

        <main class="payment-container">
            <div class="payment-card">
                <div class="payment-header">
                    <h2>Pay Your Rent</h2>
                    <p>Enter your details to complete payment via M-Pesa</p>
                </div>
                
                <form id="mpesaPaymentForm" action="process_payment.php" method="POST">
                    <div class="form-group">
                        <label for="phone">M-Pesa Phone Number</label>
                        <div class="input-prefix">
                            <span class="prefix">+254</span>
                            <input type="tel" id="phone" name="phone" placeholder="7XX XXX XXX" pattern="[0-9]{9}" 
                                   title="Enter your 9-digit Safaricom number (without 0 or +254)" required>
                        </div>
                        <small class="hint">Enter your Safaricom number registered with M-Pesa</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="amount">Rent Amount (KES)</label>
                        <div class="input-prefix">
                            <span class="prefix">KES</span>
                            <input type="number" id="amount" name="amount" min="1" 
                                   placeholder="15000" required>
                        </div>
                    </div>
                    
                    
                    <div class="form-actions">
                        <button type="button" class="btn btn-outline" onclick="window.history.back()">Cancel</button>
                        <button type="submit" class="btn btn-mpesa">
                            <span>Pay via M-Pesa</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
                
                <div class="payment-security">
                    <div class="security-badge">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Secure M-Pesa Payment</span>
                    </div>
                    <div class="security-badge">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Instant Payment Confirmation</span>
                    </div>
                </div>
            </div>
            
            <div class="payment-sidebar">
                <h3>Payment Summary</h3>
                <div class="summary-item">
                    <span>Rent Amount</span>
                    <span id="displayAmount">KES 0</span>
                </div>
                <div class="summary-item">
                    <span>Service Fee</span>
                    <span>KES 0</span>
                </div>
                <div class="summary-item total">
                    <span>Total to Pay</span>
                    <span id="displayTotal">KES 0</span>
                </div>
                
                <div class="mpesa-tip">
                    <h4>M-Pesa Payment Tip</h4>
                    <p>You'll receive an STK push notification to confirm the payment with your M-Pesa PIN.</p>
                </div>
            </div>
        </main>
    </div>

<script src ='./scripts/processPayment.js'></script> 
</body>
</html>