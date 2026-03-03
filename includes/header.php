<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoPro | Trade Terminal</title>
    <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/12378/12378072.png">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        
        body { font-family: 'Inter', sans-serif; background-color: #000; color: #fff; overflow-x: hidden; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Space Grotesk', sans-serif; }
        
      
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #000; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00f3ff; }

       
        .navbar-custom {
            background: rgba(0, 0, 0, 0.9); backdrop-filter: blur(20px);
            border-bottom: 1px solid #222; padding: 15px 0; position: sticky; top: 0; z-index: 1000;
        }
        .nav-link { font-size: 0.9rem; margin: 0 10px; transition: 0.3s; color: #aaa !important; text-transform: uppercase; letter-spacing: 1px; font-weight: 500; }
        .nav-link:hover, .nav-link.active-page { color: #00f3ff !important; text-shadow: 0 0 10px rgba(0, 243, 255, 0.4); }
        .navbar-brand { font-family: 'Space Grotesk', sans-serif; font-weight: 700; letter-spacing: -1px; font-size: 1.5rem; }

       
        .watchlist-sidebar {
            background: #0a0a0a; border-left: 1px solid #333; width: 320px !important;
        }
        .watchlist-header { border-bottom: 1px solid #222; padding: 20px; }
        .watch-item {
            padding: 15px 20px; border-bottom: 1px solid #1a1a1a; transition: 0.2s; display: flex; justify-content: space-between; align-items: center;
        }
        .watch-item:hover { background: #111; }
        .watch-price { font-weight: 700; font-family: 'Space Grotesk', sans-serif; }
        
        
        .btn-watchlist {
            border: 1px solid #333; color: #fff; border-radius: 50px; padding: 5px 15px; font-size: 0.85rem; transition: 0.3s;
        }
        .btn-watchlist:hover { border-color: #ffd700; color: #ffd700; background: rgba(255, 215, 0, 0.1); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
<a class="navbar-brand fw-bold" href="../public/index.php">
   
    
    NEXUS<span style="color:#00f3ff">TERMINAL</span>
</a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="../public/index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/crypto.php">Crypto</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/stocks.php">Stocks</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/news.php">News</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/calendar.php">Calendar</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/converter.php">Converter</a></li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-watchlist" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWatchlist">
                    <i class="fas fa-star me-2"></i> Watchlist
                </button>
                
                <a href="../pages/about.php" class="nav-link text-blue" style="text-transform: none;"><i class="fas fa-user-circle fa-lg"></i>Developer</a>
            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end watchlist-sidebar" tabindex="-1" id="offcanvasWatchlist">
    <div class="watchlist-header d-flex justify-content-between align-items-center">
        <h5 class="offcanvas-title text-white fw-bold"><i class="fas fa-star text-warning me-2"></i>Favorites</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="watch-item">
            <div>
                <span class="d-block fw-bold text-white">Bitcoin</span>
                <span class="small text-secondary">BTC/USD</span>
            </div>
            <div class="text-end">
                <div class="watch-price text-white">$52,140</div>
                <small class="text-success">+2.4%</small>
            </div>
        </div>
        <div class="watch-item">
            <div>
                <span class="d-block fw-bold text-white">Ethereum</span>
                <span class="small text-secondary">ETH/USD</span>
            </div>
            <div class="text-end">
                <div class="watch-price text-white">$2,950</div>
                <small class="text-success">+1.8%</small>
            </div>
        </div>
        <div class="watch-item">
            <div>
                <span class="d-block fw-bold text-white">Tesla</span>
                <span class="small text-secondary">TSLA</span>
            </div>
            <div class="text-end">
                <div class="watch-price text-white">$198.20</div>
                <small class="text-danger">-0.5%</small>
            </div>
        </div>
        <div class="watch-item">
            <div>
                <span class="d-block fw-bold text-white">Gold</span>
                <span class="small text-secondary">XAU/USD</span>
            </div>
            <div class="text-end">
                <div class="watch-price text-white">$2,035</div>
                <small class="text-success">+0.8%</small>
            </div>
        </div>
        <div class="watch-item">
            <div>
                <span class="d-block fw-bold text-white">Nvidia</span>
                <span class="small text-secondary">NVDA</span>
            </div>
            <div class="text-end">
                <div class="watch-price text-white">$785.00</div>
                <small class="text-success">+3.2%</small>
            </div>
        </div>

        <div class="p-4 text-center mt-3">
            <button class="btn btn-outline-info w-100 rounded-pill small">Manage List</button>
        </div>
    </div>
</div>