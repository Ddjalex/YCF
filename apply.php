<?php
require_once 'functions.php';
include 'header.php';
?>

<section style="padding: 8rem 10% 4rem; background: #f8fbff;">
    <div style="max-width: 800px; margin: 0 auto; background: white; padding: 4rem; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.05);">
        <h1 style="color: var(--dark-blue); font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Apply for the 2026 Fellowship</h1>
        <p style="color: #666; margin-bottom: 3rem; font-size: 1.1rem;">Please complete the form below. Selected fellows will receive a full scholarship for the 4-day intensive forum in Berlin.</p>

        <form action="#" method="POST" style="display: grid; gap: 2rem;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--dark-blue);">Full Name</label>
                    <input type="text" required style="width: 100%; padding: 0.8rem; border: 1.5px solid #eee; border-radius: 8px; outline: none; transition: border-color 0.3s;" onfocus="this.style.borderColor='#00aeef'">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--dark-blue);">Age</label>
                    <input type="number" required min="18" max="35" style="width: 100%; padding: 0.8rem; border: 1.5px solid #eee; border-radius: 8px;">
                </div>
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--dark-blue);">Technical Impact</label>
                <p style="font-size: 0.85rem; color: #888; margin-bottom: 0.5rem;">Describe a blockchain project you are working on. How does it solve a real-world problem?</p>
                <textarea required rows="4" style="width: 100%; padding: 0.8rem; border: 1.5px solid #eee; border-radius: 8px;"></textarea>
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--dark-blue);">Leadership Vision</label>
                <p style="font-size: 0.85rem; color: #888; margin-bottom: 0.5rem;">The crypto space is often polarized. How would you use 'Collective Leadership' to bridge the gap between regulators and developers?</p>
                <textarea required rows="4" style="width: 100%; padding: 0.8rem; border: 1.5px solid #eee; border-radius: 8px;"></textarea>
            </div>

            <div style="background: #fcfcfc; padding: 1.5rem; border-radius: 10px; border: 1px dashed #ddd;">
                <label style="display: flex; align-items: center; gap: 1rem; cursor: pointer;">
                    <input type="checkbox" required style="width: 20px; height: 20px;">
                    <span style="font-size: 0.95rem; color: #444;">I confirm availability for the intensive 4-day Forum in Berlin (June 2026).</span>
                </label>
            </div>

            <button type="submit" style="background: #00aeef; color: white; border: none; padding: 1.2rem; border-radius: 8px; font-weight: 800; font-size: 1.1rem; cursor: pointer; transition: background 0.3s;" onmouseover="this.style.background='#008dbf'" onmouseout="this.style.background='#00aeef'">Submit Application</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>