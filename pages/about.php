<?php
// pages/about.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 
?>

<style>
    /* 1. DEVELOPER HERO SECTION (Now at the top) */
    .dev-hero-wrapper {
        padding-top: 120px; /* Space for Navbar */
        padding-bottom: 80px;
        background: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2000&auto=format&fit=crop') no-repeat center center/cover;
        position: relative;
    }
    .dev-hero-wrapper::before {
        content: ''; position: absolute; top:0; left:0; width:100%; height:100%;
        background: linear-gradient(180deg, rgba(0,0,0,0.8) 0%, #000 100%);
        backdrop-filter: blur(5px);
    }
    
    .dev-showcase {
        background: rgba(8, 8, 8, 0.9);
        border: 1px solid rgba(255,255,255,0.1);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        overflow: hidden;
        position: relative;
        z-index: 5;
        box-shadow: 0 0 50px rgba(0,0,0,0.5);
    }
    
    .dev-image-side {
        height: 100%; min-height: 500px;
        background: url('https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=1000&auto=format&fit=crop') no-repeat center center/cover;
        position: relative;
    }
    .dev-image-side::after {
        content: ''; position: absolute; top:0; left:0; width:100%; height:100%;
        background: linear-gradient(90deg, rgba(8,8,8,0.9) 0%, rgba(8,8,8,0) 100%);
    }

    /* TYPING TEXT */
    .typing-wrapper {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 3.5rem; font-weight: 800;
        background: linear-gradient(90deg, #fff, #00f3ff);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        line-height: 1.1; min-height: 80px; margin-bottom: 10px;
    }
    .cursor-blink {
        display: inline-block; width: 4px; height: 50px; background: #00f3ff;
        margin-left: 10px; animation: blink 1s infinite; vertical-align: middle;
    }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

    /* BUTTONS */
    .btn-glow-primary {
        background: #00f3ff; color: #000; padding: 15px 35px; border-radius: 50px; font-weight: 700;
        text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s;
        box-shadow: 0 0 20px rgba(0, 243, 255, 0.3);
    }
    .btn-glow-primary:hover {
        background: #fff; color: #000; transform: scale(1.05); box-shadow: 0 0 40px rgba(0, 243, 255, 0.6);
    }
    .btn-glow-outline {
        border: 2px solid #333; color: #fff; padding: 13px 35px; border-radius: 50px; font-weight: 700;
        text-decoration: none; display: inline-flex; align-items: center; gap: 10px; transition: 0.3s;
    }
    .btn-glow-outline:hover { border-color: #fff; background: #fff; color: #000; }

    /* 2. PROJECT INFO SECTION (Moved Down) */
    .project-info {
        padding: 80px 0; background: #000; border-top: 1px solid #111;
    }
    
    /* GLASS CARDS */
    .glass-feature {
        background: #080808; border: 1px solid #222; padding: 40px 30px;
        border-radius: 20px; transition: 0.4s; height: 100%;
    }
    .glass-feature:hover {
        border-color: #00f3ff; transform: translateY(-10px);
    }

    /* STATS STRIP */
    .stats-strip {
        background: #050505; border-top: 1px solid #222; border-bottom: 1px solid #222;
        padding: 40px 0; margin-bottom: 80px;
    }

</style>

<div class="dev-hero-wrapper">
    <div class="container">
        
        <div class="dev-showcase" data-aos="zoom-in">
            <div class="row g-0">
                
                <div class="col-lg-7 p-5 d-flex flex-column justify-content-center">
                    <div class="mb-3">
                        <span class="badge bg-black border border-info text-info px-3 py-2 rounded-pill letter-spacing-1">
                            <i class="fas fa-code me-2"></i> ARCHITECT & LEAD ENGINEER
                        </span>
                    </div>
                    
                    <div class="typing-wrapper">
                        <span id="devName"></span><span class="cursor-blink"></span>
                    </div>

                    <p class="text-white fs-4 mt-2 mb-4 fw-bold">
                        Full Stack Developer | Crypto Analyst
                    </p>
                    
                    <p class="text-secondary mb-5" style="line-height: 1.8; font-size: 1.1rem;">
                        "I built CryptoPro to push the boundaries of what a web portfolio can be. 
                        This isn't just a template; it's a fully functional application simulating real-world 
                        financial environments. Every pixel and every function was crafted with passion."
                    </p>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="https://wa.me/923000000000" target="_blank" class="btn-glow-primary">
                            <i class="fab fa-whatsapp fa-lg"></i> Chat with Dev
                        </a>
                        <a href="https://linkedin.com/in/yourprofile" target="_blank" class="btn-glow-outline">
                            <i class="fab fa-linkedin-in fa-lg"></i> LinkedIn
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 d-none d-lg-block">
                    <div class="dev-image-side"></div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="stats-strip">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 border-end border-secondary border-opacity-25">
                <h3 class="text-white fw-bold m-0">99.9%</h3>
                <small class="text-secondary text-uppercase">Uptime</small>
            </div>
            <div class="col-md-3 border-end border-secondary border-opacity-25">
                <h3 class="text-white fw-bold m-0">50ms</h3>
                <small class="text-secondary text-uppercase">Latency</small>
            </div>
            <div class="col-md-3 border-end border-secondary border-opacity-25">
                <h3 class="text-white fw-bold m-0">256-Bit</h3>
                <small class="text-secondary text-uppercase">Encryption</small>
            </div>
            <div class="col-md-3">
                <h3 class="text-white fw-bold m-0">10M+</h3>
                <small class="text-secondary text-uppercase">Data Points</small>
            </div>
        </div>
    </div>
</div>

<div class="project-info">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h6 class="text-info fw-bold letter-spacing-1 text-uppercase mb-3">About The Project</h6>
                <h2 class="display-4 fw-bold text-white mb-4">Global Market <br>Intelligence.</h2>
                <p class="text-secondary lead mb-4">
                    CryptoPro is the bridge between institutional-grade data and retail agility. 
                    We process live WebSocket feeds to give you a real-time edge 
                    in Crypto, Forex, and Stock markets.
                </p>
                <div class="mt-4 d-flex align-items-center gap-4">
                    <div class="text-white"><i class="fas fa-check-circle text-info me-2"></i> Open Source Ethos</div>
                    <div class="text-white"><i class="fas fa-check-circle text-info me-2"></i> Privacy First</div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left">
                <div class="p-5 rounded-4 border border-secondary border-opacity-25" style="background: linear-gradient(45deg, #050505, #111);">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="text-white fw-bold">Live Data Feed</span>
                        <div class="spinner-grow text-success spinner-grow-sm"></div>
                    </div>
                    <div style="font-family: monospace; color: #00f3ff;">
                        > Connecting to WebSocket... <span class="text-success">OK</span><br>
                        > Decrypting Stream... <span class="text-success">OK</span><br>
                        > Rendering Charts... <span class="text-success">OK</span><br>
                        > AI Sentiment Analysis... <span class="text-warning">PROCESSING</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mt-5">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="glass-feature text-center">
                    <i class="fas fa-layer-group fa-3x text-warning mb-4"></i>
                    <h4 class="text-white fw-bold">Full Stack Logic</h4>
                    <p class="text-secondary">Custom PHP 8.2 backend architecture handling complex routing.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="glass-feature text-center">
                    <i class="fas fa-code fa-3x text-success mb-4"></i>
                    <h4 class="text-white fw-bold">Clean Code</h4>
                    <p class="text-secondary">Modular, documented, and scalable codebase built to standards.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="glass-feature text-center">
                    <i class="fas fa-mobile-alt fa-3x text-info mb-4"></i>
                    <h4 class="text-white fw-bold">Adaptive UI</h4>
                    <p class="text-secondary">Responsive Glassmorphism interface for any screen size.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5" style="background: #050505; border-top: 1px solid #111;">
    <div class="container text-center">
        <p class="text-secondary small text-uppercase mb-4">Technologies Deployed</p>
        <div class="d-flex justify-content-center gap-5 flex-wrap opacity-50">
            <i class="fab fa-php fa-3x text-white"></i>
            <i class="fab fa-html5 fa-3x text-white"></i>
            <i class="fab fa-css3-alt fa-3x text-white"></i>
            <i class="fab fa-js fa-3x text-white"></i>
            <i class="fab fa-bootstrap fa-3x text-white"></i>
            <i class="fas fa-database fa-3x text-white"></i>
        </div>
    </div>
</div>

<script>
    const nameText = "Muhammad Bilal Ifzal";
    const el = document.getElementById("devName");
    let i = 0;
    let isDeleting = false;

    function loopTyping() {
        const current = nameText.substring(0, i);
        el.innerText = current;

        if (!isDeleting && i < nameText.length) {
            i++;
            setTimeout(loopTyping, 100); 
        } else if (isDeleting && i > 0) {
            i--;
            setTimeout(loopTyping, 50); 
        } else {
            isDeleting = !isDeleting;
            setTimeout(loopTyping, isDeleting ? 2000 : 500);
        }
    }

    // Start
    document.addEventListener('DOMContentLoaded', loopTyping);
</script>

<?php require_once '../includes/footer.php'; ?>