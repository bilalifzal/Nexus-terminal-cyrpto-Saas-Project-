<?php
// pages/portfolio.php
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// SIMULATED USER DATA
$user_balance = 14250.75;
$total_profit = 1250.50; // +9.6%

// SIMULATED HOLDINGS
$holdings = [
    ['asset' => 'Bitcoin', 'sym' => 'BTC', 'amount' => 0.15, 'value' => 7821.00, 'profit' => 12.5, 'icon' => 'https://assets.coingecko.com/coins/images/1/small/bitcoin.png'],
    ['asset' => 'Apple Inc', 'sym' => 'AAPL', 'amount' => 10, 'value' => 1825.00, 'profit' => 5.2, 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg'],
    ['asset' => 'Ethereum', 'sym' => 'ETH', 'amount' => 1.5, 'value' => 4425.00, 'profit' => -2.1, 'icon' => 'https://assets.coingecko.com/coins/images/279/small/ethereum.png'],
    ['asset' => 'Tether', 'sym' => 'USDT', 'amount' => 180, 'value' => 180.00, 'profit' => 0.0, 'icon' => 'https://assets.coingecko.com/coins/images/325/small/Tether-logo.png'],
];

$transactions = [
    ['type' => 'BUY', 'asset' => 'BTC', 'date' => 'Today, 10:30 AM', 'amount' => '$500.00', 'status' => 'Completed'],
    ['type' => 'SELL', 'asset' => 'TSLA', 'date' => 'Yesterday', 'amount' => '$1,200.00', 'status' => 'Completed'],
    ['type' => 'DEPOSIT', 'asset' => 'USD', 'date' => 'Oct 24, 2023', 'amount' => '$5,000.00', 'status' => 'Completed'],
];
?>

<style>
    body { background-color: #000; }

    /* --- BALANCE CARD --- */
    .balance-card {
        background: linear-gradient(135deg, #050505 0%, #111 100%);
        border: 1px solid #222; border-radius: 16px; padding: 30px;
        position: relative; overflow: hidden;
    }
    .balance-card::after {
        content: ''; position: absolute; top: 0; right: 0; width: 150px; height: 150px;
        background: radial-gradient(circle, rgba(0, 243, 255, 0.1) 0%, transparent 70%);
    }

    /* --- ASSET TABLE --- */
    .holdings-card {
        background: #080808; border: 1px solid #222; border-radius: 12px; overflow: hidden;
    }
    .holdings-table { width: 100%; color: #fff; }
    .holdings-table th { background: #111; color: #666; font-size: 0.75rem; text-transform: uppercase; padding: 15px 20px; }
    .holdings-table td { padding: 15px 20px; border-bottom: 1px solid #1a1a1a; vertical-align: middle; }
    .holdings-table tr:last-child td { border-bottom: none; }
    
    .asset-icon { width: 32px; height: 32px; border-radius: 50%; margin-right: 12px; padding: 2px; background: #fff; }

    /* --- SIDEBAR WIDGETS --- */
    .widget-card {
        background: #080808; border: 1px solid #222; border-radius: 12px; padding: 20px; margin-bottom: 20px;
    }

    .tx-item {
        display: flex; justify-content: space-between; align-items: center; padding: 12px 0; border-bottom: 1px solid #222;
    }
    .tx-item:last-child { border-bottom: none; }
    
    .tx-icon {
        width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-size: 0.8rem; margin-right: 12px;
    }
    .icon-buy { background: rgba(0, 255, 136, 0.1); color: #00ff88; }
    .icon-sell { background: rgba(255, 77, 77, 0.1); color: #ff4d4d; }
    .icon-dep { background: rgba(0, 243, 255, 0.1); color: #00f3ff; }

</style>

<div class="text-center py-5" style="background: #000;">
    <div class="container" data-aos="fade-down">
        <h1 class="display-4 fw-bold text-white mb-2">MY <span style="color:#00f3ff">PORTFOLIO</span></h1>
        <p class="text-secondary">Welcome back, <span class="text-white fw-bold">Muhammad</span>.</p>
    </div>
</div>

<div class="container mb-5" data-aos="fade-up">
    <div class="row g-4">
        
        <div class="col-lg-8">
            
            <div class="balance-card mb-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <small class="text-secondary text-uppercase fw-bold letter-spacing-1">Total Net Worth</small>
                        <h1 class="display-4 fw-bold text-white mt-2 mb-0">$<?php echo number_format($user_balance, 2); ?></h1>
                        <div class="mt-2">
                            <span class="badge bg-success bg-opacity-25 text-success border border-success px-2 py-1">
                                <i class="fas fa-arrow-up me-1"></i> +$<?php echo number_format($total_profit, 2); ?> (Today)
                            </span>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-info fw-bold px-4 rounded-pill mb-2 d-block w-100">Deposit</button>
                        <button class="btn btn-outline-secondary text-white fw-bold px-4 rounded-pill d-block w-100">Withdraw</button>
                    </div>
                </div>
            </div>

            <h5 class="text-white fw-bold mb-3"><i class="fas fa-wallet text-info me-2"></i>My Assets</h5>
            <div class="holdings-card">
                <div class="table-responsive">
                    <table class="holdings-table">
                        <thead>
                            <tr>
                                <th>Asset</th>
                                <th class="text-end">Balance</th>
                                <th class="text-end">Value (USD)</th>
                                <th class="text-end">Profit/Loss</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($holdings as $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo $item['icon']; ?>" class="asset-icon">
                                        <div>
                                            <div class="fw-bold text-white"><?php echo $item['asset']; ?></div>
                                            <div class="small text-secondary"><?php echo $item['sym']; ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="text-white fw-bold"><?php echo $item['amount']; ?> <?php echo $item['sym']; ?></div>
                                </td>
                                <td class="text-end">
                                    <div class="text-white fw-bold">$<?php echo number_format($item['value'], 2); ?></div>
                                </td>
                                <td class="text-end">
                                    <span class="<?php echo $item['profit'] >= 0 ? 'text-success' : 'text-danger'; ?> fw-bold">
                                        <?php echo $item['profit'] > 0 ? '+' : ''; ?><?php echo $item['profit']; ?>%
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            
            <div class="widget-card">
                <h6 class="text-white fw-bold mb-3">Asset Allocation</h6>
                <div style="height: 200px;">
                    <canvas id="allocationChart"></canvas>
                </div>
                <div class="text-center mt-3 small text-secondary">
                    <span class="text-info me-2">● Crypto</span>
                    <span class="text-warning me-2">● Stocks</span>
                    <span class="text-secondary">● Cash</span>
                </div>
            </div>

            <div class="widget-card">
                <h6 class="text-white fw-bold mb-3">Recent Activity</h6>
                
                <?php foreach($transactions as $tx): ?>
                    <?php 
                        $iconClass = 'icon-buy'; 
                        $icon = 'fa-arrow-down';
                        if($tx['type'] == 'SELL') { $iconClass = 'icon-sell'; $icon = 'fa-arrow-up'; }
                        if($tx['type'] == 'DEPOSIT') { $iconClass = 'icon-dep'; $icon = 'fa-plus'; }
                    ?>
                    <div class="tx-item">
                        <div class="d-flex align-items-center">
                            <div class="tx-icon <?php echo $iconClass; ?>">
                                <i class="fas <?php echo $icon; ?>"></i>
                            </div>
                            <div>
                                <div class="text-white fw-bold small"><?php echo $tx['type']; ?> <?php echo $tx['asset']; ?></div>
                                <div class="text-secondary" style="font-size: 0.7rem;"><?php echo $tx['date']; ?></div>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="text-white fw-bold small"><?php echo $tx['amount']; ?></div>
                            <div class="text-success" style="font-size: 0.7rem;"><?php echo $tx['status']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <a href="#" class="btn btn-sm btn-outline-secondary text-white w-100 mt-3">View Full History</a>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('allocationChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Crypto', 'Stocks', 'Cash'],
            datasets: [{
                data: [55, 30, 15],
                backgroundColor: ['#00f3ff', '#f1c40f', '#333'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            cutout: '70%'
        }
    });
</script>

<?php require_once '../includes/footer.php'; ?>