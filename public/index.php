<?php
// public/index.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 
?>

<style>
    /* ========================================= */
    /* 1. GLOBAL & ANIMATIONS                    */
    /* ========================================= */
    :root {
        --neon-blue: #00f3ff;
        --neon-gold: #ffd700;
        --glass-bg: rgba(10, 10, 10, 0.9);
    }
    body { background: #000; overflow-x: hidden; }

    /* ========================================= */
    /* 2. TICKER TAPE                            */
    /* ========================================= */
    .ticker-tape {
        background: #000; border-bottom: 1px solid #222; color: #fff;
        font-family: 'Space Grotesk', sans-serif; font-weight: 700; font-size: 0.9rem;
        padding: 10px 0; overflow: hidden; white-space: nowrap; position: relative; z-index: 50;
    }
    .ticker-content { display: inline-block; animation: scroll-left 40s linear infinite; }
    .ticker-item { margin: 0 30px; }
    .ticker-up { color: #00ff88; }
    .ticker-down { color: #ff4d4d; }
    @keyframes scroll-left { 0% { transform: translateX(0); } 100% { transform: translateX(-100%); } }

    /* ========================================= */
    /* 3. HERO SECTION                           */
    /* ========================================= */
    .hero-section {
        position: relative; padding: 120px 0;
        background: #000; overflow: hidden; min-height: 85vh;
        display: flex; align-items: center;
    }
    .hero-grid {
        position: absolute; width: 200%; height: 200%; top: -50%; left: -50%;
        background-image: 
            linear-gradient(rgba(0, 243, 255, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 243, 255, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        transform: perspective(500px) rotateX(60deg);
        animation: gridMove 20s linear infinite; z-index: 0;
    }
    @keyframes gridMove { 0% { transform: perspective(500px) rotateX(60deg) translateY(0); } 100% { transform: perspective(500px) rotateX(60deg) translateY(50px); } }

    /* TYPING ANIMATION */
    .typing-wrapper {
        font-family: 'Space Grotesk', sans-serif; font-size: 3rem; font-weight: 800; color: #fff;
        margin-bottom: 20px; min-height: 80px; line-height: 1.1;
    }
    .typing-highlight {
        color: var(--neon-blue);
        text-shadow: 0 0 25px rgba(0, 243, 255, 0.6);
    }
    .cursor-blink {
        display: inline-block; width: 4px; height: 50px; background: var(--neon-blue);
        margin-left: 10px; animation: blink 1s infinite; vertical-align: sub;
    }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

    /* RIGHT SIDE: HOLOGRAPHIC SERVER NODE */
    .holo-card {
        background: rgba(10, 10, 10, 0.6); border: 1px solid #333; border-radius: 15px;
        padding: 30px; position: relative; backdrop-filter: blur(10px);
        box-shadow: 0 0 40px rgba(0, 243, 255, 0.05);
        transform-style: preserve-3d; animation: floatCard 6s ease-in-out infinite;
    }
    .holo-circle-outer {
        width: 220px; height: 220px; border: 2px dashed #333; border-radius: 50%;
        margin: 0 auto; display: flex; align-items: center; justify-content: center;
        animation: spinSlow 20s linear infinite;
    }
    .holo-circle-inner {
        width: 160px; height: 160px; border: 2px solid var(--neon-blue); border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 0 20px rgba(0, 243, 255, 0.3);
        animation: pulse 2s infinite;
    }
    @keyframes floatCard { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-20px); } }
    @keyframes spinSlow { 100% { transform: rotate(360deg); } }
    @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(0, 243, 255, 0.4); } 70% { box-shadow: 0 0 0 20px rgba(0, 243, 255, 0); } 100% { box-shadow: 0 0 0 0 rgba(0, 243, 255, 0); } }

    /* ========================================= */
    /* 4. DASHBOARD CARDS                        */
    /* ========================================= */
    .dash-card {
        background: #080808; border: 1px solid #222; border-radius: 12px;
        overflow: hidden; height: 100%; transition: 0.3s; position: relative;
    }
    .dash-card:hover { border-color: var(--neon-blue); transform: translateY(-5px); }
    .dash-header {
        background: rgba(255,255,255,0.03); padding: 15px 20px;
        border-bottom: 1px solid #222; display: flex; justify-content: space-between; align-items: center;
    }
    .dash-table { width: 100%; color: #fff; font-size: 0.9rem; }
    .dash-table td { padding: 12px 20px; border-bottom: 1px solid #1a1a1a; }
    .sparkline { height: 4px; width: 100%; background: #222; position: relative; overflow: hidden; }
    .sparkline-fill { height: 100%; background: var(--neon-gold); width: 60%; box-shadow: 0 0 10px var(--neon-gold); }
    .mini-convert-box { background: linear-gradient(145deg, #0a0a0a, #000); padding: 25px; border-radius: 12px; border: 1px solid #333; }
    .mini-input { background: #000; border: 1px solid #333; color: #fff; padding: 10px; border-radius: 6px; width: 100%; }

    /* ========================================= */
    /* 5. NEW: DISCLAIMER & FEATURES SECTIONS    */
    /* ========================================= */
    .feature-icon-box {
        width: 60px; height: 60px; background: #111; border: 1px solid #333; border-radius: 12px;
        display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--neon-blue);
        margin-bottom: 20px; transition: 0.3s;
    }
    .feature-card:hover .feature-icon-box { background: var(--neon-blue); color: #000; box-shadow: 0 0 20px rgba(0, 243, 255, 0.4); }
    
    .disclaimer-strip {
        background: linear-gradient(90deg, #1a1500 0%, #000 100%);
        border-left: 4px solid var(--neon-gold);
        padding: 40px; border-radius: 8px; border: 1px solid #333;
    }

    .metrics-section { padding: 80px 0; border-top: 1px solid #111; border-bottom: 1px solid #111; background: #050505; }
    .progress-dark { height: 6px; background: #222; border-radius: 10px; overflow: hidden; margin-top: 10px; }
    .progress-bar-neon { height: 100%; background: var(--neon-blue); box-shadow: 0 0 10px var(--neon-blue); width: 0; transition: 1.5s; }
</style>

<div class="ticker-tape">
    <div class="ticker-content">
        <span class="ticker-item">BTC $52,140 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">ETH $2,950 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">SOL $112.50 <span class="ticker-down">▼</span></span>
        <span class="ticker-item">GOLD $2,035 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">USD/PKR 278.50 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">TSLA $198.20 <span class="ticker-down">▼</span></span>
        <span class="ticker-item">AAPL $182.50 <span class="ticker-down">▼</span></span>
    </div>
</div>

<div class="hero-section">
    <div class="hero-grid"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            
            <div class="col-lg-7" data-aos="fade-right">
               

                <h1 class="display-3 fw-bold text-white mb-2" style="letter-spacing: -2px;">
                     NEXUS <span style="color:#00f3ff">TERMINAL</span>
                </h1>

                <div class="typing-wrapper">
                    Architected by <br>
                    <span id="heroDevName" class="typing-highlight"></span><span class="cursor-blink"></span>
                </div>
                
                <p class="text-secondary lead mb-5" style="max-width: 90%; line-height: 1.8; font-size: 1.2rem;">
                    The world's most advanced financial visualization terminal. 
                    Merging <strong>Institutional Data Streams</strong> with <strong>AI-Driven Analytics</strong>.
                    <br><span class="text-white small fw-bold">Built by Muhammad Bilal Ifzal.</span>
                </p>

                <div class="d-flex gap-3" id="mnbtn">
                    <a href="../pages/crypto.php" class="btn btn-lg btn-info rounded-pill px-5 fw-bold" style="background: var(--neon-blue); border:none; color:#000;">
                        <i class="fab fa-bitcoin me-2"></i> Live Rates
                    </a>
                    <a href="../pages/about.php" class="btn btn-lg btn-outline-light rounded-pill px-5 fw-bold">
                        <i class="fas fa-code me-2"></i> Developer
                    </a>
                </div>
            </div>
<style>
    @media screen and (max-width:500px) {
        #mnbtn{
            flex-direction:column;

        }
        #mnbtn button{
            width:100%;
            margin-top:3px;
        }
    }
</style>
            <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left">
                <div class="holo-card text-center">
                    <div class="d-flex justify-content-between mb-4 border-bottom border-secondary border-opacity-25 pb-3">
                        <span class="text-white fw-bold small">System Status</span>
                        <span class="text-success fw-bold small">● CONNECTED</span>
                    </div>

                    <div class="holo-circle-outer">
                        <div class="holo-circle-inner">
                            <i class="fas fa-network-wired fa-3x text-info"></i>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="row text-center">
                            <div class="col-4 border-end border-secondary border-opacity-25">
                                <h4 class="text-white fw-bold mb-0">12ms</h4>
                                <small class="text-secondary small">Ping</small>
                            </div>
                            <div class="col-4 border-end border-secondary border-opacity-25">
                                <h4 class="text-white fw-bold mb-0">5K+</h4>
                                <small class="text-secondary small">Assets</small>
                            </div>
                            <div class="col-4">
                                <h4 class="text-white fw-bold mb-0">SSL</h4>
                                <small class="text-secondary small">Encrypted</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container mb-5" style="margin-top: -60px; position: relative; z-index: 5;">
    <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="dash-card">
                <div class="dash-header">
                    <span class="text-white fw-bold"><i class="fab fa-bitcoin text-warning me-2"></i>Live Crypto</span>
                    <span class="badge bg-success bg-opacity-25 text-success">Active</span>
                </div>
                <table class="dash-table">
                    <tr><td>Bitcoin <small class="text-secondary">BTC</small></td><td class="text-end">$52,140</td><td class="text-end text-success">+2.4%</td></tr>
                    <tr><td>Ethereum <small class="text-secondary">ETH</small></td><td class="text-end">$2,950</td><td class="text-end text-success">+1.8%</td></tr>
                    <tr><td>Solana <small class="text-secondary">SOL</small></td><td class="text-end">$112.50</td><td class="text-end text-danger">-0.5%</td></tr>
                </table>
                <div class="sparkline"><div class="sparkline-fill" style="width: 75%;"></div></div>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="dash-card">
                <div class="dash-header">
                    <span class="text-white fw-bold"><i class="fas fa-chart-line text-info me-2"></i>Global Equities</span>
                    <span class="badge bg-success bg-opacity-25 text-success">Open</span>
                </div>
                <table class="dash-table">
                    <tr><td>NVIDIA <small class="text-secondary">NVDA</small></td><td class="text-end">$785.30</td><td class="text-end text-success">+3.4%</td></tr>
                    <tr><td>Tesla <small class="text-secondary">TSLA</small></td><td class="text-end">$198.20</td><td class="text-end text-success">+1.2%</td></tr>
                    <tr><td>Apple <small class="text-secondary">AAPL</small></td><td class="text-end">$182.50</td><td class="text-end text-danger">-0.2%</td></tr>
                </table>
                <div class="sparkline"><div class="sparkline-fill" style="width: 45%; background: #00ff88;"></div></div>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="dash-card">
                <div class="dash-header">
                    <span class="text-white fw-bold"><i class="fas fa-coins text-light me-2"></i>Fiat Converter</span>
                </div>
                <div class="p-4 d-flex flex-column justify-content-center h-75">
                    <div class="mini-convert-box">
                        <div class="d-flex gap-2 mb-3">
                            <input type="number" class="mini-input" value="1">
                            <select class="mini-input" style="width: auto;"><option>USD</option></select>
                        </div>
                        <div class="text-center text-secondary mb-3"><i class="fas fa-arrow-down"></i></div>
                        <div class="d-flex gap-2 mb-3">
                            <input type="text" class="mini-input" value="278.50" readonly>
                            <select class="mini-input" style="width: auto;"><option>PKR</option></select>
                        </div>
                        <button class="btn btn-info w-100 fw-bold" onclick="window.location.href='../pages/converter.php'">Open Tool</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold text-white">PLATFORM <span style="color:var(--neon-blue)">ARCHITECTURE</span></h2>
        <p class="text-secondary">Engineered for precision, speed, and reliability.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100 feature-card">
                <div class="feature-icon-box"><i class="fas fa-bolt"></i></div>
                <h5 class="text-white fw-bold">Zero Latency</h5>
                <p class="text-secondary small mb-0">Direct WebSocket feeds ensure prices are updated in real-time without page refreshes.</p>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100 feature-card">
                <div class="feature-icon-box"><i class="fas fa-globe"></i></div>
                <h5 class="text-white fw-bold">Global Data</h5>
                <p class="text-secondary small mb-0">Aggregating data from 50+ exchanges including Binance, NYSE, and Forex feeds.</p>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100 feature-card">
                <div class="feature-icon-box"><i class="fas fa-robot"></i></div>
                <h5 class="text-white fw-bold">AI Analytics</h5>
                <p class="text-secondary small mb-0">Integrated AI algorithms analyze market sentiment and Fear & Greed indices.</p>
            </div>
        </div>
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100 feature-card">
                <div class="feature-icon-box"><i class="fas fa-shield-alt"></i></div>
                <h5 class="text-white fw-bold">Secure Core</h5>
                <p class="text-secondary small mb-0">Built on a secure PHP framework with sanitized inputs and XSS protection.</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" data-aos="fade-up">
    <div class="disclaimer-strip">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h4 class="text-white fw-bold mb-2"><i class="fas fa-exclamation-triangle text-warning me-2"></i>OPERATIONAL NOTICE: SIMULATION ONLY</h4>
                <p class="text-secondary mb-0" style="line-height: 1.6;">
                    This terminal is engineered for <strong>Real-Time Data Visualization</strong> and <strong>Currency Conversion Analysis</strong>. 
                    It serves as a professional portfolio demonstration of Full-Stack Engineering capabilities.
                    <br><span class="text-white">Real-money trading execution, deposits, and fiat withdrawals are disabled in this public build.</span>
                </p>
            </div>
            <div class="col-lg-4 text-end d-none d-lg-block">
                <i class="fas fa-file-contract fa-4x text-secondary opacity-25"></i>
            </div>
        </div>
    </div>
</div>

<div class="metrics-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12"><h4 class="text-white fw-bold">LIVE SYSTEM METRICS</h4></div>
        </div>
        <div class="row g-5">
            <div class="col-md-4" data-aos="fade-up">
                <div class="d-flex justify-content-between text-secondary small fw-bold mb-1">
                    <span>API RESPONSE</span><span class="text-white">24ms</span>
                </div>
                <div class="progress-dark"><div class="progress-bar-neon" style="width: 95%;"></div></div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex justify-content-between text-secondary small fw-bold mb-1">
                    <span>DATA INTEGRITY</span><span class="text-white">100%</span>
                </div>
                <div class="progress-dark"><div class="progress-bar-neon bg-success" style="width: 100%; box-shadow: 0 0 10px #198754;"></div></div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex justify-content-between text-secondary small fw-bold mb-1">
                    <span>ENCRYPTION</span><span class="text-white">AES-256</span>
                </div>
                <div class="progress-dark"><div class="progress-bar-neon bg-warning" style="width: 100%; box-shadow: 0 0 10px #ffc107;"></div></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Name Typing Animation
        const text = "Muhammad Bilal Ifzal";
        const element = document.getElementById("heroDevName");
        let i = 0; let isDeleting = false;

        function typeWriter() {
            const current = text.substring(0, i);
            element.innerText = current;
            if (!isDeleting && i < text.length) { i++; setTimeout(typeWriter, 100); } 
            else if (isDeleting && i > 0) { i--; setTimeout(typeWriter, 50); } 
            else { isDeleting = !isDeleting; setTimeout(typeWriter, isDeleting ? 2500 : 500); }
        }
        typeWriter();
    });
</script>

<?php require_once '../includes/footer.php'; ?>