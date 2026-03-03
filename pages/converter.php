<?php
// pages/converter.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// === 1. THE MASSIVE GLOBAL RATE DATABASE (Base: 1 USD) ===
$rates = [
    // NORTH AMERICA
    'USD' => 1.0, 'CAD' => 1.35, 'MXN' => 17.10, 'CRC' => 515.0, 'GTQ' => 7.80, 'JMD' => 155.0,
    
    // EUROPE (MAJOR)
    'EUR' => 0.92, 'GBP' => 0.79, 'CHF' => 0.88, 'SEK' => 10.35, 'NOK' => 10.55, 'DKK' => 6.88,
    // EUROPE (EAST/CENTRAL)
    'PLN' => 3.98, 'CZK' => 23.45, 'HUF' => 358.0, 'ISK' => 137.5, 'RUB' => 92.50, 'TRY' => 31.05,
    'UAH' => 38.20, 'RON' => 4.60, 'BGN' => 1.80, 'RSD' => 108.0, 'ALL' => 96.0,

    // ASIA & PACIFIC
    'JPY' => 150.2, 'CNY' => 7.19, 'HKD' => 7.82, 'TWD' => 31.50, 'KRW' => 1330.0, 
    'INR' => 83.10, 'PKR' => 278.50, 'IDR' => 15600.0, 'VND' => 24500.0, 'THB' => 35.80, 
    'MYR' => 4.77, 'PHP' => 56.10, 'SGD' => 1.34, 'AUD' => 1.52, 'NZD' => 1.61,
    'LKR' => 310.0, 'BDT' => 110.0, 'NPR' => 133.0, 'KZT' => 450.0, 'UZS' => 12500.0,

    // MIDDLE EAST (GULF & LEVANT)
    'KWD' => 0.307, 'BHD' => 0.377, 'OMR' => 0.385, 'JOD' => 0.709, 'AED' => 3.67, 
    'SAR' => 3.75, 'QAR' => 3.64, 'ILS' => 3.62, 'IQD' => 1310.0, 'EGP' => 30.90, 'LBP' => 15000.0,

    // SOUTH AMERICA
    'BRL' => 4.95, 'ARS' => 830.0, 'CLP' => 970.0, 'COP' => 3920.0, 'PEN' => 3.80, 'UYU' => 39.0,
    'VES' => 36.0, 'BOB' => 6.90, 'PYG' => 7300.0,

    // AFRICA
    'ZAR' => 19.20, 'NGN' => 1550.0, 'KES' => 145.0, 'MAD' => 10.05, 'GHS' => 12.50, 'TND' => 3.10,
    'UGX' => 3800.0, 'TZS' => 2550.0, 'XOF' => 605.0,

    // CRYPTO (Prices in USD)
    'BTC' => 52140, 'ETH' => 2950, 'USDT' => 1.00, 'BNB' => 380, 'SOL' => 112, 'XRP' => 0.55, 
    'ADA' => 0.60, 'AVAX' => 36.50, 'DOGE' => 0.085, 'DOT' => 7.50, 'LINK' => 19.20, 
    'MATIC' => 0.95, 'SHIB' => 0.0000095, 'LTC' => 70.0, 'UNI' => 7.50, 'ATOM' => 10.20,
    'NEAR' => 3.50, 'ICP' => 13.0, 'BCH' => 270.0, 'FIL' => 8.50, 'ETC' => 26.0
];
$json_rates = json_encode($rates);
?>

<style>
    /* === GLOBAL THEME OVERRIDES === */
    body { background-color: #000000; font-family: 'Inter', sans-serif; }
    
    /* Neon Text Utils */
    .text-neon-blue { color: #00f3ff; text-shadow: 0 0 15px rgba(0, 243, 255, 0.6); }
    .text-neon-gold { color: #ffd700; text-shadow: 0 0 15px rgba(255, 215, 0, 0.6); }

    /* --- TITANIUM PANEL (Main Container) --- */
    .converter-panel {
        background: #050505; border: 1px solid #222; border-radius: 16px; padding: 30px;
        box-shadow: 0 0 80px rgba(0,0,0,0.9); position: relative; overflow: hidden; margin-bottom: 30px;
    }
    /* Animated Gradient Border */
    .converter-panel::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, #ffd700, #00f3ff, #00ff88);
        background-size: 200% 200%;
        animation: gradientMove 5s ease infinite;
        box-shadow: 0 0 25px rgba(0, 243, 255, 0.3);
    }
    @keyframes gradientMove { 0% { background-position: 0% 50% } 50% { background-position: 100% 50% } 100% { background-position: 0% 50% } }

    /* --- SESSION CLOCKS --- */
    .session-badge {
        background: #0a0a0a; border: 1px solid #333; padding: 6px 16px; border-radius: 50px;
        font-size: 0.75rem; font-weight: 700; color: #666; display: inline-flex; align-items: center; gap: 8px;
        transition: 0.3s;
    }
    .session-active { border-color: #00ff88; color: #00ff88; box-shadow: 0 0 15px rgba(0, 255, 136, 0.2); background: rgba(0, 255, 136, 0.05); }
    .dot { width: 6px; height: 6px; background: currentColor; border-radius: 50%; box-shadow: 0 0 8px currentColor; }

    /* --- INPUTS --- */
    .label-classic { font-size: 0.7rem; color: #666; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 10px; display: block; }
    
    .input-group-premium {
        background: #000; border: 1px solid #333; border-radius: 12px; padding: 10px;
        display: flex; align-items: center; transition: 0.3s;
    }
    .input-group-premium:focus-within { border-color: #00f3ff; box-shadow: 0 0 20px rgba(0, 243, 255, 0.15); }
    
    .flag-circle { width: 55px; height: 55px; border-radius: 12px; object-fit: cover; border: 1px solid #222; margin: 5px; }
    
    .amount-input {
        background: transparent; border: none; color: #fff; font-size: 2.2rem; 
        font-weight: 700; width: 100%; outline: none; font-family: 'Space Grotesk', sans-serif;
        padding-left: 15px;
    }

    .currency-selector {
        background: #0a0a0a; color: #fff; border: 1px solid #222; padding: 14px; 
        border-radius: 8px; font-weight: 600; cursor: pointer; width: 100%; 
        margin-top: 15px; font-size: 0.95rem; transition: 0.3s;
    }
    .currency-selector:hover { background: #111; border-color: #555; }

    /* --- MOMENTUM DASHBOARD --- */
    .momentum-strip {
        display: flex; gap: 10px; margin-top: 25px; padding: 20px; background: #080808; 
        border: 1px solid #222; border-radius: 10px; justify-content: space-between;
    }
    .momentum-item { text-align: center; flex: 1; border-right: 1px solid #222; }
    .momentum-item:last-child { border-right: none; }
    .mom-label { display: block; font-size: 0.65rem; color: #666; text-transform: uppercase; margin-bottom: 6px; letter-spacing: 1px; }
    .mom-val { font-size: 1.1rem; font-weight: 700; font-family: 'Space Grotesk'; }

    /* --- STRENGTH METER --- */
    .strength-bar-bg { height: 8px; background: #222; border-radius: 10px; margin-top: 15px; overflow: hidden; }
    .strength-bar-fill { height: 100%; width: 0%; transition: 1s ease-out; }

    /* --- NEWS TICKER --- */
    .ticker-wrap {
        width: 100%; overflow: hidden; background: #0a0a0a; border-bottom: 1px solid #222; 
        white-space: nowrap; padding: 8px 0; font-family: 'Courier New', monospace; font-size: 0.8rem;
    }
    .ticker-move { display: inline-block; animation: ticker 30s linear infinite; }
    .ticker-item { display: inline-block; padding: 0 2rem; color: #888; }
    .ticker-up { color: #00ff88; } .ticker-down { color: #ff4d4d; }
    @keyframes ticker { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-100%, 0, 0); } }

</style>

<div class="ticker-wrap">
    <div class="ticker-move">
        <span class="ticker-item">USD/PKR: 278.50 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">EUR/USD: 1.08 <span class="ticker-down">▼</span></span>
        <span class="ticker-item">BTC: $52,140 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">GOLD: $2,035 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">JPY/USD: 150.20 <span class="ticker-down">▼</span></span>
        <span class="ticker-item">FED RATE DECISION PENDING...</span>
        <span class="ticker-item">OIL: $78.50 <span class="ticker-up">▲</span></span>
        <span class="ticker-item">USD/PKR: 278.50 <span class="ticker-up">▲</span></span>
    </div>
</div>

<div class="text-center py-5" style="background: #000;">
    <div class="container" data-aos="fade-down">
      
        
        <h1 class="display-3 fw-bold text-white mb-2">GLOBAL <span class="text-neon-blue">Currency Convertor</span></h1>
        <p class="text-secondary small text-uppercase fw-bold letter-spacing-1">Institutional Multi-Asset Terminal</p>
    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    <div class="row g-5">
        
        <div class="col-lg-5">
            <div class="converter-panel">
                
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <span class="label-classic">From Asset</span>
                    <span id="badgeOne" class="badge bg-dark border border-secondary text-secondary">Fiat</span>
                </div>
                <div class="input-group-premium">
                    <img id="flagOne" src="" class="flag-circle">
                    <input type="number" id="amountOne" class="amount-input" value="1" oninput="calculate('one')" placeholder="0.00">
                </div>
                
                <select id="currencyOne" class="currency-selector" onchange="updateUI(); calculate('one'); updateMomentum();">
                    <optgroup label="Popular">
                        <option value="USD" selected>🇺🇸 USD - US Dollar</option>
                        <option value="PKR">🇵🇰 PKR - Pakistani Rupee</option>
                        <option value="EUR">🇪🇺 EUR - Euro</option>
                        <option value="GBP">🇬🇧 GBP - British Pound</option>
                        <option value="INR">🇮🇳 INR - Indian Rupee</option>
                        <option value="BTC">₿ BTC - Bitcoin</option>
                    </optgroup>
                    <optgroup label="Middle East (Gulf)">
                        <option value="KWD">🇰🇼 KWD - Kuwaiti Dinar</option>
                        <option value="BHD">🇧🇭 BHD - Bahraini Dinar</option>
                        <option value="OMR">🇴🇲 OMR - Omani Rial</option>
                        <option value="JOD">🇯🇴 JOD - Jordanian Dinar</option>
                        <option value="AED">🇦🇪 AED - UAE Dirham</option>
                        <option value="SAR">🇸🇦 SAR - Saudi Riyal</option>
                        <option value="QAR">🇶🇦 QAR - Qatari Riyal</option>
                        <option value="EGP">🇪🇬 EGP - Egyptian Pound</option>
                        <option value="ILS">🇮🇱 ILS - Israeli Shekel</option>
                        <option value="LBP">🇱🇧 LBP - Lebanese Pound</option>
                    </optgroup>
                    <optgroup label="Asia Pacific">
                        <option value="CNY">🇨🇳 CNY - Chinese Yuan</option>
                        <option value="JPY">🇯🇵 JPY - Japanese Yen</option>
                        <option value="BDT">🇧🇩 BDT - Bangladeshi Taka</option>
                        <option value="LKR">🇱🇰 LKR - Sri Lankan Rupee</option>
                        <option value="IDR">🇮🇩 IDR - Indonesian Rupiah</option>
                        <option value="MYR">🇲🇾 MYR - Malaysian Ringgit</option>
                        <option value="THB">🇹🇭 THB - Thai Baht</option>
                        <option value="VND">🇻🇳 VND - Vietnamese Dong</option>
                        <option value="PHP">🇵🇭 PHP - Philippine Peso</option>
                        <option value="AUD">🇦🇺 AUD - Australian Dollar</option>
                        <option value="NZD">🇳🇿 NZD - New Zealand Dollar</option>
                        <option value="KRW">🇰🇷 KRW - South Korean Won</option>
                    </optgroup>
                    <optgroup label="Americas">
                        <option value="CAD">🇨🇦 CAD - Canadian Dollar</option>
                        <option value="BRL">🇧🇷 BRL - Brazilian Real</option>
                        <option value="MXN">🇲🇽 MXN - Mexican Peso</option>
                        <option value="ARS">🇦🇷 ARS - Argentine Peso</option>
                        <option value="COP">🇨🇴 COP - Colombian Peso</option>
                        <option value="CLP">🇨🇱 CLP - Chilean Peso</option>
                    </optgroup>
                    <optgroup label="Europe (Non-Euro)">
                        <option value="CHF">🇨🇭 CHF - Swiss Franc</option>
                        <option value="TRY">🇹🇷 TRY - Turkish Lira</option>
                        <option value="RUB">🇷🇺 RUB - Russian Ruble</option>
                        <option value="UAH">🇺🇦 UAH - Ukrainian Hryvnia</option>
                        <option value="PLN">🇵🇱 PLN - Polish Zloty</option>
                        <option value="SEK">🇸🇪 SEK - Swedish Krona</option>
                        <option value="NOK">🇳🇴 NOK - Norwegian Krone</option>
                    </optgroup>
                    <optgroup label="Africa">
                        <option value="ZAR">🇿🇦 ZAR - South African Rand</option>
                        <option value="NGN">🇳🇬 NGN - Nigerian Naira</option>
                        <option value="KES">🇰🇪 KES - Kenyan Shilling</option>
                        <option value="GHS">🇬🇭 GHS - Ghanaian Cedi</option>
                    </optgroup>
                    <optgroup label="Crypto Assets">
                        <option value="ETH">Ξ ETH - Ethereum</option>
                        <option value="USDT">₮ USDT - Tether</option>
                        <option value="BNB">BNB - Binance Coin</option>
                        <option value="SOL">SOL - Solana</option>
                        <option value="XRP">XRP - Ripple</option>
                        <option value="DOGE">Ð DOGE - Dogecoin</option>
                        <option value="SHIB">SHIB - Shiba Inu</option>
                    </optgroup>
                </select>

                <div class="text-center my-4 opacity-50"><i class="fas fa-arrow-down fa-lg text-neon-blue"></i></div>

                <div class="d-flex justify-content-between align-items-end mb-2">
                    <span class="label-classic">To Asset</span>
                    <span id="badgeTwo" class="badge bg-dark border border-secondary text-secondary">Fiat</span>
                </div>
                <div class="input-group-premium">
                    <img id="flagTwo" src="" class="flag-circle">
                    <input type="number" id="amountTwo" class="amount-input" value="278.50" oninput="calculate('two')" placeholder="0.00">
                </div>
                <select id="currencyTwo" class="currency-selector" onchange="updateUI(); calculate('one');">
                    <option value="PKR" selected>🇵🇰 PKR - Pakistani Rupee</option>
                    <option value="USD">🇺🇸 USD - US Dollar</option>
                    <option value="EUR">🇪🇺 EUR - Euro</option>
                    <option value="GBP">🇬🇧 GBP - British Pound</option>
                    <option value="AED">🇦🇪 AED - UAE Dirham</option>
                    <option value="SAR">🇸🇦 SAR - Saudi Riyal</option>
                    <option value="CNY">🇨🇳 CNY - Chinese Yuan</option>
                    <option value="BTC">₿ BTC - Bitcoin</option>
                    <option value="ETH">Ξ ETH - Ethereum</option>
                    <option value="USDT">₮ USDT - Tether</option>
                </select>

                <div class="mt-4 p-3 bg-dark border border-secondary border-opacity-25 rounded-3 d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-secondary d-block">Interbank Rate</small>
                        <span id="rateDisplay" class="fw-bold text-white fs-5">...</span>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-success bg-opacity-10 text-success border border-success">LIVE FEED</span>
                    </div>
                </div>

            </div>

            <div class="converter-panel p-4" style="background: #080808;">
                <h6 class="text-white fw-bold mb-3"><i class="fas fa-fingerprint text-neon-gold me-2"></i>ASSET INTELLIGENCE: <span id="momTicker" class="text-neon-blue">USD</span></h6>
                
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <small class="text-secondary text-uppercase" style="font-size:0.65rem">Central Authority</small>
                        <div class="text-white small fw-bold" id="infoBank">Federal Reserve</div>
                    </div>
                    <div class="col-6">
                        <small class="text-secondary text-uppercase" style="font-size:0.65rem">Inflation Rate</small>
                        <div class="text-white small fw-bold" id="infoInfl">3.1% (YoY)</div>
                    </div>
                </div>

                <div class="momentum-strip">
                    <div class="momentum-item">
                        <span class="mom-label">24h Change</span>
                        <span id="momChange" class="mom-val text-success">+0.45%</span>
                    </div>
                    <div class="momentum-item">
                        <span class="mom-label">Volatility</span>
                        <span id="momVol" class="mom-val text-warning">MED</span>
                    </div>
                    <div class="momentum-item">
                        <span class="mom-label">Rating</span>
                        <span id="momRating" class="mom-val text-info">BUY</span>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-between">
                        <span class="text-secondary small">Buying Pressure (RSI)</span>
                        <span id="rsiVal" class="text-white small fw-bold">65/100</span>
                    </div>
                    <div class="strength-bar-bg">
                        <div id="rsiBar" class="strength-bar-fill" style="width: 65%; background: #ffd700;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            
            <div class="converter-panel mb-4" style="height: 450px; padding: 25px;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="text-white fw-bold m-0"><i class="fas fa-chart-line text-neon-blue me-2"></i>Market Trends</h5>
                        <small class="text-secondary">AI-Generated 30-Day Trajectory</small>
                    </div>
                    <div class="d-flex gap-2">
                        <span class="badge bg-dark border border-secondary text-secondary">24H</span>
                        <span class="badge bg-dark border border-secondary text-secondary">7D</span>
                        <span class="badge bg-dark border border-info text-info">30D</span>
                    </div>
                </div>
                <div style="height: 350px;">
                    <canvas id="proChart"></canvas>
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="p-4 bg-dark border border-secondary border-opacity-25 rounded-3 h-100">
                        <h6 class="text-white fw-bold"><i class="fas fa-brain text-neon-blue me-2"></i>AI Forecast</h6>
                        <p class="text-secondary small mt-2 mb-3">
                            <strong class="text-white" id="aiCurrency">USD</strong> is showing <span class="text-success">bullish divergence</span> on the 4H timeframe. Expect support to hold.
                        </p>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-arrow-trend-up text-success fa-lg"></i>
                            <span class="text-success fw-bold">Positive Outlook</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-4 bg-dark border border-secondary border-opacity-25 rounded-3 h-100">
                        <h6 class="text-white fw-bold"><i class="fas fa-gauge-high text-neon-gold me-2"></i>Market Sentiment</h6>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between text-secondary small mb-1">
                                <span>Fear</span>
                                <span>Greed</span>
                            </div>
                            <div class="progress" style="height: 8px; background: #222;">
                                <div class="progress-bar" role="progressbar" style="width: 68%; background: linear-gradient(90deg, #ff4d4d, #ffd700, #00ff88);"></div>
                            </div>
                            <div class="text-center mt-2 fw-bold text-white">GREED (68)</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="converter-panel">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white fw-bold m-0"><i class="fas fa-globe text-success me-2"></i>Live Cross-Rates</h5>
                    <span class="badge bg-secondary">Base: <span id="baseLabel">USD</span></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover" style="background: transparent;">
                        <thead>
                            <tr class="text-secondary small text-uppercase">
                                <th>Asset</th>
                                <th>Price</th>
                                <th class="text-end">Inverse</th>
                            </tr>
                        </thead>
                        <tbody id="crossTable">
                            </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- 1. CONFIGURATION ---
    const rates = <?php echo $json_rates; ?>;
    const cryptoList = ['BTC','ETH','USDT','BNB','SOL','XRP','ADA','AVAX','DOGE','DOT','LINK','MATIC','SHIB','LTC','UNI','ATOM','NEAR','ICP','BCH','FIL','ETC'];

    // FLAG CODE MAPPING (ISO-2)
    // Maps Currency Code -> Country Code for flagcdn
    const codes = {
        USD:'us', CAD:'ca', MXN:'mx', CRC:'cr', GTQ:'gt', JMD:'jm',
        EUR:'eu', GBP:'gb', CHF:'ch', SEK:'se', NOK:'no', DKK:'dk', PLN:'pl', CZK:'cz', HUF:'hu', ISK:'is', RUB:'ru', TRY:'tr', UAH:'ua', RON:'ro', BGN:'bg', RSD:'rs', ALL:'al',
        JPY:'jp', CNY:'cn', HKD:'hk', TWD:'tw', KRW:'kr', INR:'in', PKR:'pk', IDR:'id', VND:'vn', THB:'th', MYR:'my', PHP:'ph', SGD:'sg', AUD:'au', NZD:'nz', LKR:'lk', BDT:'bd', NPR:'np', KZT:'kz', UZS:'uz',
        KWD:'kw', BHD:'bh', OMR:'om', JOD:'jo', AED:'ae', SAR:'sa', QAR:'qa', ILS:'il', IQD:'iq', EGP:'eg', LBP:'lb',
        BRL:'br', ARS:'ar', CLP:'cl', COP:'co', PEN:'pe', UYU:'uy', VES:'ve', BOB:'bo', PYG:'py',
        ZAR:'za', NGN:'ng', KES:'ke', MAD:'ma', GHS:'gh', TND:'tn', UGX:'ug', TZS:'tz', XOF:'sn',
        
        // Crypto Icons
        BTC: 'https://assets.coingecko.com/coins/images/1/small/bitcoin.png',
        ETH: 'https://assets.coingecko.com/coins/images/279/small/ethereum.png',
        USDT: 'https://assets.coingecko.com/coins/images/325/small/Tether-logo.png',
        BNB: 'https://assets.coingecko.com/coins/images/825/small/binance-coin-logo.png',
        SOL: 'https://assets.coingecko.com/coins/images/4128/small/solana.png'
    };

    // ASSET INTELLIGENCE MAP
    const meta = {
        USD: { bank: 'Federal Reserve', infl: '3.1%' },
        PKR: { bank: 'State Bank of Pakistan', infl: '28.3%' },
        EUR: { bank: 'European Central Bank', infl: '2.8%' },
        GBP: { bank: 'Bank of England', infl: '4.0%' },
        JPY: { bank: 'Bank of Japan', infl: '2.2%' },
        CNY: { bank: 'People\'s Bank of China', infl: '0.8%' },
        KWD: { bank: 'Central Bank of Kuwait', infl: '3.4%' },
        BTC: { bank: 'Decentralized Network', infl: '1.8%' },
        ETH: { bank: 'Ethereum Foundation', infl: '-0.2%' },
        AED: { bank: 'Central Bank of UAE', infl: '3.0%' }
    };

    // --- 2. HELPERS ---
    function getFlag(curr) {
        if(codes[curr]) {
            if(codes[curr].startsWith('http')) return codes[curr];
            return `https://flagcdn.com/w80/${codes[curr]}.png`;
        }
        return 'https://flagcdn.com/w80/un.png';
    }

    function getUSDPrice(curr) {
        if (curr === 'USD') return 1.0;
        if (cryptoList.includes(curr)) return rates[curr]; 
        return 1.0 / rates[curr];
    }

    // --- 3. MAIN CALCULATOR ---
    function calculate(source) {
        const c1 = document.getElementById('currencyOne').value;
        const c2 = document.getElementById('currencyTwo').value;
        const in1 = document.getElementById('amountOne');
        const in2 = document.getElementById('amountTwo');

        const val1 = getUSDPrice(c1);
        const val2 = getUSDPrice(c2);
        const exchangeRate = val1 / val2;

        if(source === 'one') in2.value = (in1.value * exchangeRate).toFixed(4);
        else in1.value = (in2.value / exchangeRate).toFixed(4);

        let displayRate = exchangeRate < 0.0001 ? exchangeRate.toFixed(8) : exchangeRate.toFixed(4);
        document.getElementById('rateDisplay').innerText = `1 ${c1} = ${displayRate} ${c2}`;
        
        updateChart(c1, c2, exchangeRate);
        updateCrossTable(c1, val1);
    }

    // --- 4. MOMENTUM & INTELLIGENCE ---
    function updateMomentum() {
        const c1 = document.getElementById('currencyOne').value;
        document.getElementById('momTicker').innerText = c1;
        document.getElementById('aiCurrency').innerText = c1;
        
        // Metadata
        const info = meta[c1] || { bank: 'Central Bank', infl: 'N/A' };
        document.getElementById('infoBank').innerText = info.bank;
        document.getElementById('infoInfl').innerText = info.infl;

        // Simulated Volatility & Change
        const isCrypto = cryptoList.includes(c1);
        const volatility = isCrypto ? 4 : 0.6; 
        const change = (Math.random() * volatility * 2) - volatility;
        
        const changeEl = document.getElementById('momChange');
        const volEl = document.getElementById('momVol');
        const rsiBar = document.getElementById('rsiBar');
        const rsiVal = document.getElementById('rsiVal');

        if (change >= 0) {
            changeEl.innerText = "+" + change.toFixed(2) + "%";
            changeEl.className = "mom-val text-success";
            document.getElementById('momRating').innerText = "BUY";
            document.getElementById('momRating').className = "mom-val text-neon-blue";
        } else {
            changeEl.innerText = change.toFixed(2) + "%";
            changeEl.className = "mom-val text-danger";
            document.getElementById('momRating').innerText = "SELL";
            document.getElementById('momRating').className = "mom-val text-danger";
        }

        volEl.innerText = Math.abs(change) > 1.5 ? "HIGH" : "LOW";
        volEl.className = Math.abs(change) > 1.5 ? "mom-val text-warning" : "mom-val text-secondary";

        const rsi = Math.floor(Math.random() * (75 - 35 + 1)) + 35;
        rsiVal.innerText = rsi + "/100";
        rsiBar.style.width = rsi + "%";
        rsiBar.style.background = rsi > 70 ? "#ff4d4d" : (rsi < 30 ? "#00ff88" : "#ffd700");
    }

    // --- 5. UI UPDATES ---
    function updateUI() {
        const c1 = document.getElementById('currencyOne').value;
        const c2 = document.getElementById('currencyTwo').value;
        document.getElementById('flagOne').src = getFlag(c1);
        document.getElementById('flagTwo').src = getFlag(c2);
        
        const b1 = document.getElementById('badgeOne');
        const b2 = document.getElementById('badgeTwo');
        
        b1.innerText = cryptoList.includes(c1) ? "Crypto" : "Fiat";
        b2.innerText = cryptoList.includes(c2) ? "Crypto" : "Fiat";
    }

    function updateCrossTable(base, baseVal) {
        const targets = ['USD','EUR','GBP','PKR','AED','BTC','ETH'];
        let html = '';
        document.getElementById('baseLabel').innerText = base;

        targets.forEach(t => {
            if(t === base) return;
            const targetVal = getUSDPrice(t);
            const rate = baseVal / targetVal;
            const inv = 1 / rate;
            const rateFmt = rate < 0.001 ? rate.toFixed(8) : rate.toFixed(4);
            const invFmt = inv < 0.001 ? inv.toFixed(8) : inv.toFixed(2);
            
            html += `<tr>
                <td class="text-white fw-bold"><img src="${getFlag(t)}" width="20" class="me-2 rounded-circle">${t}</td>
                <td class="text-neon-blue">${rateFmt}</td>
                <td class="text-end text-secondary small">1 ${t} = ${invFmt}</td>
            </tr>`;
        });
        document.getElementById('crossTable').innerHTML = html;
    }

    // --- 6. SUPER REALISTIC CHART ENGINE (Brownian Motion) ---
    let proChart = null;

    function updateChart(c1, c2, currentRate) {
        const ctx = document.getElementById('proChart').getContext('2d');
        let dataPoints = [];
        let labels = [];
        const days = 30;
        let volatility = cryptoList.includes(c1) ? 0.04 : 0.008; // Crypto swings 4%, Fiat 0.8%
        
        let price = currentRate;
        for(let i = 0; i < days; i++) {
            let d = new Date(); d.setDate(d.getDate() - i);
            labels.unshift(d.toLocaleDateString('en-US', { day: 'numeric', month: 'short' }));
            dataPoints.unshift(price);
            let change = price * (Math.random() - 0.5) * volatility;
            price = price - change;
        }

        if(proChart) proChart.destroy();
        
        // Neon Gradient
        let gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(0, 243, 255, 0.4)');
        gradient.addColorStop(1, 'rgba(0, 243, 255, 0.0)');

        proChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Exchange Rate',
                    data: dataPoints,
                    borderColor: '#00f3ff',
                    borderWidth: 3,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 0,
                    pointHoverRadius: 6,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#00f3ff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false } },
                interaction: { mode: 'nearest', axis: 'x', intersect: false },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#666' } },
                    y: { position: 'right', grid: { color: '#222' }, ticks: { color: '#666' } }
                }
            }
        });
    }

    // INITIALIZE
    updateUI();
    calculate('one');
    updateMomentum();
</script>

<?php require_once '../includes/footer.php'; ?>