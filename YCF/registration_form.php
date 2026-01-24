<?php
/**
 * Multi-step Registration Component
 */
function render_registration_form($package_id, $package_name, $price) {
    ?>
    <div id="registration-form-container" style="background: white; border-radius: 15px; padding: 40px; color: #333; text-align: left; max-width: 800px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <script>
            // Hide package details when the registration form is rendered
            const detailsGrid = document.getElementById('package-details-grid');
            if (detailsGrid) {
                detailsGrid.style.display = 'none';
            }
        </script>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
             <div style="background: #2D236E; color: white; padding: 10px 20px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 1.2rem;">📍</span>
                <div>
                    <div style="font-size: 0.7rem; opacity: 0.8;">Event Location</div>
                    <div style="font-weight: 700; font-size: 0.9rem;">Berlin Germany</div>
                </div>
            </div>
            <div style="background: #2D236E; color: white; padding: 10px 20px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 1.2rem;">📅</span>
                <div>
                    <div style="font-size: 0.7rem; opacity: 0.8;">Event Dates</div>
                    <div style="font-weight: 700; font-size: 0.9rem;">7–10 May 2026</div>
                </div>
            </div>
        </div>

        <div id="error-banner" style="display: none; background: #fff5f5; border: 1px solid #fc8181; color: #c53030; padding: 15px; border-radius: 8px; margin-bottom: 25px; font-size: 0.9rem; font-weight: 500; display: flex; align-items: center; gap: 10px;">
            <span style="font-size: 1.2rem;">⚠️</span>
            <span>There was a problem with your submission. Please review the fields below.</span>
        </div>

        <h2 class="montserrat" style="font-size: 1.8rem; font-weight: 800; margin-bottom: 5px;"><?php echo $package_name; ?> Registration</h2>
        <p style="font-size: 0.9rem; color: #666; margin-bottom: 20px;">Please note that your information interacts with our server as you enter it.</p>
        
        <!-- Progress Bar -->
        <div style="margin-bottom: 30px;">
            <div style="display: flex; justify-content: space-between; font-size: 0.8rem; font-weight: 600; color: #666; margin-bottom: 8px;">
                <span id="step-label">Step 1 of 3</span>
            </div>
            <div style="width: 100%; height: 8px; background: #eee; border-radius: 4px; overflow: hidden;">
                <div id="progress-bar" style="width: 33.33%; height: 100%; background: #F1D302; transition: width 0.3s ease;"></div>
            </div>
        </div>

        <form id="multi-step-form" enctype="multipart/form-data">
            <!-- Step 1: Basic Details -->
            <div id="step-1" class="form-step">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px; border-bottom: 2px solid #F1D302; display: inline-block;">Basic Details</h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">First Name <span style="color: #d9534f;">(Required)</span></label>
                        <input type="text" name="first_name" placeholder="First" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Last Name <span style="color: #d9534f;">(Required)</span></label>
                        <input type="text" name="last_name" placeholder="Last" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Nationality <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="nationality" placeholder="e.g USA, UK, UAE" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Email <span style="color: #d9534f;">(Required)</span></label>
                    <input type="email" name="email" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <button type="button" onclick="nextStep(2)" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; text-transform: uppercase;">Next</button>
            </div>

            <!-- Step 2: Personal Details and Motivation -->
            <div id="step-2" class="form-step" style="display: none;">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px; border-bottom: 2px solid #F1D302; display: inline-block;">Personal Details and Motivation</h3>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Gender <span style="color: #d9534f;">(Required)</span></label>
                    <select name="gender" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Date of Birth <span style="color: #d9534f;">(Required)</span></label>
                    <input type="date" name="dob" style="width: 100%; max-width: 300px; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Phone No (with Country Code) <span style="color: #d9534f;">(Required)</span></label>
                    <input type="tel" name="phone" placeholder="+1..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                    <span style="font-size: 0.75rem; color: #888;">Please input a valid international phone number</span>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Profession <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="profession" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Organization / University</label>
                    <input type="text" name="organization" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Country of Residence <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="residence" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Departure City <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="departure" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Do you require a visa to travel to Germany? <span style="color: #d9534f;">(Required)</span></label>
                    <select name="visa" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb;" required>
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <span style="font-size: 0.75rem; color: #888;">It doesn't affect your qualification for the event</span>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 12px;">How did you hear about YDF26? <span style="color: #d9534f;">(Required)</span></label>
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
                            <input type="radio" name="referral" value="CGDL Social media" required> CGDL Social media
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
                            <input type="radio" name="referral" value="Opportunities Sharing Websites"> Opportunities Sharing Websites
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
                            <input type="radio" name="referral" value="Search Engines"> Search Engines
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
                            <input type="radio" name="referral" value="Facebook Ads/Instagram Ads"> Facebook Ads/Instagram Ads
                        </label>
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
                            <input type="radio" name="referral" value="Other"> Other
                        </label>
                    </div>
                </div>

                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px; border-bottom: 2px solid #F1D302; display: inline-block;">Motivational Questions:</h3>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Tell us about your journey so far. <span style="color: #d9534f;">(Required)</span></label>
                    <textarea name="journey" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb; min-height: 100px;" required></textarea>
                    <span style="font-size: 0.75rem; color: #888;">Briefly describe your experiences, initiatives, or achievements in areas such as social impact, public policy, volunteerism, leadership, technology, entrepreneurship, or any other field you are engaged in. What inspires your work, and why are you interested in being part of the Youth Development Forum 2026?</span>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">How do you create impact?</label>
                    <textarea name="impact" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none; background: #f9f9fb; min-height: 100px;"></textarea>
                    <span style="font-size: 0.75rem; color: #888;">What personal strengths, skills, or values guide your work, and how do you see yourself contributing to the collective learning and outcomes of the Youth Development Forum 2026? (Optional)</span>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Upload Your Profile Photo <span style="color: #d9534f;">(Required)</span></label>
                    <input type="file" name="profile_photo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9fb;" required>
                    <span style="font-size: 0.75rem; color: #888;">Accepted file types: jpg, jpeg, png, webp, heic, Max. file size: 3 MB.</span>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Upload Your Passport Photo <span style="color: #d9534f;">(Required)</span></label>
                    <input type="file" name="passport_photo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9fb;" required>
                    <span style="font-size: 0.75rem; color: #888;">Accepted file types: jpg, jpeg, png, webp, heic, Max. file size: 3 MB.</span>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="button" onclick="nextStep(1)" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="button" onclick="nextStep(3)" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; text-transform: uppercase;">Next</button>
                </div>
            </div>

            <!-- Step 3: Application Fee -->
            <div id="step-3" class="form-step" style="display: none;">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px; border-bottom: 2px solid #F1D302; display: inline-block;">Application Fee</h3>
                
                <p style="font-size: 0.9rem; line-height: 1.6; color: #444; margin-bottom: 25px;">
                    Complete your application by submitting the application fee to secure your spot at the Youth Development Forum 2026. We process payments through Stripe, a globally trusted and highly secure platform, ensuring your personal and payment details are fully protected under General Data Protection Regulation (GDPR) standards. Have questions? We’re here to help! Reach out to us at info@thecgdl.org. Let’s make it happen!
                </p>

                <h4 class="montserrat" style="font-size: 1.1rem; color: #2D236E; margin-bottom: 15px;">Billing Information</h4>
                
                <div style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-bottom: 30px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-size: 0.9rem;"><?php echo $package_name; ?> x 1</td>
                            <td style="padding: 15px; text-align: right; font-weight: 600;">$<?php echo number_format($price, 2); ?></td>
                        </tr>
                        <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-size: 0.9rem;">Subtotal</td>
                            <td style="padding: 15px; text-align: right; font-weight: 600;">$<?php echo number_format($price, 2); ?></td>
                        </tr>
                        <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-size: 0.9rem;">Service Charges, VAT & Processing Fee</td>
                            <td style="padding: 15px; text-align: right; font-weight: 600;">$3.00</td>
                        </tr>
                    <tr style="background: #f9f9fb; font-weight: 800; color: #2D236E; font-size: 1.1rem;">
                        <td style="padding: 15px;">Total</td>
                        <td style="padding: 15px; text-align: right;">$<?php echo number_format($price + 3.00, 2); ?></td>
                    </tr>
                    </table>
                </div>

                <div style="margin-bottom: 30px;">
                    <h4 class="montserrat" style="font-size: 1.1rem; color: #2D236E; margin-bottom: 15px;">Payment Method</h4>
                    <div style="border: 1px solid #ddd; border-radius: 12px; padding: 20px; background: #f9f9fb;">
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; padding: 10px; border-bottom: 1px solid #eee;">
                            <input type="radio" name="payment_method" value="crypto" onchange="toggleCryptoDetails(this.checked)" required>
                            <div>
                                <span style="font-weight: 700; color: #2D236E; display: block;">Cryptocurrency</span>
                                <span style="color: #28a745; font-size: 0.75rem; font-weight: 700;">Available Now</span>
                            </div>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bitcoin.svg" style="height: 24px; margin-left: auto;" alt="Bitcoin">
                        </label>
                        
                        <div id="crypto-details" style="display: none; padding-top: 20px; text-align: center;">
                            <div style="background: white; border: 1px solid #F1D302; border-radius: 12px; padding: 20px; margin-bottom: 20px;">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" style="width: 150px; margin-bottom: 15px; border: 1px solid #eee; padding: 5px; border-radius: 8px;">
                                <div style="background: #f8f9fa; padding: 10px; border-radius: 6px; font-family: monospace; font-size: 0.85rem; word-break: break-all; margin-bottom: 15px; border: 1px dashed #ccc; display: flex; align-items: center; justify-content: space-between; max-width: 100%; overflow: hidden;">
                                    <span id="btc-address" style="overflow-wrap: anywhere;">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</span>
                                    <button type="button" onclick="copyAddress()" style="background: #2D236E; color: white; border: none; padding: 8px 15px; border-radius: 4px; font-size: 0.8rem; cursor: pointer; margin-left: 10px; white-space: nowrap; font-weight: 700;">Copy</button>
                                </div>
                                <script>
                                function copyAddress() {
                                    const address = document.getElementById('btc-address').innerText;
                                    navigator.clipboard.writeText(address).then(() => {
                                        const btn = event.target;
                                        const originalText = btn.innerText;
                                        btn.innerText = 'Copied!';
                                        setTimeout(() => btn.innerText = originalText, 2000);
                                    });
                                }
                                </script>
                                <div style="text-align: left;">
                                    <label style="display: block; font-size: 0.8rem; font-weight: 700; margin-bottom: 5px;">Transaction ID (TXID) <span style="color: red;">*</span></label>
                                    <input type="text" name="txid" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 15px;">
                                    
                                    <label style="display: block; font-size: 0.8rem; font-weight: 700; margin-bottom: 5px;">Upload Payment Screenshot <span style="color: red;">*</span></label>
                                    <input type="file" name="payment_screenshot" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 6px;">
                                </div>
                            </div>
                        </div>

                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; padding: 10px; opacity: 0.6;">
                            <input type="radio" name="payment_method" value="card" disabled>
                            <div>
                                <span style="font-weight: 700; color: #2D236E; display: block;">Mastercard / Visa</span>
                                <span style="color: #dc3545; font-size: 0.75rem; font-weight: 700;">Currently Unavailable</span>
                            </div>
                            <div style="display: flex; gap: 5px; margin-left: auto;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" style="height: 20px;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" style="height: 12px;">
                            </div>
                        </label>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="button" onclick="nextStep(2)" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="submit" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer; text-transform: uppercase;">Complete Registration</button>
                </div>
            </div>
            // Handle form submission
            document.getElementById('multi-step-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                formData.append('package_id', '<?php echo $package_id; ?>');
                formData.append('package_name', '<?php echo $package_name; ?>');
                formData.append('amount', '<?php echo $price; ?>');

                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerText;
                submitBtn.disabled = true;
                submitBtn.innerText = 'Processing...';

                fetch('process_registration.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to success page or show success message
                        window.location.href = 'index.php?registration=success';
                    } else {
                        submitBtn.disabled = false;
                        submitBtn.innerText = originalBtnText;
                        document.getElementById('error-banner').style.display = 'flex';
                        document.getElementById('error-banner').querySelector('span:last-child').innerText = 'Database error: ' + (data.message || 'Could not save registration.');
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                })
                .catch(error => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = originalBtnText;
                    console.error('Error:', error);
                    document.getElementById('error-banner').style.display = 'flex';
                    document.getElementById('error-banner').querySelector('span:last-child').innerText = 'An unexpected error occurred. Please try again.';
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });
        const currentStep = step === 2 ? 1 : 2;
        const container = document.getElementById('step-' + currentStep);
        const inputs = container.querySelectorAll('[required]');
        let isValid = true;
        
        // Reset error states
        document.getElementById('error-banner').style.display = 'none';
        container.querySelectorAll('.error-msg').forEach(el => el.remove());
        container.querySelectorAll('input, select, textarea').forEach(el => el.style.borderColor = '#ddd');

        if (step > currentStep) {
            inputs.forEach(input => {
                if (!input.value.trim() || (input.type === 'radio' && !container.querySelector(`input[name="${input.name}"]:checked`))) {
                    isValid = false;
                    input.style.borderColor = '#fc8181';
                    
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'error-msg';
                    errorMsg.style.color = '#c53030';
                    errorMsg.style.fontSize = '0.75rem';
                    errorMsg.style.marginTop = '5px';
                    errorMsg.innerText = 'This field is required.';
                    
                    if (input.type === 'radio') {
                        if (!input.parentNode.parentNode.querySelector('.error-msg')) {
                            input.parentNode.parentNode.appendChild(errorMsg);
                        }
                    } else {
                        input.parentNode.appendChild(errorMsg);
                    }
                }
            });
        }

        if (!isValid) {
            document.getElementById('error-banner').style.display = 'flex';
            document.getElementById('error-banner').scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
        document.getElementById('step-' + step).style.display = 'block';
        
        // Update Progress Bar
        const progress = (step / 3) * 100;
        document.getElementById('progress-bar').style.width = progress + '%';
        document.getElementById('step-label').innerText = 'Step ' + step + ' of 3';
        
        // Scroll to top of form
        document.getElementById('registration-form-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    document.getElementById('multi-step-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        if (!submitBtn) return;
        
        const originalBtnText = submitBtn.innerText;
        submitBtn.innerHTML = '<span class="loading-spinner"></span> Processing...';
        submitBtn.disabled = true;

        // Add spinner style if not exists
        if (!document.getElementById('spinner-style')) {
            const style = document.createElement('style');
            style.id = 'spinner-style';
            style.innerHTML = `
                .loading-spinner {
                    display: inline-block;
                    width: 16px;
                    height: 16px;
                    border: 2px solid rgba(255,255,255,0.3);
                    border-radius: 50%;
                    border-top-color: #fff;
                    animation: spin 1s ease-in-out infinite;
                    margin-right: 8px;
                    vertical-align: middle;
                }
                @keyframes spin {
                    to { transform: rotate(360deg); }
                }
                .success-popup {
                    position: fixed;
                    top: 0; left: 0; width: 100%; height: 100%;
                    background: rgba(0,0,0,0.8);
                    display: flex; align-items: center; justify-content: center;
                    z-index: 10000;
                    animation: fadeIn 0.3s ease;
                }
                @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
            `;
            document.head.appendChild(style);
        }

        const formData = new FormData(this);
        formData.append('package_id', '<?php echo $package_id; ?>');
        formData.append('package_name', '<?php echo $package_name; ?>');
        formData.append('amount', '<?php echo $price + 3.00; ?>');

        fetch('process_registration.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Server returned ' + response.status);
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showSuccessPopup();
            } else {
                throw new Error(data.message || 'Registration failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            submitBtn.innerText = originalBtnText;
            submitBtn.disabled = false;
            
            // Sync issue recovery
            if (error.message && (error.message.includes('Invalid request method') || error.message.includes('Server returned 302') || error.message.includes('JSON') || error.message.includes('Network response'))) {
                const retryData = {};
                formData.forEach((value, key) => { 
                    if (typeof value === 'string') retryData[key] = value; 
                });
                
                // Add essential fields for retry
                retryData['package_id'] = '<?php echo $package_id; ?>';
                retryData['package_name'] = '<?php echo $package_name; ?>';
                retryData['amount'] = '<?php echo $price + 3.00; ?>';

                fetch('process_registration.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(retryData)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) showSuccessPopup();
                    else alert(data.message || 'Registration failed. Please try again.');
                })
                .catch(err => {
                    // Final fallback using direct navigation
                    const queryParams = new URLSearchParams(retryData).toString();
                    window.location.href = 'process_registration.php?' + queryParams;
                });
            } else {
                alert(error.message || 'An error occurred. Please try again.');
            }
        });
    });

    function showSuccessPopup() {
        const popup = document.createElement('div');
        popup.className = 'success-popup';
        popup.innerHTML = `
            <div style="background: white; padding: 40px; border-radius: 20px; text-align: center; max-width: 400px; width: 90%;">
                <div style="width: 80px; height: 80px; background: #4BB543; color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 40px; margin: 0 auto 20px;">
                    ✓
                </div>
                <h2 style="margin-bottom: 10px; color: #333;">SUCCESS!</h2>
                <p style="color: #666; margin-bottom: 30px;">Registration submitted. Thank you!</p>
                <button onclick="window.location.href='index.php'" style="background: #2D236E; color: white; border: none; padding: 12px 40px; border-radius: 6px; font-weight: 700; cursor: pointer; text-transform: uppercase; width: 100%;">Continue</button>
            </div>
        `;
        document.body.appendChild(popup);
    }
    </script>
    <?php
}
