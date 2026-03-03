<?php
// pages/calendar.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// === MANUAL DATA FOR CLASSIC SECTION ===
$rates = [
    ['bank'=>'Federal Reserve', 'flag'=>'us', 'rate'=>'5.50%', 'bias'=>'Neutral'],
    ['bank'=>'ECB (Europe)', 'flag'=>'eu', 'rate'=>'4.50%', 'bias'=>'Hawkish'],
    ['bank'=>'Bank of England', 'flag'=>'gb', 'rate'=>'5.25%', 'bias'=>'Hawkish'],
    ['bank'=>'Bank of Japan', 'flag'=>'jp', 'rate'=>'-0.10%', 'bias'=>'Dovish']
];

$classic_feed = [
    ['date'=>'2026-02-01', 'time'=>'08:30', 'ccy'=>'USD', 'evt'=>'Avg Hourly Earnings m/m', 'imp'=>'MED'],
    ['date'=>'2026-02-01', 'time'=>'08:30', 'ccy'=>'USD', 'evt'=>'Non-Farm Employment Change', 'imp'=>'HIGH'],
    ['date'=>'2026-02-01', 'time'=>'08:30', 'ccy'=>'USD', 'evt'=>'Unemployment Rate', 'imp'=>'HIGH'],
    ['date'=>'2026-02-01', 'time'=>'10:00', 'ccy'=>'USD', 'evt'=>'ISM Manufacturing PMI', 'imp'=>'HIGH'],
    ['date'=>'2026-02-02', 'time'=>'03:30', 'ccy'=>'AUD', 'evt'=>'Cash Rate', 'imp'=>'HIGH'],
    ['date'=>'2026-02-02', 'time'=>'03:30', 'ccy'=>'AUD', 'evt'=>'RBA Rate Statement', 'imp'=>'HIGH']
];
?>

<style>
    body { background-color: #000; }

    /* --- 1. TICKER TAPE (CLASSIC) --- */
    .ticker-wrap {
        width: 100%; overflow: hidden; background: #000; border-bottom: 1px solid #222; 
        white-space: nowrap; padding: 10px 0; font-family: 'Courier New', monospace; font-size: 0.85rem;
    }
    .ticker-move { display: inline-block; animation: ticker 35s linear infinite; }
    .ticker-item { display: inline-block; padding: 0 2rem; color: #00ff88; font-weight: 600; }
    @keyframes ticker { 0% { transform: translate3d(0, 0, 0); } 100% { transform: translate3d(-100%, 0, 0); } }

    /* --- 2. EXISTING HERO STYLES --- */
    .cal-hero {
        padding: 80px 0;
        background: radial-gradient(circle at center, #111 0%, #000 100%);
        border-bottom: 1px solid #222;
    }

    /* --- 3. WIDGET CONTAINER --- */
    .calendar-container {
        height: 800px;
        background: #000; border: 1px solid #333; border-radius: 12px; overflow: hidden;
        box-shadow: 0 0 50px rgba(0, 243, 255, 0.05); margin-bottom: 50px;
    }

    /* --- 4. CLASSIC TERMINAL STYLES (ADDED) --- */
    .classic-panel {
        background: #050505; border: 1px solid #222; border-radius: 16px; padding: 25px;
        position: relative; overflow: hidden; margin-bottom: 30px;
    }
    .classic-panel::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 3px;
        background: linear-gradient(90deg, #ff4d4d, #00f3ff);
    }
    
    .countdown-box {
        background: #080808; border: 1px solid #333; padding: 20px; border-radius: 12px;
        display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;
    }
    .timer-digit {
        font-family: 'Space Grotesk'; font-size: 1.5rem; font-weight: 700; color: #fff;
        background: #111; padding: 5px 15px; border-radius: 6px; border: 1px solid #222;
    }

    /* Raw Feed Table */
    .classic-feed-container {
        font-family: 'Courier New', monospace; background: #000; border: 1px solid #333;
    }
    .classic-table { width: 100%; border-collapse: collapse; }
    .classic-table th { 
        background: #111; color: #00f3ff; text-align: left; padding: 10px; 
        border-bottom: 1px solid #00f3ff; text-transform: uppercase; font-size: 0.8rem;
    }
    .classic-table td {
        padding: 8px 10px; border-bottom: 1px solid #222; color: #ccc; font-size: 0.85rem;
    }
    .classic-table tr:hover td { background: #080808; color: #fff; }
    
    .classic-imp-high { color: #ff4d4d; font-weight: bold; }
    .classic-imp-med { color: #ffd700; }
</style>

<div class="ticker-wrap">
    <div class="ticker-move">
        <span class="ticker-item">NFP COUNTDOWN: 04:12:45</span>
        <span class="ticker-item">FED RATE: 5.50% (HOLD)</span>
        <span class="ticker-item">ECB RATE: 4.50% (HAWKISH)</span>
        <span class="ticker-item">BOJ RATE: -0.10% (DOVISH)</span>
        <span class="ticker-item">CPI INFLATION: 3.1% (YOY)</span>
    </div>
</div>

<div class="cal-hero text-center">
    <div class="container" data-aos="fade-down">
        <span class="badge bg-dark border border-secondary text-secondary mb-3 px-3 py-2 rounded-pill letter-spacing-1">
            <i class="fas fa-globe me-2"></i> GLOBAL MACRO DATA
        </span>
        <h1 class="display-4 fw-bold text-white mb-2">ECONOMIC <span style="color:#00f3ff">CALENDAR</span></h1>
        <p class="text-secondary mx-auto" style="max-width: 600px;">
            Track key financial events, interest rate decisions, and GDP releases that move the markets in real-time.
        </p>
    </div>
</div>

<div class="container my-5" data-aos="fade-up">
    
    <div class="calendar-container">
        <div class="tradingview-widget-container" style="height:100%;width:100%">
            <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
            {
            "colorTheme": "dark",
            "isTransparent": true,
            "width": "100%",
            "height": "100%",
            "locale": "en",
            "importanceFilter": "-1,0,1",
            "currencyFilter": "USD,EUR,GBP,JPY,AUD,CAD"
            }
            </script>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="countdown-box">
                <div>
                    <span class="badge bg-danger mb-2">NEXT BIG EVENT</span>
                    <h5 class="text-white fw-bold m-0">Non-Farm Payrolls (NFP)</h5>
                </div>
                <div class="d-flex gap-2">
                    <div class="timer-digit">04</div><span class="fs-4 text-secondary">:</span>
                    <div class="timer-digit">12</div><span class="fs-4 text-secondary">:</span>
                    <div class="timer-digit text-danger">45</div>
                </div>
            </div>

            <div class="classic-feed-container">
                <div class="p-2 border-bottom border-secondary bg-dark text-white fw-bold">
                    <i class="fas fa-terminal me-2 text-success"></i>RAW DATA FEED
                </div>
                <div class="table-responsive">
                    <table class="classic-table">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>CCY</th>
                                <th>EVENT</th>
                                <th>IMPACT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($classic_feed as $cf): 
                                $impColor = ($cf['imp'] == 'HIGH') ? 'classic-imp-high' : 'classic-imp-med';
                            ?>
                            <tr>
                                <td><?php echo $cf['date']; ?></td>
                                <td><?php echo $cf['time']; ?></td>
                                <td style="color:#00f3ff; font-weight:bold;"><?php echo $cf['ccy']; ?></td>
                                <td><?php echo $cf['evt']; ?></td>
                                <td class="<?php echo $impColor; ?>">[<?php echo $cf['imp']; ?>]</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="classic-panel">
                <h6 class="text-white fw-bold mb-4"><i class="fas fa-university text-warning me-2"></i>BANK RATES</h6>
                <?php foreach($rates as $r): ?>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-secondary border-opacity-25">
                    <div class="d-flex align-items-center">
                        <img src="https://flagcdn.com/w40/<?php echo $r['flag']; ?>.png" class="rounded-circle border border-secondary me-3" width="30">
                        <div>
                            <span class="d-block text-white fw-bold small"><?php echo $r['bank']; ?></span>
                            <span class="text-secondary" style="font-size:0.7rem;">Bias: <?php echo $r['bias']; ?></span>
                        </div>
                    </div>
                    <div class="text-end"><span class="d-block text-info fw-bold"><?php echo $r['rate']; ?></span></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<div class="container mb-5">
    <div class="row g-4">
        <div class="col-md-4" data-aos="fade-right">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100">
                <i class="fas fa-university fa-2x text-warning mb-3"></i>
                <h5 class="text-white fw-bold">Central Bank Rates</h5>
                <p class="text-secondary small mb-0">Monitor Fed, ECB, and BOJ interest rate decisions that impact currency values.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-up">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100">
                <i class="fas fa-users fa-2x text-info mb-3"></i>
                <h5 class="text-white fw-bold">Employment Data</h5>
                <p class="text-secondary small mb-0">Track Non-Farm Payrolls (NFP) and unemployment stats affecting the USD.</p>
            </div>
        </div>
        <div class="col-md-4" data-aos="fade-left">
            <div class="p-4 border border-secondary border-opacity-25 rounded bg-dark h-100">
                <i class="fas fa-industry fa-2x text-success mb-3"></i>
                <h5 class="text-white fw-bold">GDP & Inflation</h5>
                <p class="text-secondary small mb-0">CPI and GDP reports that signal economic health and recession risks.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>