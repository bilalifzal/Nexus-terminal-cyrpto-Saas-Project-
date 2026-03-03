<?php
// pages/news.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 
?>

<style>
    body { background-color: #000; }

    /* --- TICKER --- */
    .ticker-wrap {
        width: 100%; overflow: hidden; background: #050505; border-bottom: 1px solid #222; white-space: nowrap; position: relative;
    }
    .ticker-label {
        position: absolute; left: 0; top: 0; background: #00f3ff; color: #000;
        font-weight: 900; padding: 12px 25px; z-index: 10; font-size: 0.8rem; letter-spacing: 1px;
    }
    .ticker-move {
        display: inline-block; padding-left: 100%; animation: ticker 40s linear infinite;
    }
    .ticker-item {
        display: inline-block; padding: 12px 2rem; color: #fff; font-size: 0.9rem; text-transform: uppercase; font-family: 'Space Grotesk', sans-serif;
    }
    @keyframes ticker { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-100%, 0, 0); } }

    /* --- NEWS GRID --- */
    .news-card {
        background: #080808; border: 1px solid #222; border-radius: 12px; overflow: hidden; height: 100%; transition: 0.3s; display: flex; flex-direction: column;
    }
    .news-card:hover { transform: translateY(-5px); border-color: #00f3ff; box-shadow: 0 0 20px rgba(0, 243, 255, 0.1); }
    
    .news-img-wrap { height: 200px; overflow: hidden; position: relative; }
    .news-img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; opacity: 0.8; }
    .news-card:hover .news-img { transform: scale(1.1); opacity: 1; }
    
    .news-body { padding: 25px; flex-grow: 1; display: flex; flex-direction: column; }
    
    .news-tag {
        font-size: 0.7rem; font-weight: 700; letter-spacing: 1px; padding: 4px 10px; border-radius: 4px; display: inline-block; margin-bottom: 15px; width: fit-content;
    }
    .tag-crypto { background: rgba(0, 243, 255, 0.1); color: #00f3ff; border: 1px solid rgba(0, 243, 255, 0.2); }
    .tag-forex { background: rgba(0, 255, 136, 0.1); color: #00ff88; border: 1px solid rgba(0, 255, 136, 0.2); }
    
    .news-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin-bottom: 10px; line-height: 1.4; }
    .news-desc { font-size: 0.9rem; color: #888; margin-bottom: 20px; flex-grow: 1; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; }
    
    .news-meta { border-top: 1px solid #222; padding-top: 15px; display: flex; justify-content: space-between; align-items: center; font-size: 0.8rem; color: #666; }

    /* --- LOADING SPINNER --- */
    .loader { border: 3px solid #111; border-top: 3px solid #00f3ff; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin: 50px auto; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

</style>

<div class="ticker-wrap">
    <div class="ticker-label">LIVE FEED</div>
    <div class="ticker-move" id="tickerContent">
        <div class="ticker-item">Loading Global Markets...</div>
    </div>
</div>

<div class="text-center py-5" style="background: #000;">
    <div class="container" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white mb-2">GLOBAL <span style="color:#00f3ff">INTELLIGENCE</span></h1>
        <p class="text-secondary">Real-Time Crypto, Forex & Economic News.</p>
    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <span class="badge bg-danger me-2 animate__animated animate__flash animate__infinite">LIVE</span>
            <span class="text-white small">Updating automatically</span>
        </div>
        <button class="btn btn-sm btn-outline-secondary text-white" onclick="location.reload()">
            <i class="fas fa-sync-alt me-1"></i> Refresh Feed
        </button>
    </div>

    <div id="newsGrid" class="row g-4">
        <div class="col-12 text-center">
            <div class="loader"></div>
            <p class="text-secondary mt-3">Establishing Uplink to News Servers...</p>
        </div>
    </div>

</div>

<div style="height: 50px;"></div>

<script>
    // 1. CONFIGURATION
    const CRYPTO_API_URL = 'https://min-api.cryptocompare.com/data/v2/news/?lang=EN';
    
    // 2. FOREX / GLOBAL SIMULATOR (To mix with real crypto news)
    const forexHeadlines = [
        "US Dollar strengthens as Fed signals rate hike pause",
        "Euro dips against GBP amid economic uncertainty in Germany",
        "Japanese Yen (JPY) volatile after Bank of Japan announcement",
        "Gold prices reach near all-time high as investors seek safety",
        "Pakistani Rupee (PKR) shows slight recovery against USD",
        "Oil prices surge as supply concerns grow in Middle East",
        "Indian Rupee stable despite global market fluctuations",
        "Saudi Rial (SAR) remains pegged strong to the Dollar",
        "UK Inflation drops, boosting confidence in British Pound",
        "Canadian Dollar (CAD) rises on strong oil export data",
        "China's Yuan (CNY) sees increased trading volume in Asia",
        "Australian Dollar impacts export markets as rates hold steady"
    ];

    const forexImages = [
        "https://images.unsplash.com/photo-1611974765270-ca1258634369?auto=format&fit=crop&w=600&q=80", // Gold/Money
        "https://images.unsplash.com/photo-1526304640152-d4619684e485?auto=format&fit=crop&w=600&q=80", // Graph
        "https://images.unsplash.com/photo-1580519542036-c47de6196ba5?auto=format&fit=crop&w=600&q=80", // Currency
        "https://images.unsplash.com/photo-1621504450168-38f64731993e?auto=format&fit=crop&w=600&q=80"  // Charts
    ];

    // 3. MAIN FUNCTION
    async function fetchLiveNews() {
        const grid = document.getElementById('newsGrid');
        const ticker = document.getElementById('tickerContent');
        
        try {
            // A. Fetch Real Crypto News
            const response = await fetch(CRYPTO_API_URL);
            const data = await response.json();
            const cryptoNews = data.Data.slice(0, 8); // Get top 8 stories

            // B. Generate Mixed Feed (Crypto + Forex)
            let combinedFeed = [];

            // Add Crypto Stories
            cryptoNews.forEach(item => {
                combinedFeed.push({
                    type: 'CRYPTO',
                    title: item.title,
                    desc: item.body,
                    img: item.imageurl,
                    source: item.source_info.name,
                    url: item.url,
                    time: item.published_on
                });
            });

            // Add Simulated Forex Stories (Interleaved)
            for(let i=0; i<4; i++) {
                let randomHeadline = forexHeadlines[Math.floor(Math.random() * forexHeadlines.length)];
                let randomImg = forexImages[Math.floor(Math.random() * forexImages.length)];
                combinedFeed.push({
                    type: 'FOREX',
                    title: randomHeadline,
                    desc: "Global currency markets are reacting to the latest economic data reports released this morning. Investors are watching closely.",
                    img: randomImg,
                    source: "Global FX Wire",
                    url: "#",
                    time: Date.now() / 1000 - (Math.random() * 3600) // Random time within last hour
                });
            }

            // Shuffle the feed slightly so it's not just Crypto then Forex
            combinedFeed.sort((a, b) => b.time - a.time);

            // C. RENDER CARDS
            grid.innerHTML = ''; // Clear loader
            let tickerHTML = '';

            combinedFeed.forEach(item => {
                // Ticker Item
                tickerHTML += `<div class="ticker-item"><i class="fas fa-circle text-info me-2"></i> ${item.title}</div>`;

                // Calculate Time Ago
                let seconds = Math.floor((Date.now() / 1000) - item.time);
                let timeString = seconds < 60 ? "Just now" : 
                                 seconds < 3600 ? Math.floor(seconds/60) + " mins ago" : 
                                 Math.floor(seconds/3600) + " hours ago";

                // CSS Classes based on type
                let tagClass = item.type === 'CRYPTO' ? 'tag-crypto' : 'tag-forex';

                // Card HTML
                let html = `
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="news-card">
                        <div class="news-img-wrap">
                            <img src="${item.img}" class="news-img" alt="News">
                            <div style="position:absolute; top:15px; right:15px; background:rgba(0,0,0,0.7); color:#fff; padding:2px 8px; border-radius:4px; font-size:0.7rem;">
                                <i class="far fa-clock"></i> ${timeString}
                            </div>
                        </div>
                        <div class="news-body">
                            <span class="news-tag ${tagClass}">${item.type}</span>
                            <h5 class="news-title">${item.title}</h5>
                            <p class="news-desc">${item.desc}</p>
                            <div class="news-meta">
                                <span><i class="fas fa-newspaper me-1"></i> ${item.source}</span>
                                <a href="${item.url}" target="_blank" class="text-white text-decoration-none fw-bold">Read More <i class="fas fa-arrow-right small text-info"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                grid.innerHTML += html;
            });

            // Update Ticker
            ticker.innerHTML = tickerHTML + tickerHTML; // Duplicate for smooth loop

        } catch (error) {
            console.error(error);
            grid.innerHTML = '<div class="text-center text-danger">Failed to load live news feed. Please check connection.</div>';
        }
    }

    // Run on Load
    document.addEventListener('DOMContentLoaded', fetchLiveNews);

</script>

<?php require_once '../includes/footer.php'; ?>