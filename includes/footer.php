<style>
    .footer-section {
        background: #050505; border-top: 1px solid #111; padding: 60px 0 30px 0; color: #888; font-size: 0.9rem;
    }
    .footer-title { color: #fff; font-weight: 700; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px; }
    .footer-link { color: #888; text-decoration: none; display: block; margin-bottom: 10px; transition: 0.3s; }
    .footer-link:hover { color: #00f3ff; transform: translateX(5px); }
    .social-btn {
        width: 40px; height: 40px; border: 1px solid #333; border-radius: 50%;
        display: inline-flex; align-items: center; justify-content: center;
        color: #fff; margin-right: 10px; transition: 0.3s;
    }
    .social-btn:hover { background: #00f3ff; color: #000; border-color: #00f3ff; }
</style>

<footer class="footer-section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <h4 class="text-white fw-bold mb-3">NEXUS<span style="color:#00f3ff">Terminal</span></h4>
                <p class="mb-4">
                    The world's most advanced financial terminal for retail traders. 
                    Real-time data, institutional analytics, and AI-driven insights.
                </p>
                <div class="d-flex">
                    <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                    <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <h6 class="footer-title">Platform</h6>
                <a href="../pages/crypto.php" class="footer-link">Crypto Terminal</a>
                <a href="../pages/stocks.php" class="footer-link">Stock Market</a>
                <a href="../pages/news.php" class="footer-link">Global News</a>
                <a href="../pages/calendar.php" class="footer-link">Economic Cal</a>
            </div>

            <div class="col-lg-2 col-6">
                <h6 class="footer-title">Company</h6>
                <a href="../pages/about.php" class="footer-link">About Dev</a>
                <a href="../pages/contact.php" class="footer-link">Contact</a>
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
            </div>

            <div class="col-lg-4">
                <h6 class="footer-title">Market Updates</h6>
                <p class="small">Subscribe to our daily briefing.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control bg-dark border-secondary text-white" placeholder="Email Address">
                    <button class="btn btn-info fw-bold" type="button">JOIN</button>
                </div>
            </div>
        </div>
        
        <hr class="border-secondary border-opacity-25 my-5">
        
        <div class="text-center small">
            &copy; <?php echo date("Y"); ?>    NEXUS <span style="color:#00f3ff">TERMINAL</span>. Built by <strong>Muhammad Bilal Ifzal</strong>. All Rights Reserved.
        </div>
    </div>
</footer>

<style>
    /* FLOATING BUTTON */
    .ai-float-btn {
        position: fixed; bottom: 30px; right: 30px;
        width: 60px; height: 60px;
        background: #00f3ff; color: #000;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem;
        box-shadow: 0 0 20px rgba(0, 243, 255, 0.4);
        cursor: pointer; z-index: 9999;
        transition: 0.3s;
        animation: floatPulse 3s infinite;
    }
    .ai-float-btn:hover { transform: scale(1.1); box-shadow: 0 0 40px rgba(0, 243, 255, 0.6); }
    @keyframes floatPulse { 0% { transform: translateY(0); } 50% { transform: translateY(-5px); } 100% { transform: translateY(0); } }

    /* CHAT WINDOW */
    .ai-chat-window {
        position: fixed; bottom: 100px; right: 30px;
        width: 350px; height: 450px;
        background: rgba(15, 15, 15, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid #333;
        border-radius: 12px;
        display: none; /* Hidden by default */
        flex-direction: column;
        overflow: hidden; z-index: 9999;
        box-shadow: 0 10px 40px rgba(0,0,0,0.8);
    }
    
    .chat-header {
        background: #000; padding: 15px; border-bottom: 1px solid #333;
        display: flex; justify-content: space-between; align-items: center;
    }
    
    .chat-body {
        flex: 1; padding: 15px; overflow-y: auto;
        font-size: 0.9rem; font-family: 'Inter', sans-serif;
    }
    
    .chat-msg { margin-bottom: 10px; max-width: 80%; padding: 10px 15px; border-radius: 12px; }
    .msg-bot { background: #1a1a1a; color: #fff; border-top-left-radius: 0; border: 1px solid #333; }
    .msg-user { background: #00f3ff; color: #000; align-self: flex-end; margin-left: auto; border-bottom-right-radius: 0; }
    
    .chat-footer { padding: 15px; border-top: 1px solid #333; background: #000; }
    .chat-input { background: #111; border: 1px solid #333; color: #fff; font-size: 0.9rem; border-radius: 50px; }
    
    .typing-dots::after {
        content: '...'; animation: typing 1.5s infinite;
    }
    @keyframes typing { 0% { content: '.'; } 33% { content: '..'; } 66% { content: '...'; } }
</style>

<div class="ai-float-btn" onclick="toggleChat()">
    <i class="fas fa-robot"></i>
</div>

<div class="ai-chat-window" id="aiWindow">
    <div class="chat-header">
        <div>
            <span class="text-white fw-bold"><i class="fas fa-brain text-info me-2"></i>CryptoPro AI</span>
            <div class="text-success small" style="font-size: 0.7rem;">● Online</div>
        </div>
        <button class="btn btn-sm text-secondary" onclick="toggleChat()"><i class="fas fa-times"></i></button>
    </div>
    
    <div class="chat-body" id="chatBody">
        <div class="chat-msg msg-bot">
            Hello! I am your AI Market Assistant. Ask me about:
            <br>• <strong>BTC Price</strong>
            <br>• <strong>Market Trend</strong>
            <br>• <strong>Portfolio Help</strong>
        </div>
    </div>
    
    <div class="chat-footer">
        <div class="input-group">
            <input type="text" class="form-control chat-input" id="userInput" placeholder="Ask AI..." onkeypress="handleKey(event)">
            <button class="btn btn-sm btn-info rounded-circle ms-2" onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<script>
    function toggleChat() {
        const win = document.getElementById('aiWindow');
        win.style.display = win.style.display === 'flex' ? 'none' : 'flex';
    }

    function handleKey(e) {
        if (e.key === 'Enter') sendMessage();
    }

    function sendMessage() {
        const input = document.getElementById('userInput');
        const text = input.value.trim();
        if(!text) return;

        // 1. Add User Message
        addMessage(text, 'user');
        input.value = '';

        // 2. Simulate AI Thinking
        const loadingId = addMessage('Analyzing<span class="typing-dots"></span>', 'bot');

        // 3. AI Response Logic (Simulated)
        setTimeout(() => {
            document.getElementById(loadingId).remove(); // Remove loading
            let response = "I'm analyzing the live data feed...";
            
            // Simple keyword matching
            const q = text.toLowerCase();
            if(q.includes('btc') || q.includes('bitcoin')) {
                response = "BTC is currently trading at <strong>$52,140</strong>. Momentum is <span class='text-success'>BULLISH</span> with strong support at $50k.";
            } else if(q.includes('trend') || q.includes('market')) {
                response = "The global market cap is up <strong>1.2%</strong> today. Tech stocks and Crypto are leading the rally.";
            } else if(q.includes('hello') || q.includes('hi')) {
                response = "Greetings! I am ready to analyze the markets for you.";
            } else if(q.includes('price')) {
                response = "Please specify the asset (e.g., 'Price of ETH').";
            } else {
                response = "I am tuned to financial data. Try asking about 'Bitcoin', 'Stocks', or 'Trends'.";
            }

            addMessage(response, 'bot');
        }, 1500); // 1.5s delay for realism
    }

    function addMessage(text, sender) {
        const body = document.getElementById('chatBody');
        const div = document.createElement('div');
        const id = 'msg-' + Date.now();
        div.id = id;
        div.className = `chat-msg msg-${sender}`;
        div.innerHTML = text;
        body.appendChild(div);
        body.scrollTop = body.scrollHeight; // Auto scroll to bottom
        return id;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
<script>
    // 1. INITIALIZE WATCHLIST
    // Check if user has a watchlist, if not, create an empty one
    let watchlist = JSON.parse(localStorage.getItem('cryptoProWatchlist')) || [
        { symbol: 'BTC', price: '$52,140', change: '+2.4%', isPositive: true },
        { symbol: 'ETH', price: '$2,950', change: '+1.8%', isPositive: true },
        { symbol: 'TSLA', price: '$198.20', change: '-0.5%', isPositive: false }
    ];

    // 2. RENDER WATCHLIST TO SIDEBAR
    function renderWatchlist() {
        const container = document.querySelector('.offcanvas-body');
        // Keep the "Manage List" button at the bottom, so clear only the items
        container.innerHTML = ''; 

        if (watchlist.length === 0) {
            container.innerHTML = '<div class="text-center text-secondary p-4">No assets watched.</div>';
        } else {
            watchlist.forEach((item, index) => {
                const colorClass = item.isPositive ? 'text-success' : 'text-danger';
                const html = `
                <div class="watch-item">
                    <div>
                        <span class="d-block fw-bold text-white">${item.symbol}</span>
                    </div>
                    <div class="text-end">
                        <div class="watch-price text-white">${item.price}</div>
                        <small class="${colorClass}">${item.change} <i class="fas fa-trash-alt ms-2 text-secondary" style="cursor:pointer;" onclick="removeFromWatchlist(${index})"></i></small>
                    </div>
                </div>`;
                container.innerHTML += html;
            });
        }
        
        // Re-add the button at bottom
        container.innerHTML += `
        <div class="p-4 text-center mt-3">
            <button class="btn btn-outline-info w-100 rounded-pill small" onclick="clearWatchlist()">Clear All</button>
        </div>`;
    }

    // 3. ADD ITEM FUNCTION (Call this from buttons)
    function addToWatchlist(symbol, price, change, isPositive) {
        // Avoid duplicates
        const exists = watchlist.some(item => item.symbol === symbol);
        if(!exists) {
            watchlist.push({ symbol, price, change, isPositive });
            localStorage.setItem('cryptoProWatchlist', JSON.stringify(watchlist));
            renderWatchlist();
            
            // Show a temporary alert/toast (Simple version)
            const btn = document.querySelector('.btn-watchlist');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i> Added!';
            btn.classList.add('btn-success');
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.classList.remove('btn-success');
            }, 1500);
        }
    }

    // 4. REMOVE ITEM FUNCTION
    function removeFromWatchlist(index) {
        watchlist.splice(index, 1);
        localStorage.setItem('cryptoProWatchlist', JSON.stringify(watchlist));
        renderWatchlist();
    }

    // 5. CLEAR ALL
    function clearWatchlist() {
        watchlist = [];
        localStorage.setItem('cryptoProWatchlist', JSON.stringify(watchlist));
        renderWatchlist();
    }

    // Load list on page load
    document.addEventListener('DOMContentLoaded', renderWatchlist);
</script>
</body>
</html>