<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>swiftRent | Pay Rent via M-Pesa</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">swiftRent</div>
            <nav>
                <a href="#how-it-works">How it works</a>
                <a href="#faq">FAQ</a>
                <button class="btn-outline">Log In</button>
            </nav>
        </header>

        <main>
            <section class="hero">
                <div class="hero-content">
                    <h1>Pay rent instantly with M-Pesa</h1>
                    <p class="subtitle">Safe, fast rent payments directly to your landlord's M-Pesa</p>
                    <div class="mpesa-badge">
                        <img src="mpesa-logo.png" alt="M-Pesa" width="120">
                        <span>Powered by M-Pesa</span>
                    </div>
                    <button class="btn-primary">Pay Rent Now</button>
                </div>
                <div class="hero-image">
                    <div class="payment-flow">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h3>Enter amount</h3>
                                <p>Type your rent amount</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h3>Enter M-Pesa PIN</h3>
                                <p>Confirm with your PIN</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h3>Payment complete!</h3>
                                <p>Receive confirmation SMS</p>
                            </div>
                        </div>
                        <div class="mpesa-illustration">
                            <div class="phone-screen">
                                <div class="mpesa-popup">
                                    <div class="popup-header">
                                        <span>Confirm Payment</span>
                                        <span class="close-btn">×</span>
                                    </div>
                                    <div class="popup-body">
                                        <div class="payment-detail">
                                            <span>Pay to:</span>
                                            <span>swiftRent</span>
                                        </div>
                                        <div class="payment-detail">
                                            <span>Amount:</span>
                                            <span>KES 15,000</span>
                                        </div>
                                        <div class="payment-detail">
                                            <span>Account:</span>
                                            <span>Landlord Name</span>
                                        </div>
                                        <div class="input-field">
                                            <label>Enter M-Pesa PIN</label>
                                            <input type="password" placeholder="PIN" maxlength="4">
                                        </div>
                                        <button class="btn-mpesa">Send Payment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="how-it-works" class="steps">
                <h2>How to pay rent with M-Pesa</h2>
                <div class="step-cards">
                    <div class="step-card">
                        <div class="step-icon">📱</div>
                        <h3>Register</h3>
                        <p>Create your account with your phone number</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">🏠</div>
                        <h3>Add property</h3>
                        <p>Enter your landlord's M-Pesa number</p>
                    </div>
                    <div class="step-card">
                        <div class="step-icon">💵</div>
                        <h3>Pay rent</h3>
                        <p>Confirm payment via M-Pesa STK push</p>
                    </div>
                </div>
            </section>

            <section class="benefits">
                <h2>Why pay rent with swiftRent?</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">⚡</div>
                        <h3>Instant payments</h3>
                        <p>Money reaches your landlord immediately</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">🔒</div>
                        <h3>Secure transactions</h3>
                        <p>Bank-level security for all payments</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">📝</div>
                        <h3>Digital receipts</h3>
                        <p>Automated payment records</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">📱</div>
                        <h3>No app needed</h3>
                        <p>Works directly from your browser</p>
                    </div>
                </div>
            </section>

            <section class="cta">
                <h2>Ready to simplify your rent payments?</h2>
                <button class="btn-primary">Pay with M-Pesa Now</button>
                <p class="cta-note">No registration fee • Instant setup • 24/7 support</p>
            </section>
        </main>

        <footer>
            <div class="footer-content">
                <div class="footer-logo">swiftRent</div>
                <div class="footer-links">
                    <a href="#">Privacy</a>
                    <a href="#">Terms</a>
                    <a href="#">Support</a>
                    <a href="#">Safaricom</a>
                </div>
            </div>
            <div class="copyright">© 2023 swiftRent. All rights reserved. M-Pesa is a registered trademark of Safaricom PLC.</div>
        </footer>
    </div>
</body>
</html>