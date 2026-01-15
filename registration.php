<?php
require_once 'functions.php';
include 'header.php';
?>

<div style="background: #f4f7f6; min-height: 100vh; padding: 4rem 10%; font-family: 'Inter', sans-serif;">
    <div style="max-width: 1000px; margin: 0 auto; background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); overflow: hidden;">
        
        <!-- Header Section -->
        <div style="padding: 2.5rem; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; gap: 1rem;">
                <div style="background: #2D236E; color: white; padding: 1rem; border-radius: 12px; display: flex; align-items: center; gap: 0.8rem;">
                    <span style="font-size: 1.5rem;">📍</span>
                    <div>
                        <div style="font-size: 0.7rem; text-transform: uppercase; opacity: 0.8;">Event Location</div>
                        <div style="font-weight: 700;">Berlin Germany</div>
                    </div>
                </div>
                <div style="background: #2D236E; color: white; padding: 1rem; border-radius: 12px; display: flex; align-items: center; gap: 0.8rem;">
                    <span style="font-size: 1.5rem;">📅</span>
                    <div>
                        <div style="font-size: 0.7rem; text-transform: uppercase; opacity: 0.8;">Event Dates</div>
                        <div style="font-weight: 700;">7–10 May 2026</div>
                    </div>
                </div>
            </div>
            <img src="attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" style="height: 60px;" alt="Logo">
        </div>

        <div style="padding: 3rem;">
            <h1 style="color: #2D236E; font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem;">YDF Funded Category Registration</h1>
            <p style="color: #666; margin-bottom: 2rem;">Please note that your information interacts with our server as you enter it.</p>
            
            <div style="margin-bottom: 2.5rem;">
                <div style="font-size: 0.9rem; font-weight: 600; color: #333; margin-bottom: 0.5rem;">Step 3 of 3</div>
                <div style="height: 6px; background: #eee; border-radius: 3px; position: relative; overflow: hidden;">
                    <div style="position: absolute; left: 0; top: 0; height: 100%; width: 100%; background: #FFD700;"></div>
                </div>
            </div>

            <div style="background: #f8fbff; border-radius: 16px; padding: 2rem; border: 1px solid #e1e8f0; margin-bottom: 3rem;">
                <p style="color: #444; line-height: 1.6; margin-bottom: 2rem;">
                    Complete your application by submitting the application fee to secure your spot at the Youth Development Forum 2026. 
                    We process payments through Stripe, a globally trusted and highly secure platform, ensuring your personal and payment details 
                    are fully protected under General Data Protection Regulation (GDPR) standards. Have questions? We're here to help! 
                    Reach out to us at <a href="mailto:info@thecgdl.org" style="color: #00aeef; text-decoration: none; font-weight: 600;">info@thecgdl.org</a>. Let's make it happen!
                </p>

                <h3 style="color: #2D236E; font-size: 1.2rem; margin-bottom: 1.5rem;">Billing Information</h3>
                <div style="background: white; border-radius: 12px; overflow: hidden; border: 1px solid #eee;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 1.2rem; color: #555;">Application Fee for Fully/Partially Funded Category x 1</td>
                            <td style="padding: 1.2rem; text-align: right; font-weight: 600;">$16.99</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 1.2rem; color: #555;">Subtotal</td>
                            <td style="padding: 1.2rem; text-align: right; font-weight: 600;">$16.99</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 1.2rem; color: #555;">Service Charges, VAT & Processing Fee</td>
                            <td style="padding: 1.2rem; text-align: right; font-weight: 600;">$3.00</td>
                        </tr>
                        <tr style="background: #fafafa;">
                            <td style="padding: 1.2rem; font-weight: 800; color: #2D236E;">Total (Nineteen dollars ninety nine cents)</td>
                            <td style="padding: 1.2rem; text-align: right; font-weight: 800; color: #2D236E; font-size: 1.2rem;">$19.99</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Payment Simulation Section -->
            <div style="margin-bottom: 3rem;">
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
                    <div style="background: #6772e5; color: white; padding: 0.4rem 1rem; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Powered by stripe</div>
                </div>

                <div style="background: #fcfcfc; border: 1px solid #eee; border-radius: 16px; padding: 2rem;">
                    <p style="font-size: 0.85rem; color: #777; margin-bottom: 2rem; line-height: 1.5;">
                        After clicking the Submit button, please wait a few seconds for your application to process. Submissions sometimes take longer. 
                        However, if you encounter any issues, feel free to email us at <a href="mailto:info@thecgdl.org" style="color: #6772e5; text-decoration: none;">info@thecgdl.org</a> 
                        or drop a text on WhatsApp at +1(437)3241474 for assistance.
                    </p>

                    <h4 style="font-size: 1rem; color: #333; margin-bottom: 1rem;">Credit Card / Debit Card <span style="color: #d93025;">(Required)</span></h4>
                    
                    <div style="background: white; border: 1px solid #ddd; border-radius: 8px; padding: 1rem; margin-bottom: 2rem;">
                        <div style="margin-bottom: 1rem;">
                            <label style="display: block; font-size: 0.8rem; color: #666; margin-bottom: 0.4rem;">Email</label>
                            <input type="email" placeholder="Email" style="width: 100%; border: none; font-size: 1rem; outline: none;">
                        </div>
                        <div style="border-top: 1px solid #eee; padding-top: 1rem; display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 1rem;">
                            <div>
                                <label style="display: block; font-size: 0.8rem; color: #666; margin-bottom: 0.4rem;">Card number</label>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <input type="text" placeholder="1234 1234 1234 1234" style="width: 100%; border: none; font-size: 1rem; outline: none;">
                                    <img src="https://js.stripe.com/v3/fingerprinted/img/visa-7ad5735c3509b53ebf49.svg" style="height: 20px;" alt="Visa">
                                    <img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d5c6a0112c6da46874.svg" style="height: 20px;" alt="Mastercard">
                                </div>
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.8rem; color: #666; margin-bottom: 0.4rem;">Expiry date</label>
                                <input type="text" placeholder="MM / YY" style="width: 100%; border: none; font-size: 1rem; outline: none;">
                            </div>
                            <div>
                                <label style="display: block; font-size: 0.8rem; color: #666; margin-bottom: 0.4rem;">Security code</label>
                                <input type="text" placeholder="CVC" style="width: 100%; border: none; font-size: 1rem; outline: none;">
                            </div>
                        </div>
                    </div>

                    <h4 style="font-size: 1rem; color: #333; margin-bottom: 0.5rem;">Application Processing Fee <span style="color: #d93025;">(Required)</span></h4>
                    <div style="margin-bottom: 2rem;">
                        <div style="font-size: 0.85rem; color: #666;">Price:</div>
                        <div style="font-size: 1.5rem; font-weight: 800; color: #2D236E;">$19.99</div>
                    </div>

                    <h4 style="font-size: 1rem; color: #333; margin-bottom: 1rem;">Declaration <span style="color: #d93025;">(Required)</span></h4>
                    <div style="background: #f9f9f9; border: 1px solid #eee; border-radius: 12px; padding: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                        <input type="checkbox" style="margin-top: 0.3rem;">
                        <div style="font-size: 0.9rem; color: #444; line-height: 1.5;">
                            <span style="background: #00aeef; color: white; padding: 0.2rem 0.6rem; border-radius: 4px; font-weight: 600; margin-right: 0.5rem; cursor: pointer;">I agree to the Terms and Conditions</span>
                            <br><br>
                            I affirm that all information provided in this application is accurate and truthful to the best of my knowledge. I agree to adhere to 
                            Terms and Conditions and Refund Policy outlined on CGDL's website. I understand that providing false information may lead to 
                            disqualification from the scholarship program or event participation in YDF-26.
                        </div>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 1.5rem;">
                <button style="flex: 1; padding: 1.2rem; background: #2D236E; color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 1px;">Previous</button>
                <button style="flex: 2; padding: 1.2rem; background: #2D236E; color: white; border: none; border-radius: 12px; font-weight: 700; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; position: relative; overflow: hidden;">
                    <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 40px; background: #FFD700; transform: skewX(-20deg); transform-origin: left;"></div>
                    SUBMIT
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
