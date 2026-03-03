<?php
// pages/crypto.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// 1. LIMIT CONTROL
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 15;

// 2. LIVE DATA FETCH
$api_url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=$limit&page=1&sparkline=false";

$coins = [];
if (function_exists('fetchData')) {
    $data = fetchData($api_url);
    if ($data && is_array($data)) {
        $coins = $data;
    }
}
?>

<style>
    /* GLOBAL BLACK THEME */
    body { background-color: #000000; }

    /* 1. CHART CONTAINER (HIGHER HEIGHT) */
    .chart-container {
        height: 650px; /* Made much taller as requested */
        background: #000; border: 1px solid #333; border-radius: 8px; overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 0 40px rgba(0, 243, 255, 0.05);
    }

    /* 2. STATS CARDS */
    .stats-card {
        background: #080808; border: 1px solid #222; padding: 25px; 
        border-radius: 12px; height: 100%; position: relative; overflow: hidden;
        transition: 0.3s;
    }
    .stats-card:hover { transform: translateY(-5px); border-color: #00f3ff; }
    .stats-label { color: #666; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
    .stats-val { color: #fff; font-size: 1.8rem; font-weight: 700; margin-top: 5px; font-family: 'Space Grotesk', sans-serif; }

    /* 3. TABLE STYLES */
    .market-table-container { background-color: #000; border: 1px solid #222; border-radius: 12px; overflow: hidden; }
    .table-dark-mode { width: 100%; border-collapse: collapse; color: #fff; background-color: #000; }
    .table-dark-mode th {
        background-color: #0a0a0a; color: #888; font-size: 0.8rem; text-transform: uppercase;
        padding: 20px; border-bottom: 2px solid #00f3ff; letter-spacing: 1px;
    }
    .table-dark-mode td { padding: 20px; vertical-align: middle; border-bottom: 1px solid #1a1a1a; }
    .table-dark-mode tr:hover { background-color: #0c0c0c; }

    /* 4. SEARCH & INPUTS */
    .elegant-input {
        background: #050505; border: 1px solid #333; color: #fff; padding: 15px 15px 15px 45px;
        border-radius: 50px; width: 100%; transition: 0.3s;
    }
    .elegant-input:focus { outline: none; border-color: #00f3ff; box-shadow: 0 0 20px rgba(0, 243, 255, 0.2); }
    .search-icon { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #666; }
    .limit-select { background: #050505; color: #fff; border: 1px solid #333; padding: 15px; border-radius: 50px; cursor: pointer; }

    /* 5. QUICK CONVERTER BOX */
    .crypto-convert-box {
        background: #080808; border: 1px solid #222; border-radius: 12px; padding: 25px; height: 100%;
    }
    .convert-input {
        background: #000; border: 1px solid #333; color: #fff; padding: 10px; border-radius: 6px; width: 100%; margin-bottom: 10px;
    }

</style>

<div class="text-center py-5" style="background: #000;">
    <div class="container-fluid px-4" data-aos="fade-down">
        
        <h1 class="display-4 fw-bold text-white mb-2">PRO <span style="color:#00f3ff">TERMINAL</span></h1>
        <p class="text-secondary mb-5">Real-Time Global Market Analysis</p>
        
        <div class="row g-4 mb-4 text-start">
            
            <div class="col-md-3">
                <div class="stats-card">
                    <span class="stats-label"><i class="fas fa-globe me-2"></i>Global Cap</span>
                    <div class="stats-val">$2.45 T</div>
                    <div class="text-success small fw-bold mt-2"><i class="fas fa-arrow-up"></i> 1.2% (24h)</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card">
                    <span class="stats-label"><i class="fab fa-bitcoin me-2"></i>BTC Dominance</span>
                    <div class="stats-val text-warning">52.8%</div>
                    <div class="progress mt-3" style="height: 4px; background: #222;">
                        <div class="progress-bar bg-warning" style="width: 52.8%"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card">
                    <span class="stats-label"><i class="fas fa-thermometer-half me-2"></i>Sentiment</span>
                    <div class="stats-val text-success">74</div>
                    <small class="text-secondary">Greed / Bullish</small>
                </div>
            </div>

            <div class="col-md-3">
                <div class="crypto-convert-box">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-white fw-bold small">Quick Calculator</span>
                        <i class="fas fa-calculator text-info"></i>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="number" class="convert-input" placeholder="1">
                        <span class="text-white align-self-center fw-bold">BTC</span>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="text" class="convert-input" value="52,140" readonly>
                        <span class="text-white align-self-center fw-bold">USD</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row g-4 mb-5">
            
            <div class="col-lg-8">
                <div class="chart-container">
                    <div class="tradingview-widget-container" style="height:100%;width:100%">
                        <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                        {
                        "autosize": true,
                        "symbol": "BINANCE:BTCUSDT",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "enable_publishing": false,
                        "hide_side_toolbar": false,
                        "allow_symbol_change": true,
                        "details": true,
                        "calendar": false,
                        "support_host": "https://www.tradingview.com"
                        }
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="chart-container" style="height: 650px; border-color: #222;">
                    <div class="tradingview-widget-container" style="height:100%;width:100%">
                        <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                        {
                        "interval": "1m",
                        "width": "100%",
                        "isTransparent": true,
                        "height": "100%",
                        "symbol": "BINANCE:BTCUSDT",
                        "showIntervalTabs": true,
                        "displayMode": "single",
                        "locale": "en",
                        "colorTheme": "dark"
                        }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center g-3 mb-4">
            <div class="col-md-5 position-relative">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="coinSearch" onkeyup="filterTable()" 
                       class="elegant-input" 
                       placeholder="FILTER ASSETS...">
            </div>
            <div class="col-md-2">
                <form action="" method="GET">
                    <select name="limit" class="limit-select w-100" onchange="this.form.submit()">
                        <option value="15" <?php if($limit == 15) echo 'selected'; ?>>Show 15</option>
                        <option value="30" <?php if($limit == 30) echo 'selected'; ?>>Show 30</option>
                        <option value="50" <?php if($limit == 50) echo 'selected'; ?>>Show 50</option>
                    </select>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    <div class="market-table-container">
        <div class="table-responsive">
            <table class="table-dark-mode" id="marketTable">
                <thead>
                    <tr>
                        <th class="ps-4">Asset Name</th>
                        <th>Price</th>
                        <th>24h Change</th>
                        <th class="d-none d-md-table-cell">Market Cap</th>
                        <th class="d-none d-lg-table-cell">24h Volume</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($coins)): ?>
                        <?php foreach($coins as $coin): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo $coin['image']; ?>" width="35" class="me-3 rounded-circle border border-secondary">
                                        <div>
                                            <span class="fw-bold fs-6 d-block text-white"><?php echo $coin['name']; ?></span>
                                            <span class="text-secondary small fw-bold"><?php echo strtoupper($coin['symbol']); ?></span>
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="fw-bold fs-6">$<?php echo number_format($coin['current_price'], 2); ?></td>
                                
                                <?php 
                                    $change = $coin['price_change_percentage_24h']; 
                                    $colorClass = $change >= 0 ? 'text-success' : 'text-danger';
                                    $arrow = $change >= 0 ? 'up' : 'down';
                                ?>
                                <td class="<?php echo $colorClass; ?> fw-bold">
                                    <i class="fas fa-caret-<?php echo $arrow; ?> me-1"></i>
                                    <?php echo number_format(abs($change), 2); ?>%
                                </td>
                                
                                <td class="d-none d-md-table-cell text-secondary">
                                    $<?php echo number_format($coin['market_cap'] / 1000000000, 2); ?>B
                                </td>
                                <td class="d-none d-lg-table-cell text-secondary">
                                    $<?php echo number_format($coin['total_volume'] / 1000000, 2); ?>M
                                </td>
                                
                                <td class="text-end pe-4">
                              <?php 
 
    $isPos = $coin['price_change_percentage_24h'] >= 0 ? 'true' : 'false';
    $priceFmt = "$" . number_format($coin['current_price'], 2);
    $changeFmt = number_format(abs($coin['price_change_percentage_24h']), 2) . "%";
    $sym = strtoupper($coin['symbol']);
?>
<button class="btn btn-sm btn-outline-info rounded-pill px-3" 
        onclick="addToWatchlist('<?php echo $sym; ?>', '<?php echo $priceFmt; ?>', '<?php echo $changeFmt; ?>', <?php echo $isPos; ?>)">
    <i class="fas fa-star"></i> Watch
</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-circle-notch fa-spin fa-2x mb-3 text-info"></i><br>
                                <span class="text-secondary">Connecting to Exchange...</span>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        let input = document.getElementById("coinSearch");
        let filter = input.value.toUpperCase();
        let table = document.getElementById("marketTable");
        let tr = table.getElementsByTagName("tr");
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                let txtValue = td.textContent || td.innerText;
                tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
            }
        }
    }
</script>

<?php require_once '../includes/footer.php'; ?>