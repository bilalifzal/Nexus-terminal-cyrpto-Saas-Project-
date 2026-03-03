<?php
// pages/register.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 
?>

<style>
    /* REUSING THE LOGIN THEME FOR CONSISTENCY */
    body {
        background-color: #000;
        background-image: radial-gradient(circle at 50% 0%, rgba(0, 243, 255, 0.15) 0%, transparent 50%);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .register-container {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }

    .glass-card {
        background: rgba(10, 10, 10, 0.8);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 40px 50px;
        width: 100%;
        max-width: 500px; /* Slightly wider than login */
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 80px rgba(0, 0, 0, 0.8);
        animation: floatUp 0.8s ease-out;
    }

    @keyframes floatUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Top Neon Line */
    .glass-card::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 2px;
        background: linear-gradient(90deg, transparent, #00f3ff, transparent);
        box-shadow: 0 0 15px #00f3ff;
    }

    /* INPUTS */
    .form-group { margin-bottom: 20px; position: relative; }
    
    .form-label {
        font-size: 0.7rem; color: #888; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; display: block; font-weight: 600;
    }

    .custom-input {
        width: 100%;
        background: #050505;
        border: 1px solid #333;
        color: #fff;
        padding: 12px 15px;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: 0.3s;
    }

    .custom-input:focus {
        outline: none; border-color: #00f3ff; background: #000;
        box-shadow: 0 0 15px rgba(0, 243, 255, 0.15);
    }

    /* PASSWORD STRENGTH BAR */
    .strength-meter {
        height: 4px;
        background: #222;
        margin-top: 8px;
        border-radius: 2px;
        overflow: hidden;
        transition: 0.3s;
    }
    .strength-fill {
        height: 100%; width: 0%; transition: width 0.3s, background 0.3s;
    }

    /* BUTTON */
    .btn-neon {
        width: 100%; background: transparent; border: 1px solid #00f3ff; color: #00f3ff;
        padding: 15px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;
        border-radius: 8px; transition: 0.3s; margin-top: 20px;
    }
    .btn-neon:hover {
        background: #00f3ff; color: #000; box-shadow: 0 0 30px rgba(0, 243, 255, 0.4); transform: translateY(-2px);
    }

    .brand-glow { font-family: 'Space Grotesk', sans-serif; font-weight: 700; letter-spacing: -1px; color: #fff; font-size: 1.8rem; margin-bottom: 5px; }
    .brand-dot { color: #00f3ff; text-shadow: 0 0 10px #00f3ff; }

</style>

<div class="register-container">
    <div class="glass-card">
        
        <div class="text-center mb-4">
            <div class="brand-glow">Crypto<span class="brand-dot">Pro</span></div>
            <p class="text-secondary small">Create Your Trading Portfolio</p>
        </div>

        <form>
            <div class="row g-3">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label">First Name</label>
                        <input type="text" class="custom-input" placeholder="Muhammad">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="custom-input" placeholder="Bilal">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" class="custom-input" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label class="form-label">Choose Password</label>
                <input type="password" id="regPass" class="custom-input" placeholder="••••••••" oninput="checkStrength()">
                
                <div class="strength-meter">
                    <div id="strengthBar" class="strength-fill"></div>
                </div>
                <small id="strengthText" class="text-secondary" style="font-size: 0.7rem;">Password Strength</small>
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="custom-input" placeholder="••••••••">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input bg-dark border-secondary" type="checkbox" id="termsCheck">
                <label class="form-check-label text-secondary small" for="termsCheck">
                    I agree to the <a href="#" class="text-info text-decoration-none">Terms of Service</a> & Privacy Policy.
                </label>
            </div>

            <button type="button" class="btn-neon">Create Account</button>

            <div class="text-center mt-4">
                <span class="text-secondary small">Already a member? </span>
                <a href="login.php" class="text-white fw-bold text-decoration-none ms-1">Login Here</a>
            </div>
        </form>
    </div>
</div>

<script>
    function checkStrength() {
        let val = document.getElementById('regPass').value;
        let bar = document.getElementById('strengthBar');
        let text = document.getElementById('strengthText');
        
        let strength = 0;
        if(val.length > 5) strength += 20;
        if(val.length > 8) strength += 20;
        if(/[A-Z]/.test(val)) strength += 20;
        if(/[0-9]/.test(val)) strength += 20;
        if(/[^A-Za-z0-9]/.test(val)) strength += 20;

        bar.style.width = strength + '%';

        if(strength < 40) {
            bar.style.background = '#ff4d4d'; // Red
            text.innerText = "Weak"; text.style.color = '#ff4d4d';
        } else if (strength < 80) {
            bar.style.background = '#f1c40f'; // Yellow
            text.innerText = "Medium"; text.style.color = '#f1c40f';
        } else {
            bar.style.background = '#00ff88'; // Green
            text.innerText = "Strong"; text.style.color = '#00ff88';
        }
    }
</script>

<?php require_once '../includes/footer.php'; ?>