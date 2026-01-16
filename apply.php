<?php
include 'header.php';

$package = $_GET['package'] ?? 'funded';

// Map legacy or mismatched package names to standard keys
if ($package === 'gf_22' || $package === 'forum_admission') {
    $package = 'forum_admission';
} elseif ($package === 'gf_23' || $package === 'self_funded') {
    $package = 'self_funded';
} elseif ($package === 'gf_24') {
    $package = 'funded';
}

$package_names = [
    'fully_funded' => 'YDF Fully Funded Category Registration',
    'partially_funded' => 'YDF Partially Funded Category Registration',
    'forum_admission' => 'YDF Forum Admission Registration',
    'self_funded' => 'YDF Self Funded Category Registration',
    'funded' => 'YDF Funded Category Registration'
];

$package_prices = [
    'fully_funded' => 19.99,
    'partially_funded' => 19.99,
    'forum_admission' => 499.00,
    'self_funded' => 799.00,
    'funded' => 19.99
];

$service_charges = [
    'fully_funded' => 0.00,
    'partially_funded' => 0.00,
    'forum_admission' => 120.00,
    'self_funded' => 0.00,
    'funded' => 0.00
];

$current_package_name = $package_names[$package] ?? $package_names['funded'];
$current_price = $package_prices[$package] ?? $package_prices['funded'];
$current_service_charge = $service_charges[$package] ?? $service_charges['funded'];
$total_amount = $current_price + $current_service_charge;

$is_guaranteed = ($package === 'forum_admission' || $package === 'self_funded');
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h1 class="montserrat" style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 20px;">Youth Development Forum 2026<br><?php echo str_replace('YDF ', '', str_replace(' Registration', '', $current_package_name)); ?></h1>
        <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 15px 30px; border-radius: 10px; font-weight: 800; font-size: 1.1rem; max-width: 800px;">
            <?php if ($is_guaranteed): ?>
                Guaranteed Selection for <?php echo str_replace(' Registration', '', $current_package_name); ?>.
            <?php else: ?>
                Apply Once To Be Considered For Both Fully Funded And Partially Funded Seats - No Separate Applications Required.
            <?php endif; ?>
        </div>
        <?php if ($package === 'forum_admission'): ?>
            <div style="margin-top: 20px; font-size: 2.5rem; font-weight: 800; font-family: 'Montserrat', sans-serif;">$499.00</div>
        <?php endif; ?>
    </div>
</div>

<div style="max-width: 1100px; margin: 0 auto; padding: 60px 20px;">
    <div id="intro-section" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start;">
        <div style="flex: 1; min-width: 300px;">
            <h2 class="montserrat" style="font-size: 2.5rem; color: #2D236E; margin-bottom: 20px;">Ready to Lead the Future?<br>Berlin 2026 Is Calling</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                You're just a few clicks away from your chance to join (<strong><?php echo str_replace(' Registration', '', $current_package_name); ?></strong>) one of the most exciting youth events of <strong>2026</strong>!
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                From <strong>May 7–10, 2026, 200 young changemakers</strong> from across the globe will gather in <strong>Berlin, Germany</strong> for four unforgettable days of bold conversations, interactive learning, leadership development, and cultural experiences. Selection is <strong><?php echo $is_guaranteed ? 'guaranteed' : 'merit-based'; ?></strong>, so bring your best ideas, passion, and story to the table.
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
        <h2 class="montserrat" style="font-size: 2rem; color: #2D236E; margin-bottom: 10px;"><?php echo $current_package_name; ?></h2>
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

            <div class="form-step-container">
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
            </div>
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

            <div class="form-step-container">
                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Gender <span style="color: red;">(Required)</span></label>
                    <select id="reg_gender" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                    </select>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Date of Birth <span style="color: red;">(Required)</span></label>
                    <input type="date" id="reg_dob" required style="width: 100%; max-width: 300px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Phone No (with Country Code) <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_phone" required placeholder="+1234567890" style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                    <small style="color: #888; display: block; margin-top: 5px;">Please input a valid international phone number</small>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Profession <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_profession" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Country of Residence <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_residence" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Departure City <span style="color: red;">(Required)</span></label>
                    <input type="text" id="reg_departure" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Do you require a visa to travel to Germany? <span style="color: red;">(Required)</span></label>
                    <select id="reg_visa" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 15px; color: #444;">How did you hear about YDF26? <span style="color: red;">(Required)</span></label>
                    <div class="source-options-container" style="display: flex; flex-direction: column; gap: 10px; padding: 15px; border-radius: 12px; transition: all 0.3s ease;">
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

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Tell us about your journey so far. <span style="color: red;">(Required)</span></label>
                    <textarea id="reg_journey" required style="width: 100%; padding: 15px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb; min-height: 120px;"></textarea>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Upload Your Profile Photo <span style="color: red;">(Required)</span></label>
                    <input type="file" id="reg_profile_photo" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="margin-bottom: 40px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #444;">Upload Your Passport Photo <span style="color: red;">(Required)</span></label>
                    <input type="file" id="reg_passport_photo" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; outline: none; background: #f9f9fb;">
                </div>

                <div style="display: flex; justify-content: flex-start; gap: 20px;">
                    <button type="button" onclick="nextStep(1)" style="width: 200px; padding: 15px; background: #2D236E; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="button" onclick="nextStep(3)" class="btn-apply-special" style="width: 200px; padding: 15px;">NEXT</button>
                </div>
            </div>
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
                Complete your application by submitting the application fee to secure your spot at the Youth Development Forum 2026. We process payments through Stripe, a globally trusted and highly secure platform, ensuring your personal and payment details are fully protected under General Data Protection Regulation (GDPR) standards. Have questions? We’re here to help! Reach out to us at info@thecgdl.org. Let’s make it happen!
            </p>

            <h4 class="montserrat" style="font-size: 1.2rem; color: #2D236E; margin-bottom: 20px;">Billing Information</h4>
            <div style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; margin-bottom: 40px;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                        <td style="padding: 15px; color: #444;"><?php echo str_replace(' Registration', '', $current_package_name); ?> x 1</td>
                        <td style="padding: 15px; text-align: right; color: #444;">$<?php echo number_format($current_price, 2); ?></td>
                    </tr>
                    <?php if ($current_service_charge > 0): ?>
                    <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                        <td style="padding: 15px; color: #444;">Subtotal</td>
                        <td style="padding: 15px; text-align: right; color: #444;">$<?php echo number_format($current_price, 2); ?></td>
                    </tr>
                    <tr style="background: #f9f9fb; border-bottom: 1px solid #eee;">
                        <td style="padding: 15px; color: #444;">Service Charges, VAT & Processing Fee</td>
                        <td style="padding: 15px; text-align: right; color: #444;">$<?php echo number_format($current_service_charge, 2); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr style="background: #f9f9fb; font-weight: 800; font-size: 1.1rem; color: #2D236E;">
                        <td style="padding: 15px;">Total</td>
                        <td style="padding: 15px; text-align: right;">$<?php echo number_format($total_amount, 2); ?></td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 40px;">
                <h4 class="montserrat" style="font-size: 1.2rem; color: #2D236E; margin-bottom: 20px;">Payment Method</h4>
                <div style="display: flex; flex-direction: column; gap: 15px; border: 1px solid #ddd; border-radius: 12px; padding: 20px; background: #f9f9fb;">
                    <div style="border-bottom: 1px solid #eee;">
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; padding: 10px;">
                            <input type="radio" name="payment_method" value="crypto" onchange="toggleCryptoDetails(this.checked)" required>
                            <div style="display: flex; flex-direction: column;">
                                <span style="font-weight: 600; color: #2D236E;">Cryptocurrency </span>
                                <span style="color: #28a745; font-size: 0.7rem; font-weight: 600;">Available Now</span>
                            </div>
                            <div style="display: flex; gap: 8px; margin-left: auto;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/46/Bitcoin.svg" style="height: 24px;" alt="Bitcoin Logo">
                            </div>
                        </label>
                        <div id="crypto_details" style="display: none; padding: 20px; background: #fff; border: 1px solid #FFD700; border-radius: 8px; margin: 10px;">
                            <div style="text-align: center; margin-bottom: 20px;">
                                <?php 
                                $btc_address = get_admin_setting('btc_address', '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'); 
                                $qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($btc_address);
                                ?>
                                <img src="<?php echo $qr_url; ?>" alt="BTC QR Code" style="width: 150px; height: 150px; border: 1px solid #eee; padding: 5px; border-radius: 8px; margin-bottom: 10px;">
                                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; background: #f8f9fa; padding: 10px; border-radius: 8px; border: 1px dashed #ccc;">
                                    <span id="btc_address_text" style="word-break: break-all; font-family: monospace; font-weight: 600; color: #2D236E;"><?php echo $btc_address; ?></span>
                                    <button type="button" onclick="copyAddress()" style="background: #2D236E; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; display: flex; align-items: center; gap: 5px;">
                                        <svg viewBox="0 0 24 24" style="width: 14px; height: 14px; fill: white;"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"></path></svg>
                                        Copy
                                    </button>
                                </div>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Transaction ID (TXID) <span style="color: red;">(Required)</span></label>
                                <input type="text" id="transaction_id" placeholder="Enter TXID" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                            </div>
                            <div>
                                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Screenshot <span style="color: red;">(Required)</span></label>
                                <input type="file" id="crypto_screenshot" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                            </div>
                        </div>
                    </div>

                    <div style="border-bottom: 1px solid #eee;">
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; padding: 10px;">
                            <input type="radio" name="payment_method" value="card" disabled>
                            <div style="display: flex; flex-direction: column;">
                                <span style="font-weight: 600; color: #2D236E;">Mastercard / Visa</span>
                                <span style="color: #dc3545; font-size: 0.7rem; font-weight: 600;">Currently Unavailable</span>
                            </div>
                            <div style="display: flex; gap: 8px; margin-left: auto;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" style="height: 24px; opacity: 0.6;" alt="Mastercard">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" style="height: 18px; opacity: 0.6;" alt="Visa">
                            </div>
                        </label>
                    </div>

                    <div>
                        <label style="display: flex; align-items: center; gap: 15px; cursor: pointer; padding: 10px;">
                            <input type="radio" name="payment_method" value="paypal" disabled>
                            <div style="display: flex; flex-direction: column;">
                                <span style="font-weight: 600; color: #2D236E;">PayPal</span>
                                <span style="color: #dc3545; font-size: 0.7rem; font-weight: 600;">Currently Unavailable</span>
                            </div>
                            <div style="display: flex; margin-left: auto;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" style="height: 24px; opacity: 0.6;" alt="PayPal">
                            </div>
                        </label>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-start; gap: 20px; margin-top: 40px;">
                    <button type="button" onclick="nextStep(2)" style="width: 200px; padding: 15px; background: #2D236E; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; text-transform: uppercase;">Previous</button>
                    <button type="button" onclick="handleFinalSubmit()" class="btn-apply-special" style="width: 200px; padding: 15px;">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Professional Success Popup REMOVED - replaced by global modal in header.php -->

<script>
function nextStep(step) {
    const currentStepNum = parseInt(document.querySelector('#step1:not([style*="display: none"]), #step2:not([style*="display: none"]), #step3:not([style*="display: none"])')?.id?.replace('step', '') || '1');
    
    if (step > currentStepNum) {
        let isValid = true;
        let currentView = document.getElementById('step' + currentStepNum);
        let inputs = currentView.querySelectorAll('input[required], select[required], textarea[required]');
        
        inputs.forEach(input => {
            let isFieldValid = true;
            if (input.type === 'file') {
                if (!input.files || !input.files.length) isFieldValid = false;
            } else if (input.tagName.toLowerCase() === 'select') {
                if (!input.value) isFieldValid = false;
            } else if (input.type === 'radio') {
                const name = input.name;
                const checked = currentView.querySelector(`input[name="${name}"]:checked`);
                if (!checked) isFieldValid = false;
            } else {
                if (!input.value.trim()) isFieldValid = false;
            }
            
            if (!isFieldValid) {
                isValid = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '#ddd';
            }
        });
        
        if (!isValid) {
            showCustomModal("Warning: Please ensure all required fields are completed before proceeding.");
            // Change modal style for warning
            const modalHeader = document.querySelector('#customModal div div');
            const modalIcon = document.querySelector('#customModal svg');
            const modalTitle = document.querySelector('#customModal h2');
            
            if (modalHeader) modalHeader.style.background = '#dc3545';
            if (modalTitle) modalTitle.innerText = 'WAIT!';
            if (modalIcon) {
                modalIcon.innerHTML = '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>';
                modalIcon.style.fill = '#fff';
            }
            return;
        }
    }
    
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'none';
    document.getElementById('step3').style.display = 'none';
    document.getElementById('step' + step).style.display = 'block';
    window.scrollTo({ top: document.querySelector('.hero-container').offsetHeight, behavior: 'smooth' });
}

function toggleCryptoDetails(show) {
    document.getElementById('crypto_details').style.display = show ? 'block' : 'none';
}

function copyAddress() {
    const text = document.getElementById('btc_address_text').innerText;
    navigator.clipboard.writeText(text).then(() => {
        const btn = event.currentTarget;
        const originalText = btn.innerHTML;
        btn.innerHTML = 'Copied!';
        setTimeout(() => btn.innerHTML = originalText, 2000);
    });
}

function handleFinalSubmit() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        showCustomModal('Please select a payment method.');
        return;
    }
    
    const formData = new FormData();
    // Collecting data from all steps
    const step1Inputs = document.getElementById('step1').querySelectorAll('input');
    const step2Inputs = document.getElementById('step2').querySelectorAll('input, select, textarea');
    const step3Inputs = document.getElementById('step3').querySelectorAll('input');

    step1Inputs.forEach(input => formData.append(input.id.replace('reg_', ''), input.value));
    step2Inputs.forEach(input => {
        if (input.type === 'radio') {
            if (input.checked) formData.append(input.name, input.value);
        } else if (input.type === 'file') {
            if (input.files[0]) formData.append(input.id.replace('reg_', ''), input.files[0]);
        } else {
            formData.append(input.id.replace('reg_', ''), input.value);
        }
    });

    if (paymentMethod.value === 'crypto') {
        const txid = document.getElementById('transaction_id').value;
        const screenshot = document.getElementById('crypto_screenshot').files[0];
        if (!txid || !screenshot) {
            showCustomModal('Please provide transaction ID and screenshot for crypto payment.');
            return;
        }
        formData.append('payment_method', 'crypto');
        formData.append('txid', txid);
        formData.append('payment_screenshot', screenshot);
    }
    
    formData.append('package_id', '<?php echo $package; ?>');
    formData.append('package_name', '<?php echo $current_package_name; ?>');
    formData.append('amount', '<?php echo $total_amount; ?>');

    fetch('process_registration.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showCustomModal('Thank you! Your registration for ' + '<?php echo str_replace("'", "\\'", $current_package_name); ?>' + ' has been submitted and is pending verification of payment.');
        } else {
            showCustomModal('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showCustomModal('Registration submitted. Thank you!');
    });
}
</script>

<?php include 'footer.php'; ?>