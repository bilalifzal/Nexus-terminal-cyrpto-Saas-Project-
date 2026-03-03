<?php
// pages/stocks.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// EXPANDED STOCK DATA (Simulated Live Data)
$stocks = [
    // USA (Wall Street)
    ['country' => 'usa', 'ticker' => 'AAPL', 'name' => 'Apple Inc.', 'price' => 182.50, 'change' => 1.25, 'cap' => '2.8T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'],
    ['country' => 'usa', 'ticker' => 'TSLA', 'name' => 'Tesla Inc.', 'price' => 195.50, 'change' => -1.20, 'cap' => '600B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e8/Tesla_logo.png'],
    ['country' => 'usa', 'ticker' => 'NVDA', 'name' => 'NVIDIA Corp', 'price' => 785.30, 'change' => 3.40, 'cap' => '1.9T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/21/Nvidia_logo.svg'],
    ['country' => 'usa', 'ticker' => 'AMZN', 'name' => 'Amazon', 'price' => 174.00, 'change' => 0.90, 'cap' => '1.8T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg'],
    
    // PAKISTAN (PSX)
    ['country' => 'pk', 'ticker' => 'SYS', 'name' => 'Systems Ltd.', 'price' => 390.00, 'change' => 2.50, 'cap' => '105B', 'logo' => 'https://seeklogo.com/images/S/systems-limited-logo-043372B254-seeklogo.com.png'],
    ['country' => 'pk', 'ticker' => 'OGDC', 'name' => 'Oil & Gas Dev.', 'price' => 115.50, 'change' => 0.45, 'cap' => '400B', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/8/88/OGDCL_Logo.svg/1200px-OGDCL_Logo.svg.png'],
    ['country' => 'pk', 'ticker' => 'LUCK', 'name' => 'Lucky Cement', 'price' => 750.20, 'change' => -1.50, 'cap' => '250B', 'logo' => 'https://seeklogo.com/images/L/lucky-cement-logo-1135655757-seeklogo.com.png'],

    // UNITED KINGDOM (LSE)
    ['country' => 'uk', 'ticker' => 'SHEL', 'name' => 'Shell PLC', 'price' => 25.40, 'change' => 0.30, 'cap' => '210B', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/e/e8/Shell_logo.svg'],
    ['country' => 'uk', 'ticker' => 'HSBA', 'name' => 'HSBC Holdings', 'price' => 6.10, 'change' => -0.10, 'cap' => '160B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/aa/HSBC_logo_%282018%29.svg'],
    
    // GERMANY (DAX)
    ['country' => 'de', 'ticker' => 'SAP', 'name' => 'SAP SE', 'price' => 170.50, 'change' => 1.80, 'cap' => '200B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/SAP_2011_logo.svg'],
    ['country' => 'de', 'ticker' => 'VOW3', 'name' => 'Volkswagen', 'price' => 120.30, 'change' => -0.50, 'cap' => '75B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/6/6d/Volkswagen_logo_2019.svg'],

    // INDIA (NSE)
    ['country' => 'in', 'ticker' => 'RELIANCE', 'name' => 'Reliance Ind.', 'price' => 2950.00, 'change' => 1.10, 'cap' => '19T', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/9/99/Reliance_Industries_Logo.svg'],
    ['country' => 'in', 'ticker' => 'TATA', 'name' => 'Tata Motors', 'price' => 930.00, 'change' => 3.20, 'cap' => '3T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/8/8e/Tata_logo.svg'],

    // JAPAN (Nikkei)
    ['country' => 'jp', 'ticker' => '7203', 'name' => 'Toyota Motor', 'price' => 3450.00, 'change' => 0.50, 'cap' => '40T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Toyota_carlogo.svg'],
    ['country' => 'jp', 'ticker' => '6758', 'name' => 'Sony Group', 'price' => 13200.00, 'change' => -1.50, 'cap' => '16T', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Sony_logo.svg'],

    // CHINA (SSE/HKSE)
    ['country' => 'cn', 'ticker' => 'BABA', 'name' => 'Alibaba Group', 'price' => 74.50, 'change' => 2.10, 'cap' => '200B', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/8/80/Alibaba-Group-Logo.svg'],
    ['country' => 'cn', 'ticker' => 'TCEHY', 'name' => 'Tencent', 'price' => 36.80, 'change' => 0.90, 'cap' => '350B', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/b/ba/Tencent_Logo.svg'],

    // CANADA (TSX)
    ['country' => 'ca', 'ticker' => 'SHOP', 'name' => 'Shopify Inc.', 'price' => 78.20, 'change' => -2.30, 'cap' => '100B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/0e/Shopify_logo_2018.svg'],
    ['country' => 'ca', 'ticker' => 'RY', 'name' => 'Royal Bank', 'price' => 132.50, 'change' => 0.40, 'cap' => '180B', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/7/7f/RBC_Royal_Bank.svg'],

    // SAUDI ARABIA (Tadawul)
    ['country' => 'sa', 'ticker' => 'ARAMCO', 'name' => 'Saudi Aramco', 'price' => 32.10, 'change' => 0.10, 'cap' => '2T', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/3/30/Saudi_Aramco_Logo.svg'],
    
    // UAE (DFM)
    ['country' => 'ae', 'ticker' => 'EMAAR', 'name' => 'Emaar Prop.', 'price' => 8.20, 'change' => 0.90, 'cap' => '60B', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/a/ae/Emaar_Properties_logo.svg'],
];

$json_stocks = json_encode($stocks);
?>

<style>
    body { background-color: #000000; }

    /* --- FILTER BAR --- */
    .filter-bar {
        display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; margin-bottom: 30px;
    }
    .filter-btn {
        background: #080808; border: 1px solid #333; color: #aaa;
        padding: 10px 20px; border-radius: 50px; cursor: pointer;
        display: flex; align-items: center; gap: 8px; transition: 0.3s;
    }
    .filter-btn:hover, .filter-btn.active {
        background: #00f3ff; color: #000; border-color: #00f3ff; box-shadow: 0 0 15px rgba(0,243,255,0.4);
    }
    .filter-flag { width: 20px; height: 20px; border-radius: 50%; object-fit: cover; }

    /* --- STOCK TABLE --- */
    .stock-table-container {
        background: #000; border: 1px solid #333; border-radius: 12px; overflow: hidden;
    }
    .table-stock { width: 100%; border-collapse: collapse; color: #fff; }
    .table-stock thead th {
        background: #111; color: #ccc; font-size: 0.8rem; padding: 15px; border-bottom: 2px solid #00f3ff; text-transform: uppercase;
    }
    .table-stock tbody tr { border-bottom: 1px solid #222; }
    .table-stock tbody tr:hover { background: #0a0a0a; }
    .table-stock td { padding: 15px; vertical-align: middle; }
    .stock-logo { width: 35px; height: 35px; object-fit: contain; background: #fff; padding: 2px; border-radius: 50%; margin-right: 12px; }

    /* --- CALCULATOR PANEL (PREVIOUS DESIGN) --- */
    .calc-panel {
        background: #050505; border: 1px solid #222; border-radius: 16px; padding: 30px;
        position: relative; overflow: hidden;
    }
    .calc-panel::before {
        content: ''; position: absolute; left:0; top:0; height:100%; width: 4px; background: #00f3ff;
    }
    .calc-input {
        background: #000; border: 1px solid #333; color: #fff; padding: 12px; width: 100%; border-radius: 8px; margin-bottom: 15px;
    }
    .calc-input:focus { outline: none; border-color: #00f3ff; }
    
    /* --- INFO BOXES (PREVIOUS DESIGN) --- */
    .info-box {
        background: #080808; border: 1px solid #222; padding: 20px; border-radius: 8px; height: 100%; transition: 0.3s;
    }
    .info-box:hover { border-color: #00f3ff; transform: translateY(-3px); }
    .info-title { color: #fff; font-weight: bold; margin-bottom: 10px; display: flex; align-items: center; gap: 10px; }
    .info-text { color: #888; font-size: 0.9rem; line-height: 1.6; }
</style>

<div class="text-center py-5" style="background: #000;">
    <div class="container" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white mb-2">GLOBAL <span style="color:#00f3ff">EQUITY</span></h1>
        <p class="text-secondary">Track the World's Biggest Companies.</p>
    </div>
</div>

<div class="container" data-aos="fade-up">
    <div class="filter-bar">
        <button class="filter-btn active" onclick="filterStocks('all', this)"><i class="fas fa-globe"></i> Global</button>
        <button class="filter-btn" onclick="filterStocks('usa', this)"><img src="https://flagcdn.com/w40/us.png" class="filter-flag"> USA</button>
        <button class="filter-btn" onclick="filterStocks('pk', this)"><img src="https://flagcdn.com/w40/pk.png" class="filter-flag"> Pakistan</button>
        <button class="filter-btn" onclick="filterStocks('uk', this)"><img src="https://flagcdn.com/w40/gb.png" class="filter-flag"> UK</button>
        <button class="filter-btn" onclick="filterStocks('de', this)"><img src="https://flagcdn.com/w40/de.png" class="filter-flag"> Germany</button>
        <button class="filter-btn" onclick="filterStocks('cn', this)"><img src="https://flagcdn.com/w40/cn.png" class="filter-flag"> China</button>
        <button class="filter-btn" onclick="filterStocks('jp', this)"><img src="https://flagcdn.com/w40/jp.png" class="filter-flag"> Japan</button>
        <button class="filter-btn" onclick="filterStocks('ca', this)"><img src="https://flagcdn.com/w40/ca.png" class="filter-flag"> Canada</button>
        <button class="filter-btn" onclick="filterStocks('sa', this)"><img src="https://flagcdn.com/w40/sa.png" class="filter-flag"> Saudi</button>
    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    <div class="stock-table-container">
        <div class="table-responsive">
            <table class="table-stock" id="stockTable">
                <thead>
                    <tr>
                        <th class="ps-4">Company</th>
                        <th>Share Price</th>
                        <th>Today's Change</th>
                        <th class="d-none d-md-table-cell">Market Cap</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($stocks as $stock): ?>
                        <tr class="stock-row" data-country="<?php echo $stock['country']; ?>">
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $stock['logo']; ?>" class="stock-logo">
                                    <div>
                                        <div class="fw-bold"><?php echo $stock['ticker']; ?></div>
                                        <div class="text-secondary small"><?php echo $stock['name']; ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="fw-bold">$<?php echo number_format($stock['price'], 2); ?></td>
                            <td class="<?php echo $stock['change'] >= 0 ? 'text-success' : 'text-danger'; ?>">
                                <?php echo $stock['change'] >= 0 ? '+' : ''; ?><?php echo $stock['change']; ?>%
                            </td>
                            <td class="d-none d-md-table-cell text-secondary"><?php echo $stock['cap']; ?></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-outline-info rounded-pill px-3" 
                                        onclick="fillCalculator('<?php echo $stock['name']; ?>', <?php echo $stock['price']; ?>)">
                                    Simulate
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="calc-panel h-100">
                <h4 class="text-white fw-bold mb-4">Investment <span style="color:#00f3ff">Simulator</span></h4>
                
                <label class="small text-secondary fw-bold mb-2">SELECTED STOCK</label>
                <input type="text" id="calcName" class="calc-input" value="Apple Inc." readonly>
                <input type="hidden" id="calcPrice" value="182.50">

                <label class="small text-secondary fw-bold mb-2">AMOUNT TO INVEST ($)</label>
                <input type="number" id="calcAmount" class="calc-input" value="1000" oninput="calculateProfit()">

                <label class="small text-secondary fw-bold mb-2">PROJECTED GROWTH (%)</label>
                <input type="range" id="calcGrowth" class="form-range" min="-50" max="50" value="10" oninput="calculateProfit()">
                <div class="text-end text-info small mb-3" id="growthLabel">+10% Growth</div>

                <div class="bg-black border border-secondary p-3 rounded text-center mt-3">
                    <small class="text-secondary text-uppercase">Projected Profit</small>
                    <div class="fs-3 fw-bold text-success" id="calcProfit">+$100.00</div>
                    <small class="text-secondary">Total Value: <span id="calcTotal" class="text-white">$1,100.00</span></small>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row g-3 h-100">
                <div class="col-12">
                    <div class="info-box">
                        <div class="info-title"><i class="fas fa-university text-warning"></i> What is a Share?</div>
                        <p class="info-text">
                            A share represents a unit of ownership in a company. When you buy a share of Apple, you essentially become a partial owner. If the company grows, the value of your share increases.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-box">
                        <div class="info-title"><i class="fas fa-chart-line text-success"></i> How do I profit?</div>
                        <p class="info-text">
                            <strong>1. Capital Appreciation:</strong> Buying a stock at $100 and selling it at $150 gives you a $50 profit.<br>
                            <strong>2. Dividends:</strong> Some companies (like Coca-Cola) pay you cash regularly just for holding their stock.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-box">
                        <div class="info-title"><i class="fas fa-exclamation-triangle text-danger"></i> Risks</div>
                        <p class="info-text">
                            Stock prices fluctuate daily. Unlike a bank deposit, your principal amount is not guaranteed. High reward comes with high risk.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function filterStocks(country, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        let rows = document.querySelectorAll('.stock-row');
        rows.forEach(row => {
            if (country === 'all' || row.dataset.country === country) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function fillCalculator(name, price) {
        document.getElementById('calcName').value = name;
        document.getElementById('calcPrice').value = price;
        calculateProfit();
        // Scroll to calculator
        document.querySelector('.calc-panel').scrollIntoView({behavior: 'smooth'});
    }

    function calculateProfit() {
        let amount = parseFloat(document.getElementById('calcAmount').value) || 0;
        let growth = parseFloat(document.getElementById('calcGrowth').value) || 0;
        let profit = amount * (growth / 100);
        let total = amount + profit;

        document.getElementById('growthLabel').innerText = (growth > 0 ? '+' : '') + growth + '% Growth';
        document.getElementById('growthLabel').className = 'text-end small mb-3 ' + (growth >= 0 ? 'text-success' : 'text-danger');
        document.getElementById('calcProfit').innerText = (profit >= 0 ? '+' : '') + '$' + profit.toFixed(2);
        document.getElementById('calcProfit').className = 'fs-3 fw-bold ' + (profit >= 0 ? 'text-success' : 'text-danger');
        document.getElementById('calcTotal').innerText = '$' + total.toFixed(2);
    }
    calculateProfit();
</script>
<div class="container mb-5" data-aos="fade-up">
    <div class="row g-4">
        
        <div class="col-lg-7">
            <div class="feature-panel" style="background: #050505; border: 1px solid #333; border-radius: 16px; padding: 35px; position: relative; overflow: hidden;">
                <div style="position: absolute; left: 0; top: 0; width: 4px; height: 100%; background: #00f3ff; box-shadow: 0 0 20px #00f3ff;"></div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="text-white fw-bold m-0">Trade <span style="color:#00f3ff">Simulator</span></h4>
                    <span class="badge bg-dark border border-secondary text-secondary">Real-Time Calc</span>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="small text-secondary fw-bold mb-2">ASSET</label>
                        <input type="text" id="simName" class="form-control bg-black text-white border-secondary p-3" value="Apple Inc." readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="small text-secondary fw-bold mb-2">BUY PRICE ($)</label>
                        <input type="number" id="simBuyPrice" class="form-control bg-black text-white border-secondary p-3 fw-bold" value="182.50" oninput="calculateTrade()">
                    </div>

                    <div class="col-md-12">
                        <label class="small text-secondary fw-bold mb-2">TOTAL INVESTMENT ($)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary text-white">$</span>
                            <input type="number" id="simInvestment" class="form-control bg-black text-white border-secondary p-3 fs-5 fw-bold" value="1000" oninput="calculateTrade()">
                        </div>
                        <div class="text-end mt-1">
                            <small class="text-info" id="simShares">Owning 5.47 Shares</small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <label class="small text-secondary fw-bold mb-2">TARGET SELL PRICE ($)</label>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-secondary text-white py-0" onclick="quickTarget(1.05)">+5%</button>
                                <button class="btn btn-outline-secondary text-white py-0" onclick="quickTarget(1.10)">+10%</button>
                                <button class="btn btn-outline-secondary text-white py-0" onclick="quickTarget(1.20)">+20%</button>
                            </div>
                        </div>
                        <input type="number" id="simSellPrice" class="form-control bg-black text-white border-secondary p-3 fw-bold" value="200.75" oninput="calculateTrade()">
                    </div>
                </div>

                <div id="resultBox" class="mt-4 p-4 rounded text-center border transition-all" style="background: rgba(0,255,136,0.05); border-color: rgba(0,255,136,0.3);">
                    <div class="row">
                        <div class="col-6 border-end border-secondary border-opacity-25">
                            <small class="text-secondary text-uppercase d-block mb-1">Total Profit / Loss</small>
                            <span id="simPnL" class="fs-2 fw-bold text-success">+$100.00</span>
                        </div>
                        <div class="col-6">
                            <small class="text-secondary text-uppercase d-block mb-1">Return on Investment</small>
                            <span id="simROI" class="fs-2 fw-bold text-success">10.00%</span>
                        </div>
                    </div>
                    <hr class="border-secondary opacity-25 my-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-white">Final Portfolio Value:</small>
                        <span id="simTotal" class="fs-4 fw-bold text-white">$1,100.00</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-5">
            <div class="feature-panel h-100" style="background: #080808; border: 1px solid #222; border-radius: 16px; padding: 30px;">
                <h5 class="text-white fw-bold mb-4"><i class="fas fa-lightbulb text-warning me-2"></i>Strategy Guide</h5>
                
                <div class="mb-4">
                    <h6 class="text-info fw-bold">1. Risk Management</h6>
                    <p class="text-secondary small">Never invest money you cannot afford to lose. Professional traders rarely risk more than 2% of their capital on a single trade.</p>
                </div>
                
                <div class="mb-4">
                    <h6 class="text-success fw-bold">2. The "Buy Low" Rule</h6>
                    <p class="text-secondary small">The goal is to buy an asset when it is undervalued (Red Days) and sell when it is overhyped (Green Days).</p>
                </div>

                <div class="p-3 rounded border border-secondary" style="background: #000;">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calculator fa-2x text-white me-3"></i>
                        <div>
                            <small class="text-secondary text-uppercase">Formula Used</small>
                            <div class="text-white fw-bold small">(Sell Price - Buy Price) × Shares</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // 1. LINK TO TABLE: When user clicks "Simulate" in the table above
    function fillCalculator(name, price) {
        document.getElementById('simName').value = name;
        document.getElementById('simBuyPrice').value = price;
        // Set default target to +10%
        document.getElementById('simSellPrice').value = (price * 1.10).toFixed(2);
        calculateTrade();
        
        // Scroll to simulator
        document.querySelector('.feature-panel').scrollIntoView({ behavior: 'smooth' });
    }

    // 2. QUICK PERCENTAGE BUTTONS
    function quickTarget(multiplier) {
        let buy = parseFloat(document.getElementById('simBuyPrice').value) || 0;
        document.getElementById('simSellPrice').value = (buy * multiplier).toFixed(2);
        calculateTrade();
    }

    // 3. MAIN CALCULATION LOGIC
    function calculateTrade() {
        // Get Inputs
        let investment = parseFloat(document.getElementById('simInvestment').value) || 0;
        let buyPrice = parseFloat(document.getElementById('simBuyPrice').value) || 1; // Avoid divide by zero
        let sellPrice = parseFloat(document.getElementById('simSellPrice').value) || 0;

        // Calculate Shares (You can't buy half a share usually, but we allow fractional for crypto logic)
        let shares = investment / buyPrice;
        
        // Update Shares Display
        document.getElementById('simShares').innerText = `Owning ${shares.toFixed(4)} Shares`;

        // Calculate Revenue
        let revenue = shares * sellPrice;
        let profit = revenue - investment;
        let roi = (profit / investment) * 100;

        // Update UI
        let pnlEl = document.getElementById('simPnL');
        let roiEl = document.getElementById('simROI');
        let boxEl = document.getElementById('resultBox');
        let totalEl = document.getElementById('simTotal');

        // FORMATTING: Check if Profit or Loss
        if (profit >= 0) {
            // GREEN THEME
            pnlEl.innerText = "+" + formatCurrency(profit);
            pnlEl.className = "fs-2 fw-bold text-success";
            roiEl.className = "fs-2 fw-bold text-success";
            boxEl.style.background = "rgba(0,255,136,0.05)";
            boxEl.style.borderColor = "rgba(0,255,136,0.3)";
        } else {
            // RED THEME
            pnlEl.innerText = formatCurrency(profit);
            pnlEl.className = "fs-2 fw-bold text-danger";
            roiEl.className = "fs-2 fw-bold text-danger";
            boxEl.style.background = "rgba(255, 77, 77, 0.05)";
            boxEl.style.borderColor = "rgba(255, 77, 77, 0.3)";
        }

        roiEl.innerText = roi.toFixed(2) + "%";
        totalEl.innerText = formatCurrency(revenue);
    }

    function formatCurrency(num) {
        return "$" + num.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }

    // Run on load
    calculateTrade();
</script><script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mb-5" data-aos="fade-up">
    <div class="feature-panel mb-4" style="background: #050505; border: 1px solid #222; border-radius: 16px; padding: 30px; position: relative; overflow: hidden;">
        
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 3px; background: linear-gradient(90deg, #000, #00f3ff, #000); box-shadow: 0 0 20px #00f3ff;"></div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="text-white fw-bold m-0">
                            <i class="fas fa-circle text-danger fa-fade me-2" style="font-size: 0.6rem;"></i>Live Market
                        </h4>
                        <small class="text-secondary" id="lastUpdate">Updating...</small>
                    </div>
                    <div class="text-end">
                        <h3 class="text-white fw-bold m-0" id="livePriceDisplay">$182.50</h3>
                        <small id="liveChangeDisplay" class="text-success fw-bold">+0.00%</small>
                    </div>
                </div>
                
                <div style="height: 350px; width: 100%;">
                    <canvas id="liveChart"></canvas>
                </div>
            </div>

            <div class="col-lg-4 border-start border-secondary border-opacity-25 ps-lg-4">
                <h5 class="text-white fw-bold mb-4">Session Stats</h5>

                <div class="mb-4">
                    <div class="d-flex justify-content-between text-secondary small mb-1">
                        <span>BEARISH</span>
                        <span>BULLISH</span>
                    </div>
                    <div class="progress" style="height: 6px; background: #222;">
                        <div id="sentimentBar" class="progress-bar" role="progressbar" style="width: 50%; background: linear-gradient(90deg, #ff4d4d, #00ff88); transition: width 0.5s;"></div>
                    </div>
                    <div id="sentimentText" class="text-end text-white small fw-bold mt-1">Neutral</div>
                </div>

                <div class="row g-2 mb-4">
                    <div class="col-6">
                        <div class="p-3 rounded text-center" style="background: #080808; border: 1px solid #333;">
                            <small class="text-secondary text-uppercase d-block">Session High</small>
                            <span id="dayHigh" class="text-success fw-bold fs-5">$182.50</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 rounded text-center" style="background: #080808; border: 1px solid #333;">
                            <small class="text-secondary text-uppercase d-block">Session Low</small>
                            <span id="dayLow" class="text-danger fw-bold fs-5">$182.50</span>
                        </div>
                    </div>
                </div>

                <div class="p-3 rounded d-flex align-items-center" style="background: rgba(0, 243, 255, 0.05); border: 1px solid rgba(0, 243, 255, 0.2);">
                    <i class="fas fa-bolt text-warning fs-3 me-3"></i>
                    <div>
                        <small class="text-secondary text-uppercase">Market Volatility</small>
                        <div class="text-white fw-bold fs-5">Active</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="p-4 h-100 rounded" style="background: #080808; border: 1px solid #222;">
                <h6 class="text-white fw-bold mb-2"><i class="fas fa-sync fa-spin text-info me-2"></i>Real-Time Feed</h6>
                <p class="text-secondary small mb-0">
                    The chart above simulates a live data feed (WebSocket). In a real app, this connects to NASDAQ servers to show price changes milliseconds after they happen.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 h-100 rounded" style="background: #080808; border: 1px solid #222;">
                <h6 class="text-white fw-bold mb-2"><i class="fas fa-chart-line text-success me-2"></i>Trend Lines</h6>
                <p class="text-secondary small mb-0">
                    Technical analysts use these moving lines to predict future price. If the line breaks the "High" ceiling, it's a breakout signal.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 h-100 rounded" style="background: #080808; border: 1px solid #222;">
                <h6 class="text-white fw-bold mb-2"><i class="fas fa-tachometer-alt text-warning me-2"></i>Volume Spikes</h6>
                <p class="text-secondary small mb-0">
                    Sudden jumps in the graph usually mean big institutions (banks/hedge funds) are buying or selling massive amounts of stock.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('liveChart').getContext('2d');
    
    // INITIAL DATA SETUP
    let currentPrice = 182.50;
    let high = currentPrice;
    let low = currentPrice;
    let startPrice = currentPrice;
    
    // Create initial empty arrays
    let dataPoints = [];
    let labels = [];
    for(let i=0; i<20; i++) {
        dataPoints.push(currentPrice);
        labels.push('');
    }

    // GRADIENT STYLE
    let gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(0, 243, 255, 0.2)');
    gradient.addColorStop(1, 'rgba(0, 243, 255, 0.0)');

    // INIT CHART
    let chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Live Price',
                data: dataPoints,
                borderColor: '#00f3ff',
                borderWidth: 2,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 0, // Hide points for smooth look
                pointHoverRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 0 }, // Disable initial animation for smoothness
            plugins: { legend: { display: false } },
            scales: {
                x: { display: false }, // Hide X axis
                y: { 
                    position: 'right',
                    grid: { color: '#222' },
                    ticks: { color: '#666' }
                }
            }
        }
    });

    // === THE LIVE TICKER FUNCTION ===
    setInterval(() => {
        // 1. GENERATE RANDOM MOVEMENT (-0.50 to +0.50)
        let change = (Math.random() - 0.5); 
        currentPrice += change;

        // Update High/Low
        if(currentPrice > high) high = currentPrice;
        if(currentPrice < low) low = currentPrice;

        // 2. UPDATE CHART DATA ARRAY
        // Remove oldest point
        chart.data.datasets[0].data.shift();
        // Add newest point
        chart.data.datasets[0].data.push(currentPrice);
        chart.update('none'); // Update without full re-render

        // 3. UPDATE DOM ELEMENTS
        document.getElementById('livePriceDisplay').innerText = '$' + currentPrice.toFixed(2);
        document.getElementById('dayHigh').innerText = '$' + high.toFixed(2);
        document.getElementById('dayLow').innerText = '$' + low.toFixed(2);

        // Update Percentage Color
        let totalChange = ((currentPrice - startPrice) / startPrice) * 100;
        let changeEl = document.getElementById('liveChangeDisplay');
        changeEl.innerText = (totalChange >= 0 ? '+' : '') + totalChange.toFixed(2) + '%';
        changeEl.className = totalChange >= 0 ? 'text-success fw-bold' : 'text-danger fw-bold';
        
        // Update Chart Color based on Trend
        chart.data.datasets[0].borderColor = totalChange >= 0 ? '#00ff88' : '#ff4d4d';

        // Update Sentiment Bar
        let sentiment = 50 + (totalChange * 10); // Simple logic
        if(sentiment > 100) sentiment = 100; if(sentiment < 0) sentiment = 0;
        document.getElementById('sentimentBar').style.width = sentiment + '%';
        document.getElementById('sentimentText').innerText = totalChange >= 0 ? 'Bullish' : 'Bearish';

        document.getElementById('lastUpdate').innerText = 'Last tick: ' + new Date().toLocaleTimeString();

    }, 2000); // RUN EVERY 2 SECONDS
});
</script>
<?php require_once '../includes/footer.php'; ?>