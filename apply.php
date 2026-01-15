<?php
include 'header.php';
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h1 class="montserrat" style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 20px;">Youth Development Forum 2026<br>Fully/Partially Funded Application</h1>
        <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 15px 30px; border-radius: 10px; font-weight: 800; font-size: 1.1rem; max-width: 800px;">
            Apply Once To Be Considered For Both Fully Funded And Partially Funded Seats - No Separate Applications Required.
        </div>
    </div>
</div>

<div style="max-width: 1100px; margin: 0 auto; padding: 60px 20px;">
    <div id="intro-section" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start;">
        <div style="flex: 1; min-width: 300px;">
            <h2 class="montserrat" style="font-size: 2.5rem; color: #2D236E; margin-bottom: 20px;">Ready to Lead the Future?<br>Berlin 2026 Is Calling</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                You're just a few clicks away from your chance to join (<strong>Fully Funded/Partially Funded</strong>) one of the most exciting youth events of <strong>2026</strong>!
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                From <strong>May 7–10, 2026, 200 young changemakers</strong> from across the globe will gather in <strong>Berlin, Germany</strong> for four unforgettable days of bold conversations, interactive learning, leadership development, and cultural experiences. Selection is <strong>merit-based</strong>, so bring your best ideas, passion, and story to the table.
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                Your journey to the future starts here — let your voice be heard!
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                The application form has three simple parts:<br>
                <strong>1. Basic details</strong><br>
                <strong>2. Personal Details & Motivation</strong><br>
                <strong>3. Application Fee</strong>
            </p>
            
            <div style="display: flex; gap: 20px; margin-top: 40px; flex-wrap: wrap;">
                <div style="background: #2D236E; color: white; padding: 20px; border-radius: 12px; flex: 1; min-width: 200px; display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 2rem;">📍</div>
                    <div>
                        <div style="font-size: 0.8rem; opacity: 0.8;">Event Location</div>
                        <div style="font-weight: 700; font-size: 1.2rem;">Berlin Germany</div>
                    </div>
                </div>
                <div style="background: #2D236E; color: white; padding: 20px; border-radius: 12px; flex: 1; min-width: 200px; display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 2rem;">📅</div>
                    <div>
                        <div style="font-size: 0.8rem; opacity: 0.8;">Event Dates</div>
                        <div style="font-weight: 700; font-size: 1.2rem;">7–10 May 2026</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="flex: 1; min-width: 300px; text-align: center;">
            <div style="background: #eee; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                 <img src="attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg" style="width: 100%; height: auto; display: block;">
            </div>
        </div>
    </div>

    <div style="margin-top: 80px; background: white; border-radius: 20px; padding: 40px; box-shadow: 0 15px 50px rgba(0,0,0,0.05); border: 1px solid #eee;">
        <h2 class="montserrat" style="font-size: 2rem; color: #2D236E; margin-bottom: 10px;">YDF Funded Category Registration</h2>
        <p style="color: #666; margin-bottom: 15px;">Please note that your information interacts with our server as you enter it.</p>
        
        <!-- Step 1 View -->
        <div id="step1">
            <div style="margin-bottom: 40px;">
                <div style="font-size: 0.9rem; color: #888; margin-bottom: 10px;">Step 1 of 3</div>
                <div style="height: 6px; background: #eee; border-radius: 3px; overflow: hidden;">
                    <div style="width: 33%; height: 100%; background: #FFD700;"></div>
                </div>
            </div>

            <h3 class="montserrat" style="font-size: 1.8rem; color: #2D236E; margin-bottom: 30px; border-bottom: 2px solid #FFD700; display: inline-block; padding-bottom: 5px;">Basic Details</h3>

            <form>
                <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 30px;">
                    <div style="flex: 1; min-width: 250px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">First Name <span style="color: red;">(Required)</span></label>
                        <input type="text" id="reg_first_name" placeholder="First" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                    </div>
                    <div style="flex: 1; min-width: 250px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Last Name <span style="color: red;">(Required)</span></label>
                        <input type="text" id="reg_last_name" placeholder="Last" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Nationality <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_nationality" placeholder="e.g USA, UK, UAE" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Email <span style="color: red;">(Required)</span></label>
                    <input type="email" id="reg_email" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="display: flex; justify-content: flex-start;">
                    <button type="button" onclick="nextStep(2)" class="btn-apply-special" style="width: 200px; padding: 15px;">NEXT</button>
                </div>
            </form>
        </div>

        <!-- Step 2 View (Hidden by default) -->
        <div id="step2" style="display: none;">
            <div style="margin-bottom: 40px;">
                <div style="font-size: 0.9rem; color: #888; margin-bottom: 10px;">Step 2 of 3</div>
                <div style="height: 6px; background: #eee; border-radius: 3px; overflow: hidden;">
                    <div style="width: 66%; height: 100%; background: #FFD700;"></div>
                </div>
            </div>

            <h3 class="montserrat" style="font-size: 1.8rem; color: #2D236E; margin-bottom: 30px; border-bottom: 2px solid #FFD700; display: inline-block; padding-bottom: 5px;">Personal Details and Motivation</h3>

            <form>
                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Gender <span style="color: red;">(Required)</span></label>
                    <select required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                    </select>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Date of Birth <span style="color: red;">(Required)</span></label>
                    <input type="date" required style="width: 100%; max-width: 300px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Phone No (with Country Code) <span style="color: red;">(Required)</span></label>
                    <input type="text" required placeholder="+1234567890" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                    <small style="color: #888; display: block; margin-top: 5px;">Please input a valid international phone number</small>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Profession <span style="color: red;">(Required)</span></label>
                    <input type="text" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Organization / University</label>
                    <input type="text" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Country of Residence <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_country" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Departure City <span style="color: red;">(Required)</span></label>
                    <input type="text" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Do you require a visa to travel to Germany? <span style="color: red;">(Required)</span></label>
                    <select required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <small style="color: #888; display: block; margin-top: 5px;">It doesn't affect your qualification for the event</small>
                </div>

                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 15px; color: #444;">How did you hear about YDF26? <span style="color: red;">(Required)</span></label>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                            <input type="radio" name="source" value="CGDL Social media"> CGDL Social media
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                            <input type="radio" name="source" value="Opportunities Sharing Websites"> Opportunities Sharing Websites
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                            <input type="radio" name="source" value="Search Engines"> Search Engines
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                            <input type="radio" name="source" value="Facebook Ads/Instagram Ads"> Facebook Ads/Instagram Ads
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 500;">
                            <input type="radio" name="source" value="Other"> Other
                        </label>
                    </div>
                </div>

                <h3 class="montserrat" style="font-size: 1.8rem; color: #2D236E; margin-bottom: 30px; display: block;">Motivational Questions:</h3>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Tell us about your journey so far. <span style="color: red;">(Required)</span></label>
                    <textarea required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb; min-height: 120px;"></textarea>
                    <small style="color: #888; display: block; margin-top: 5px;">Briefly describe your experiences, initiatives, or achievements in areas such as social impact, public policy, volunteerism, leadership, technology, entrepreneurship, or any other field you are engaged in. What inspires your work, and why are you interested in being part of the Youth Development Forum 2026?</small>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">How do you create impact?</label>
                    <textarea style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb; min-height: 120px;"></textarea>
                    <small style="color: #888; display: block; margin-top: 5px;">What personal strengths, skills, or values guide your work, and how do you see yourself contributing to the collective learning and outcomes of the Youth Development Forum 2026? (Optional)</small>
                </div>

                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Upload Your Profile Photo</label>
                    <input type="file" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                    <small style="color: #888; display: block; margin-top: 5px;">Accepted file types: jpg, jpeg, png, webp, heic, Max. file size: 3 MB.</small>
                </div>

                <div style="display: flex; justify-content: flex-start; gap: 20px;">
                    <button type="button" onclick="nextStep(1)" style="width: 200px; padding: 15px; background: #2D236E; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="button" onclick="nextStep(3)" class="btn-apply-special" style="width: 200px; padding: 15px;">NEXT</button>
                </div>
            </form>
        </div>

        <!-- Step 3 View -->
        <div id="step3" style="display: none;">
            <div style="margin-bottom: 40px;">
                <div style="font-size: 0.9rem; color: #888; margin-bottom: 10px;">Step 3 of 3</div>
                <div style="height: 6px; background: #eee; border-radius: 3px; overflow: hidden;">
                    <div style="width: 100%; height: 100%; background: #FFD700;"></div>
                </div>
            </div>

            <h3 class="montserrat" style="font-size: 1.8rem; color: #2D236E; margin-bottom: 30px; border-bottom: 2px solid #FFD700; display: inline-block; padding-bottom: 5px;">Application Fee</h3>
            
            <p style="font-size: 1rem; line-height: 1.6; color: #444; margin-bottom: 30px;">
                Complete your application by submitting the application fee to secure your spot at the Youth Development Forum 2026. We process payments through Stripe, a globally trusted and highly secure platform, ensuring your personal and payment details are fully protected under General Data Protection Regulation (GDPR) standards. Have questions? We're here to help! Reach out to us at <a href="mailto:info@thecgdl.org" style="color: #2D236E; font-weight: 600;">info@thecgdl.org</a>. Let's make it happen!
            </p>

            <h4 class="montserrat" style="font-size: 1.2rem; color: #2D236E; margin-bottom: 20px;">Billing Information</h4>
            
            <div style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-bottom: 40px;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <tr style="border-bottom: 1px solid #ddd; background: #f9f9fb;">
                        <td style="padding: 15px; font-weight: 500;">Application Fee for Fully/Partially Funded Category x 1</td>
                        <td style="padding: 15px; text-align: right;">$16.99</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 15px; font-weight: 500;">Subtotal</td>
                        <td style="padding: 15px; text-align: right;">$16.99</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 15px; font-weight: 500;">Service Charges, VAT & Processing Fee</td>
                        <td style="padding: 15px; text-align: right;">$3.00</td>
                    </tr>
                    <tr style="background: #f9f9fb; font-weight: 800; font-size: 1.1rem; color: #2D236E;">
                        <td style="padding: 15px;">Total (Nineteen dollars ninety nine cents)</td>
                        <td style="padding: 15px; text-align: right;">$19.99</td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 40px;">
                <h4 class="montserrat" style="font-size: 1.2rem; color: #2D236E; margin-bottom: 20px;">How would you like to pay?</h4>
                <div style="display: flex; flex-direction: column; gap: 15px; border: 1px solid #ddd; border-radius: 12px; padding: 20px; background: #f9f9fb;">
                    <div style="border-bottom: 1px solid #eee;">
                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
                            <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; flex: 1;">
                                <input type="radio" name="payment_method" value="crypto" style="width: 20px; height: 20px;" onchange="toggleCryptoDetails(this.checked)">
                                <div style="display: flex; flex-direction: column;">
                                    <span style="font-weight: 600; color: #2D236E;">Cryptocurrency (BTC, ETH, USDT)</span>
                                    <span style="color: #28a745; font-size: 0.7rem; font-weight: 600;">Available Now</span>
                                </div>
                            </label>
                            <div style="display: flex; gap: 8px;">
                                <span style="font-size: 1.5rem;">₿</span>
                                <span style="font-size: 1.5rem;">◈</span>
                                <span style="font-size: 1.5rem;">₮</span>
                            </div>
                        </div>
                        <div id="crypto_details" style="display: none; padding: 20px; background: #fff; border: 1px solid #FFD700; border-radius: 8px; margin: 10px;">
                            <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center; justify-content: center;">
                                <div style="text-align: center;">
                                    <?php 
                                    $btc_address = get_admin_setting('btc_address', '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa');
                                    $btc_qr_custom = get_admin_setting('btc_qr');
                                    
                                    if ($btc_qr_custom) {
                                        $qr_url = $btc_qr_custom;
                                    } else {
                                        $qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($btc_address);
                                    }
                                    ?>
                                    <img src="<?php echo $qr_url; ?>" alt="BTC QR Code" style="width: 150px; height: 150px; border: 1px solid #eee; padding: 5px; border-radius: 4px;">
                                    <div style="margin-top: 10px; font-size: 0.8rem; font-weight: 700; color: #f7931a;">BITCOIN (BTC)</div>
                                </div>
                                <div style="flex: 1; min-width: 250px;">
                                    <div style="margin-bottom: 15px;">
                                        <label style="display: block; font-size: 0.8rem; color: #888; margin-bottom: 5px;">BTC Wallet Address:</label>
                                        <div style="background: #f8f9fa; padding: 10px; border-radius: 4px; border: 1px dashed #ccc; font-family: monospace; font-size: 0.9rem; word-break: break-all; position: relative;">
                                            <span id="btc_addr_text"><?php echo $btc_address; ?></span>
                                            <button type="button" onclick="copyToClipboard('btc_addr_text')" style="background: none; border: none; color: #2D236E; cursor: pointer; float: right; font-size: 1rem;">📋</button>
                                        </div>
                                    </div>
                                    <div style="font-size: 0.85rem; color: #666; line-height: 1.4;">
                                        <strong>Instructions:</strong> Please send exactly <strong>$19.99</strong> equivalent in BTC to the address above. After payment, upload your transaction screenshot below.
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px;">
                                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Upload Transaction Screenshot <span style="color: red;">(Required)</span></label>
                                <input type="file" name="crypto_screenshot" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px; border-bottom: 1px solid #eee;">
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; flex: 1;">
                            <input type="radio" name="payment_method" value="card" style="width: 20px; height: 20px;" onchange="toggleCryptoDetails(false)">
                            <div style="display: flex; flex-direction: column;">
                                <span style="font-weight: 600; color: #2D236E;">Credit or Debit Card</span>
                                <span style="color: #dc3545; font-size: 0.7rem; font-weight: 600;">Currently Unavailable</span>
                            </div>
                        </label>
                        <div style="display: flex; gap: 8px;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" style="height: 15px;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" style="height: 15px;">
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px;">
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; flex: 1;">
                            <input type="radio" name="payment_method" value="paypal" style="width: 20px; height: 20px;" onchange="toggleCryptoDetails(false)">
                            <div style="display: flex; flex-direction: column;">
                                <span style="font-weight: 600; color: #2D236E;">PayPal</span>
                                <span style="color: #dc3545; font-size: 0.7rem; font-weight: 600;">Currently Unavailable</span>
                            </div>
                        </label>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" style="height: 18px;">
                    </div>
                </div>
            </div>

            <form>
                <div style="display: flex; justify-content: flex-start; gap: 20px;">
                    <button type="button" onclick="nextStep(2)" style="width: 200px; padding: 15px; background: #2D236E; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="submit" class="btn-apply-special" style="width: 200px; padding: 15px;">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function nextStep(step) {
    const currentStepNum = parseInt(document.querySelector('#step1, #step2, #step3:not([style*="display: none"])')?.id?.replace('step', '') || '1');
    
    // Validation logic for moving forward
    if (step > currentStepNum) {
        let isValid = true;
        let currentView = document.getElementById('step' + currentStepNum);
        
        // Validate required inputs
        let inputs = currentView.querySelectorAll('input[required], select[required], textarea[required]');
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '#ddd';
            }
        });

        // Step 2 specific validation
        if (currentStepNum === 2) {
            let sourceRadios = document.getElementsByName('source');
            let radioChecked = false;
            for (let radio of sourceRadios) {
                if (radio.checked) {
                    radioChecked = true;
                    break;
                }
            }
            
            if (!radioChecked) {
                isValid = false;
                alert('Please select how you heard about us.');
                return;
            }
        }

        if (!isValid) {
            alert('Please fill in all required fields.');
            return;
        }
    }

    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step3').style.display = 'none';
    
    document.getElementById('step' + step).style.display = 'block';
    
    // Smooth scroll to form top
    const formElement = document.getElementById('step' + step);
    const yOffset = -150; 
    const y = formElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
    window.scrollTo({top: y, behavior: 'smooth'});

    // Show/Hide intro section
    if (step > 1) {
        document.getElementById('intro-section').style.display = 'none';
    } else {
        document.getElementById('intro-section').style.display = 'flex';
    }
}

function toggleCryptoDetails(show) {
    document.getElementById('crypto_details').style.display = show ? 'block' : 'none';
}

function copyToClipboard(id) {
    const text = document.getElementById(id).innerText;
    navigator.clipboard.writeText(text).then(() => {
        alert('Address copied to clipboard!');
    });
}
</script>

<?php include 'footer.php'; ?>
