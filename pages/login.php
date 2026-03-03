<?php
// pages/login.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 
?>

<style>
    /* 1. DEEP SPACE BACKGROUND */
    body {
        background-color: #000;
        /* Subtle grid background for a "Tech" feel */
        background-image: 
            linear-gradient(rgba(0, 243, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 243, 255, 0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .login-wrapper {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        position: relative;
    }

    /* 2. THE LOGIN CARD (Matches Stocks Panel) */
    .login-panel {
        background: #050505;
        border: 1px solid #222;
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 420px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 0 60px rgba(0,0,0,0.9);
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* The Signature Blue Laser Top */
    .login-panel::after {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 3px;
        background: linear-gradient(90deg, #000, #00f3ff, #000);
        box-shadow: 0 0 20px #00f3ff;
    }

    /* 3. INPUT FIELDS (High Contrast) */
    .input-label {
        font-size: 0.7rem; color: #666; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px; display: block;
    }

    .input-group-custom {
        position: relative; margin-bottom: 20px;
    }

    .form-control-dark {
        background: #000;
        border: 1px solid #333;
        color: #fff;
        padding: 14px 15px 14px 45px; /* Space for icon */
        border-radius: 8px;
        font-size: 0.95rem;
        width: 100%;
        transition: 0.3s;
    }

    .form-control-dark:focus {
        outline: none;
        border-color: #00f3ff;
        box-shadow: 0 0 15px rgba(0, 243, 255, 0.15);
    }

    .input-icon {
        position: absolute; left: 15px; top: 16px; color: #555; font-size: 1rem; transition: 0.3s;
    }
    .form-control-dark:focus + .input-icon { color: #00f3ff; }

    /* 4. BUTTONS */
    .btn-login {
        width: 100%;
        background: transparent;
        border: 1px solid #00f3ff;
        color: #00f3ff;
        padding: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 8px;
        transition: 0.3s;
        margin-top: 10px;
    }
    .btn-login:hover {
        background: #00f3ff; color: #000; box-shadow: 0 0 25px rgba(0, 243, 255, 0.5);
    }

    .btn-social {
        width: 100%; background: #111; border: 1px solid #333; color: #ccc;
        padding: 10px; border-radius: 8px; font-size: 0.9rem;
        display: flex; align-items: center; justify-content: center; gap: 10px;
        text-decoration: none; transition: 0.3s; margin-bottom: 10px;
    }
    .btn-social:hover { background: #222; color: #fff; border-color: #555; }

    /* 5. SYSTEM STATUS BADGE */
    .system-status {
        position: absolute; bottom: 20px; right: 20px;
        font-size: 0.7rem; color: #444; text-transform: uppercase; letter-spacing: 1px;
    }
    .blink-dot {
        height: 6px; width: 6px; background-color: #00ff88; border-radius: 50%; display: inline-block; margin-right: 5px;
        box-shadow: 0 0 5px #00ff88; animation: blink 2s infinite;
    }
    @keyframes blink { 50% { opacity: 0.3; } }

</style>

<div class="login-wrapper">
    <div class="login-panel">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white mb-1" style="font-family: 'Space Grotesk', sans-serif; letter-spacing: -1px;">
                CRYPTO<span style="color:#00f3ff">PRO</span>
            </h2>
            <p class="text-secondary small">Authorized Personnel Only</p>
        </div>

        <form>
            <label class="input-label">Client Access ID</label>
            <div class="input-group-custom">
                <input type="email" class="form-control-dark" placeholder="Enter ID or Email">
                <i class="fas fa-user-shield input-icon"></i>
            </div>

            <label class="input-label">Security Key</label>
            <div class="input-group-custom">
                <input type="password" id="passInput" class="form-control-dark" placeholder="••••••••">
                <i class="fas fa-key input-icon"></i>
                <i class="fas fa-eye text-secondary" onclick="togglePass()" style="position:absolute; right:15px; top:16px; cursor:pointer;"></i>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4 text-secondary small">
                <div class="form-check">
                    <input class="form-check-input bg-dark border-secondary" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Keep Session Active</label>
                </div>
                <a href="#" class="text-info text-decoration-none">Lost Key?</a>
            </div>

            <button type="button" class="btn-login">Authenticate</button>
        </form>

        <div class="text-center text-secondary small my-4 position-relative">
            <span style="background:#050505; padding:0 10px; position:relative; z-index:1;">OR CONNECT WITH</span>
            <hr style="position:absolute; top:5px; width:100%; border-color:#222; z-index:0; margin:0;">
        </div>

        <a href="#" class="btn-social">
            <i class="fab fa-google"></i> Google Account
        </a>

        <div class="text-center mt-4">
            <span class="text-secondary small">No Access? </span>
            <a href="register.php" class="text-white fw-bold text-decoration-none ms-1">Apply for Membership</a>
        </div>

    </div>

    <div class="system-status">
        <span class="blink-dot"></span> System Operational
    </div>
</div>

<script>
    function togglePass() {
        let input = document.getElementById("passInput");
        input.type = input.type === "password" ? "text" : "password";
    }
</script>

<?php require_once '../includes/footer.php'; ?>