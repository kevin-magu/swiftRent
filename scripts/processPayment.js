document.getElementById("mpesaPaymentForm").addEventListener("submit", async function(e) {
    e.preventDefault(); // Stop normal form submission

    const phoneInput = document.getElementById("phone");
    const amountInput = document.getElementById("amount");

    // Basic sanitization
    const rawPhone = phoneInput.value.trim();
    const phone = rawPhone.replace(/[^0-9]/g, ''); // remove non-digits

    const amount = parseInt(amountInput.value);

    // Extra validation
    if (!/^[7][0-9]{8}$/.test(phone)) {
        alert("Please enter a valid 9-digit Safaricom number (starting with 7)");
        return;
    }

    if (isNaN(amount) || amount < 1) {
        alert("Please enter a valid rent amount (minimum KES 100)");
        return;
    }

    // Construct full Safaricom number
    const fullPhone = `254${phone}`;

    // Disable button to prevent multiple clicks
    const submitButton = this.querySelector("button[type='submit']");
    submitButton.disabled = true;
    submitButton.innerHTML = "Processing...";

    try {
        const response = await fetch("./stkPush.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ phone: fullPhone, amount: amount })
        });

        const data = await response.json();

        if (data.success) {
            alert("STK Push sent! Please complete the payment on your phone.");
        } else {
            alert("Error: " + (data.message || "Failed to initiate payment."));
        }

    } catch (error) {
        console.error("Payment Error:", error);
        alert("A network error occurred. Please try again.");
    }

    submitButton.disabled = false;
    submitButton.innerHTML = `<span>Pay via M-Pesa</span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`;
});
