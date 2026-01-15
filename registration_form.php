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

        <form id="multi-step-form">
            <!-- Step 1: Basic Details -->
            <div id="step-1" class="form-step">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px;">Basic Details</h3>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Name (As per passport) <span style="color: #d9534f;">(Required)</span></label>
                        <input type="text" name="first_name" placeholder="First" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                    </div>
                    <div>
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">&nbsp;</label>
                        <input type="text" name="last_name" placeholder="Last" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Nationality <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="nationality" placeholder="e.g USA, UK, UAE" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Email <span style="color: #d9534f;">(Required)</span></label>
                    <input type="email" name="email" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                </div>

                <button type="button" onclick="nextStep(2)" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;">Next</button>
            </div>

            <!-- Step 2: Personal Details and Motivation -->
            <div id="step-2" class="form-step" style="display: none;">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px;">Personal Details and Motivation</h3>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Gender <span style="color: #d9534f;">(Required)</span></label>
                    <select name="gender" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Date of Birth <span style="color: #d9534f;">(Required)</span></label>
                    <input type="date" name="dob" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Phone No (with Country Code) <span style="color: #d9534f;">(Required)</span></label>
                    <input type="tel" name="phone" placeholder="+1..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                    <span style="font-size: 0.75rem; color: #888;">Please input a valid international phone number</span>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Profession <span style="color: #d9534f;">(Required)</span></label>
                    <input type="text" name="profession" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; outline: none;" required>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="button" onclick="nextStep(1)" style="background: #eee; color: #333; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;">Previous</button>
                    <button type="button" onclick="nextStep(3)" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;">Next</button>
                </div>
            </div>

            <!-- Step 3: Review and Payment -->
            <div id="step-3" class="form-step" style="display: none;">
                <h3 class="montserrat" style="font-size: 1.4rem; margin-bottom: 25px;">Review and Payment</h3>
                
                <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; margin-bottom: 30px; border: 1px solid #eee;">
                    <h4 class="montserrat" style="margin-bottom: 15px; font-size: 1rem;">Order Summary</h4>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                        <span>Package:</span>
                        <span style="font-weight: 700;"><?php echo $package_name; ?></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.9rem;">
                        <span>Application Fee:</span>
                        <span style="font-weight: 700;">$<?php echo number_format($price, 2); ?></span>
                    </div>
                    <div style="border-top: 1px solid #ddd; padding-top: 10px; margin-top: 10px; display: flex; justify-content: space-between; font-weight: 800; font-size: 1.1rem; color: #2D236E;">
                        <span>Total:</span>
                        <span>$<?php echo number_format($price, 2); ?></span>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="button" onclick="nextStep(2)" style="background: #eee; color: #333; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;">Previous</button>
                    <button type="submit" class="btn-custom-animate" style="background: #2D236E; color: white; padding: 12px 40px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;">Pay Now</button>
                </div>
            </div>
        </form>
    </div>

    <script>
    function nextStep(step) {
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
        alert('Form submitted! Redirecting to payment...');
        // In a real app, you would send data to server here
    });
    </script>
    <?php
}
