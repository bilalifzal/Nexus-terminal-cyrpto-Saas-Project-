
# CryptoPro | Advanced Financial Terminal 🚀

**Architected by Muhammad Bilal Ifzal** *Full Stack Web Application for Real-Time Market Intelligence*



<div align="center">

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue)](https://www.php.net/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)](https://getbootstrap.com/)
[![Status](https://img.shields.io/badge/Status-Active-brightgreen)]()
![Project Status](https://img.shields.io/badge/Status-Completed-success)
![Version](https://img.shields.io/badge/Version-2.0.0-blue)
![License](https://img.shields.io/badge/License-MIT-green)

*A cutting-edge financial trading platform combining institutional-grade market analysis with retail accessibility.*

[Live Demo](#-live-demo) • [Features](#-features) • [Installation](#-installation) • [Documentation](#-documentation) • [Support](#-support)

</div>

---

## 📋 Table of Contents

- [Overview](#overview)
- [✨ Features](#-features)
- [🎯 Live Demo](#-live-demo)
- [🛠️ Tech Stack](#️-tech-stack)
- [📁 Project Structure](#-project-structure)
- [⚡ Installation Guide](#-installation-guide)
- [🔧 Configuration](#-configuration)
- [📖 Usage Guide](#-usage-guide)
- [🌐 API Integration](#-api-integration)
- [💾 Database Setup](#-database-setup)
- [🎨 Design System](#-design-system)
- [🤝 Contributing](#-contributing)
- [📝 License](#-license)
- [👨‍💻 Author](#-author)

---

## Overview

**CryptoPro** is a comprehensive financial trading terminal that brings institutional-grade market analysis tools to retail traders. Built with modern web technologies, it provides real-time cryptocurrency prices, stock market data, economic calendar updates, and AI-powered market insights.

This project demonstrates full-stack web development expertise with responsive design, API integration, and advanced UI/UX patterns perfect for a portfolio showcase.

### Why CryptoPro?

✅ **Real-Time Data** - Live market feeds via CoinGecko & TradingView APIs  
✅ **Professional Interface** - Glassmorphism design with smooth animations  
✅ **Feature Rich** - 10+ fully functional modules  
✅ **Responsive Design** - Mobile-first approach  
✅ **Educational** - Clean, well-documented code  
✅ **Extensible** - Easy to customize and extend  

---

## ✨ Features

### 📊 Core Modules

| Module | Description |
|--------|-------------|
| **🪙 Crypto Terminal** | Real-time Bitcoin, Ethereum & 50+ cryptocurrencies with live charts |
| **📈 Stock Market** | Global equity data, technical analysis, and market trends |
| **📰 Global News** | Mixed crypto & forex news feed with sentiment analysis |
| **📅 Economic Calendar** | Central bank decisions, economic indicators, NFP releases |
| **💱 Converter** | Multi-currency conversion with real-time rates |
| **💼 Portfolio Manager** | Track holdings, calculate P&L, asset allocation charts |
| **🤖 AI Assistant** | Intelligent chatbot for market queries & analysis |
| **⭐ Watchlist System** | LocalStorage-based favorites with localStorage persistence |

### 🎯 Key Features

- **Live Market Charts** - TradingView integration for professional candlestick charts
- **Advanced Search** - Filter & search across 15,000+ assets in real-time
- **Technical Analysis** - RSI, MACD, Moving Averages built-in
- **Responsive Dashboard** - Works seamlessly on desktop, tablet, and mobile
- **Secure Authentication** - User login/registration system ready
- **Contact Form** - Database-backed inquiry system
- **Dark Mode** - Cyberpunk aesthetic with cyan accents
- **Smooth Animations** - AOS (Animate on Scroll) throughout
- **Developer Bio** - Interactive about page with typing effect

---

## 🎯 Live Demo

**Website:** [https://nexuxcyrpto.wuaze.com/](https://nexuxcyrpto.wuaze.com/)

### Demo Credentials
```
Email: demo@example.com
Password: DemoPass123!
```

### Quick Navigation
- Dashboard: `/public/index.php`
- Crypto Markets: `/pages/crypto.php`
- Stock Markets: `/pages/stocks.php`
- Economic Calendar: `/pages/calendar.php`
- News Feed: `/pages/news.php`
- Portfolio: `/pages/portfolio.php`

---

## 🛠️ Tech Stack

### Frontend
```
- HTML5 / CSS3 / JavaScript (Vanilla)
- Bootstrap 5.3.0 (CSS Framework)
- Font Awesome 6.4.0 (Icons)
- AOS 2.3.1 (Scroll Animations)
- Chart.js (Doughnut/Pie Charts)
- TradingView Widgets (Advanced Charts)
```

### Backend
```
- PHP 8.2+
- MySQL/MariaDB (Optional)
- PDO (Database Abstraction)
- RESTful API Integration
```

### APIs & Services
```
- CoinGecko API (Crypto Data)
- CryptoCompare API (News Feed)
- TradingView Widgets (Charts)
- OpenWeather API (Optional Enhancement)
```

### Development Tools
```
- Git & GitHub
- VS Code / PhpStorm
- XAMPP / LAMP Server
- Postman (API Testing)
```

---

## 📁 Project Structure

```
nexus-terminal/
│
├── public/
│   └── index.php              # Landing dashboard
│
├── pages/
│   ├── crypto.php             # Cryptocurrency terminal
│   ├── stocks.php             # Stock market analysis
│   ├── news.php               # Global news feed
│   ├── calendar.php           # Economic calendar
│   ├── converter.php          # Currency converter
│   ├── portfolio.php          # Portfolio manager
│   ├── login.php              # User authentication
│   ├── register.php           # Account creation
│   ├── about.php              # Developer profile
│   └── contact.php            # Contact form
│
├── includes/
│   ├── header.php             # Navigation & watchlist
│   └── footer.php             # Footer & AI chatbot
│
├── core/
│   ├── db.php                 # Database connection
│   └── functions.php          # Utility functions
│
├── assets/
│   ├── css/                   # Custom stylesheets
│   ├── js/                    # JavaScript modules
│   └── images/                # Project assets
│
├── config/
│   └── config.php             # Environment variables
│
└── README.md                   # This file
```

---

## ⚡ Installation Guide

### Prerequisites

Before you begin, ensure you have:
- **PHP 8.2** or higher
- **MySQL/MariaDB 5.7+** (optional, for contact form)
- **Composer** (optional, for package management)
- **Git** (for version control)
- **Web Server** (Apache/Nginx)

### Step 1: Clone Repository

```bash
git clone https://github.com/yourusername/cryptopro-terminal.git
cd cryptopro-terminal
```

### Step 2: Configure Web Server

#### For XAMPP (Windows/Mac/Linux):
```bash
# Copy project to htdocs
cp -r cryptopro-terminal /path/to/xampp/htdocs/

# Start Apache & MySQL from XAMPP Control Panel
# Access: http://localhost/cryptopro-terminal/
```

#### For Apache (Linux):
```bash
# Copy to web root
sudo cp -r cryptopro-terminal /var/www/html/

# Set permissions
sudo chown -R www-data:www-data /var/www/html/cryptopro-terminal
sudo chmod -R 755 /var/www/html/cryptopro-terminal
```

### Step 3: Create Virtual Host (Optional)

Create `/etc/apache2/sites-available/cryptopro.conf`:
```apache
<VirtualHost *:80>
    ServerName cryptopro.local
    ServerAlias www.cryptopro.local
    DocumentRoot /var/www/html/cryptopro-terminal/public
    
    <Directory /var/www/html/cryptopro-terminal>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/cryptopro-error.log
    CustomLog ${APACHE_LOG_DIR}/cryptopro-access.log combined
</VirtualHost>
```

Enable and restart:
```bash
sudo a2ensite cryptopro.conf
sudo systemctl restart apache2
```

### Step 4: Database Setup (Optional)

If using contact form with database:

```bash
# Open MySQL
mysql -u root -p

# Create database
CREATE DATABASE nexus_terminal_db CHARACTER SET utf8mb4;
USE nexus_terminal_db;

# Create table
CREATE TABLE contact_uplinks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(255) NOT NULL,
    sender_email VARCHAR(255) NOT NULL,
    subject_protocol VARCHAR(255),
    message_packet LONGTEXT,
    ip_address VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Step 5: Configuration

Edit `/core/config.php`:

```php
<?php
// Database Credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'nexus_terminal_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// API Keys
define('COINGECKO_API', 'https://api.coingecko.com/api/v3');
define('CRYPTOCOMPARE_API', 'https://min-api.cryptocompare.com/data');

// Site Settings
define('SITE_URL', 'http://localhost/cryptopro-terminal');
define('SITE_NAME', 'CryptoPro Terminal');
?>
```

### Step 6: Verify Installation

Navigate to: `http://localhost/cryptopro-terminal/public/index.php`

You should see the dashboard with all modules loaded! ✅

---

## 🔧 Configuration

### Environment Variables

Create a `.env` file in the root directory:

```env
# Database
DB_HOST=localhost
DB_NAME=nexus_terminal_db
DB_USER=root
DB_PASS=

# API Configuration
COINGECKO_ENABLED=true
TRADINGVIEW_ENABLED=true
NEWS_API_ENABLED=true

# Site Settings
SITE_URL=http://localhost
DEBUG_MODE=true
SESSION_TIMEOUT=3600
```

Load in PHP:
```php
$config = parse_ini_file('.env');
define('DB_HOST', $config['DB_HOST']);
```

### API Configuration

#### CoinGecko API (Free - No Key Required)
```php
$api = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc";
```

#### CryptoCompare API (Free Tier Available)
```php
$api = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
// Optional: Add API key for higher limits
// $api .= "&api_key=YOUR_KEY_HERE";
```

#### TradingView Widgets
- No API key needed
- Widgets are embedded via CDN
- Customizable in HTML

---

## 📖 Usage Guide

### 🔑 For End Users

#### Accessing Markets
1. Click **"Crypto"** in navbar to view all cryptocurrencies
2. Use search bar to filter assets by name or symbol
3. Click **"Watch"** to add to your watchlist
4. View real-time charts from TradingView

#### Managing Watchlist
1. Click **"Watchlist"** button in navbar (top-right)
2. Favorites are saved to browser's LocalStorage
3. Click trash icon to remove items
4. Click "Clear All" to reset

#### Portfolio Tracking
1. Navigate to **"Portfolio"** page
2. View your total net worth and daily P&L
3. Check asset allocation chart
4. Review transaction history

#### Getting Market Insights
1. Visit **"News"** page for live market updates
2. Use **"AI Assistant"** (bottom-right robot icon) for analysis
3. Check **"Economic Calendar"** for upcoming events
4. Use **"Converter"** for currency calculations

### 👨‍💻 For Developers

#### Adding New Features

**New Cryptocurrency Page:**
```php
<?php
// pages/defi-tokens.php
require_once '../core/functions.php';
require_once '../includes/header.php';

// Fetch DeFi token data
$api_url = "https://api.coingecko.com/api/v3/coins/markets?category=decentralized-finance-defi";
$tokens = fetchData($api_url);

// Display in table...
?>
```

**Custom API Integration:**
```php
function fetchData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}
```

**Adding Database Queries:**
```php
// Insert user trade
$sql = "INSERT INTO trades (user_id, asset, price, quantity, type, date) 
        VALUES (:uid, :asset, :price, :qty, :type, NOW())";
        
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':uid' => $user_id,
    ':asset' => 'BTC',
    ':price' => 52140,
    ':qty' => 0.5,
    ':type' => 'BUY'
]);
```

#### Customizing Design

**Change Accent Color:**
```css
/* In header.php <style> section */
:root {
    --accent-color: #00f3ff;  /* Change to your color */
}

/* Update all references */
.btn-info:hover { color: var(--accent-color); }
.navbar-brand span { color: var(--accent-color); }
```

**Dark Mode Toggle:**
```javascript
function toggleDarkMode() {
    document.body.classList.toggle('light-mode');
    localStorage.setItem('theme', 'light');
}
```

---

## 🌐 API Integration

### Supported APIs

#### 1. **CoinGecko** (Crypto Data)
- **Endpoint:** `https://api.coingecko.com/api/v3`
- **Features:** Live prices, market cap, 24h volume, charts
- **Rate Limit:** 50 calls/minute (free tier)
- **Auth:** None required

```php
$url = "https://api.coingecko.com/api/v3/coins/bitcoin";
$data = fetchData($url);
echo "Bitcoin Price: $" . $data['market_data']['current_price']['usd'];
```

#### 2. **CryptoCompare** (News & Analysis)
- **Endpoint:** `https://min-api.cryptocompare.com/data`
- **Features:** News feed, sentiment data, historical data
- **Rate Limit:** 100 calls/hour (free)
- **Auth:** Optional API key

```php
$url = "https://min-api.cryptocompare.com/data/v2/news/?lang=EN";
$news = fetchData($url);
```

#### 3. **TradingView** (Charts)
- **Method:** Embedded widgets via CDN
- **Features:** Advanced charts, technical analysis, multiple timeframes
- **No Authentication:** Required
- **Customizable:** Symbol, interval, theme, tools

```html
<script src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"></script>
<div class="tradingview-widget-container">
    <script type="text/javascript">
    {
        "symbol": "BINANCE:BTCUSDT",
        "interval": "D",
        "theme": "dark"
    }
    </script>
</div>
```

### Error Handling

```php
function fetchData($url) {
    try {
        $response = file_get_contents($url);
        if ($response === false) {
            throw new Exception("API Connection Failed");
        }
        return json_decode($response, true);
    } catch (Exception $e) {
        error_log("API Error: " . $e->getMessage());
        return null;
    }
}
```

---

## 💾 Database Setup

### Create Full Database Schema

```sql
-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Portfolio Holdings
CREATE TABLE holdings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    asset_symbol VARCHAR(20),
    quantity DECIMAL(18, 8),
    entry_price DECIMAL(16, 2),
    current_price DECIMAL(16, 2),
    created_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Trade History
CREATE TABLE trades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    asset VARCHAR(100),
    type ENUM('BUY', 'SELL'),
    quantity DECIMAL(18, 8),
    price DECIMAL(16, 2),
    commission DECIMAL(10, 2) DEFAULT 0,
    trade_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Contact Messages
CREATE TABLE contact_uplinks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_name VARCHAR(255),
    sender_email VARCHAR(255),
    subject_protocol VARCHAR(255),
    message_packet LONGTEXT,
    ip_address VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Database Connection Class

```php
<?php
class Database {
    private $pdo;
    
    public function __construct($host, $db, $user, $pass) {
        try {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8mb4",
                $user,
                $pass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
?>
```

---

## 🎨 Design System

### Color Palette

```css
/* Primary Colors */
--color-primary: #00f3ff;      /* Cyan Accent */
--color-secondary: #ffd700;    /* Gold */
--color-success: #00ff88;      /* Green */
--color-danger: #ff4d4d;       /* Red */
--color-warning: #f1c40f;      /* Yellow */

/* Backgrounds */
--bg-primary: #000000;         /* Pure Black */
--bg-secondary: #050505;       /* Dark Gray */
--bg-tertiary: #0a0a0a;        /* Lighter Gray */
--bg-card: #080808;            /* Card Background */

/* Text */
--text-primary: #ffffff;       /* White */
--text-secondary: #888888;     /* Gray */
--text-muted: #666666;         /* Muted Gray */
```

### Typography

```css
/* Fonts */
--font-heading: 'Space Grotesk', sans-serif;
--font-body: 'Inter', sans-serif;
--font-mono: 'Courier New', monospace;

/* Sizes */
h1: 3.5rem (56px)
h2: 2.5rem (40px)
h3: 2rem (32px)
body: 1rem (16px)
small: 0.875rem (14px)
```

### Components

#### Buttons
```html
<!-- Primary -->
<button class="btn-glow-primary">Submit</button>

<!-- Outline -->
<button class="btn-glow-outline">Cancel</button>

<!-- Danger -->
<button class="btn btn-danger">Delete</button>
```

#### Cards
```html
<div class="glass-feature">
    <i class="fas fa-icon fa-3x text-info mb-4"></i>
    <h4 class="text-white fw-bold">Title</h4>
    <p class="text-secondary">Description</p>
</div>
```

#### Inputs
```html
<div class="input-group-tech">
    <span class="input-label">Email Address</span>
    <input type="email" class="form-control-tech" placeholder="Enter email...">
</div>
```

---

## 🤝 Contributing

We love contributions! Here's how to get started:

### 1. Fork & Clone
```bash
git clone https://github.com/yourusername/cryptopro-terminal.git
cd cryptopro-terminal
git checkout -b feature/amazing-feature
```

### 2. Make Changes
```bash
# Install dependencies (if using Composer)
composer install

# Make your improvements
# Test thoroughly
```

### 3. Commit & Push
```bash
git add .
git commit -m "Add: Amazing new feature"
git push origin feature/amazing-feature
```

### 4. Create Pull Request
- Describe changes clearly
- Link any related issues
- Request review from maintainers

### Contribution Guidelines

✅ **Do:**
- Follow existing code style
- Add comments for complex logic
- Test on multiple browsers
- Update README if needed
- Keep commits atomic

❌ **Don't:**
- Remove existing features without discussion
- Commit sensitive data (API keys, passwords)
- Use var, only let/const
- Skip error handling

---

## 📝 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

### Quick License Info
```
MIT License (c) 2024 Muhammad Bilal Ifzal

Permission is granted to use, copy, modify, merge, publish, 
distribute, sublicense this software for any purpose, commercial 
or non-commercial, provided the above copyright notice and this 
permission notice are included in all copies or substantial portions.
```

---

## 👨‍💻 Author

### Muhammad Bilal Ifzal
**Full Stack Developer | Crypto Analyst | Web Architect**

- 🌐 **Website:** [muhammadbilalifzal.com](https://muhammadbilalifzal.com)
- 💼 **LinkedIn:** [linkedin.com/in/muhammad-bilal-ifzal](https://www.linkedin.com/in/muhammad-bilal-ifzal-a82649375)
- 📧 **Email:** mbilalifzal@gmail.com
- 💬 **WhatsApp:** [+92-326-0102121](https://wa.me/923260102121)
- 🐙 **GitHub:** [@bilalifzal](https://github.com/bilalifzal)

---

## 🆘 Support & Troubleshooting

### Common Issues

**Q: Charts not loading?**
A: Check your internet connection and ensure TradingView CDN is accessible.

**Q: Database connection error?**
A: Verify MySQL is running and credentials in `config.php` are correct.

**Q: API rate limit exceeded?**
A: Implement request caching or upgrade to paid API tier.

**Q: Mobile layout broken?**
A: Check Bootstrap viewport meta tag in header.php

### Getting Help

1. Check [FAQ Section](#faq)
2. Search [Issues](https://github.com/yourusername/cryptopro-terminal/issues)
3. Create detailed bug report with screenshots
4. Contact maintainer via email

---

## 🎓 Learning Resources

- [PHP 8 Tutorial](https://www.php.net/manual/en/index.php)
- [Bootstrap 5 Docs](https://getbootstrap.com/docs/5.0/)
- [JavaScript ES6+](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide)
- [MySQL Fundamentals](https://dev.mysql.com/doc/)
- [RESTful API Design](https://restfulapi.net/)

---

## 📊 Statistics

```
📁 Total Files: 40+
💾 Database: MySQL 5.7+
⚡ Frontend: HTML5 / CSS3 / Vanilla JS
🔙 Backend: PHP 8.2+
📦 Dependencies: Bootstrap, Font Awesome, Chart.js
🌐 APIs: 3 (CoinGecko, CryptoCompare, TradingView)
⏱️ Load Time: ~1.2 seconds
📱 Mobile Ready: Yes (Responsive)
```

---

## 🙏 Acknowledgments

- **Bootstrap** - CSS Framework
- **Font Awesome** - Icon Library
- **CoinGecko** - Crypto API
- **TradingView** - Chart Widgets
- **AOS** - Scroll Animations

---

<div align="center">

### ⭐ If you found this project helpful, please consider giving it a star!

[⬆ Back to top](#-cryptopro--advanced-financial-trading-terminal)

Made with ❤️ by **Muhammad Bilal Ifzal**

</div>
## 📖 Overview
CryptoPro is a next-generation financial terminal designed to bridge the gap between institutional data and retail agility. It simulates a professional trading environment with real-time data ingestion, advanced charting, and AI-driven sentiment analysis.

This project demonstrates advanced proficiency in **PHP Backend Architecture**, **Real-Time API Integration**, and **Responsive Frontend Engineering**.

## ⚡ Key Features

### 🖥️ Core Terminal
* **Live Market Pulse:** Real-time scrolling ticker tape and session clocks (NY, London, Tokyo).
* **Institutional Dashboard:** Data-rich tables for Crypto, Stocks, and Forex with "Sparkline" visualizations.
* **Global Watchlist:** Persistent slide-out sidebar to track favorite assets across the application.

### 📊 Advanced Analytics
* **Pro Charting Engine:** Integrated TradingView charts with 50+ technical indicators.
* **Sector Heatmaps:** Visual representation of Wall Street performance (S&P 500 sectors).
* **Economic Calendar:** Real-time tracking of Fed rates, GDP releases, and global macro events.

### 🤖 AI Integration
* **Smart Assistant:** A floating AI Chat Widget capable of answering market queries and simulating financial advice.
* **Sentiment Analysis:** "Fear & Greed" gauge visualizing market emotions.

## 🛠️ Technology Stack

| Component | Technology | Description |
| :--- | :--- | :--- |
| **Backend** | **PHP 8.2** | Server-side logic, routing, and component management. |
| **Frontend** | **Bootstrap 5** | Responsive, mobile-first Glassmorphism UI. |
| **Scripting** | **JavaScript (ES6)** | Async API fetching, DOM manipulation, and widget logic. |
| **APIs** | **CoinGecko / TradingView** | Real-time market data feeds and WebSocket connections. |
| **Styling** | **CSS3 / AOS** | Custom animations, gradients, and dark-mode aesthetics. |

## 🚀 Installation & Setup

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/yourusername/cryptopro-terminal.git](https://github.com/yourusername/cryptopro-terminal.git)
    ```

2.  **Server Setup**
    * Place the folder in your local server directory (e.g., `htdocs` for XAMPP or `www` for WAMP).

3.  **Launch**
    * Start Apache Server.
    * Navigate to: `http://localhost/cryptopro-terminal/public/index.php`

## 📂 Project Structure

```text
/cryptopro-terminal
├── /core
│   └── functions.php       # Global helper functions
├── /includes
│   ├── header.php          # Navbar & Global Watchlist
│   └── footer.php          # AI Chat Widget & Scripts
├── /pages
│   ├── crypto.php          # Advanced Crypto Screener
│   ├── stocks.php          # Wall Street Heatmaps
│   ├── news.php            # Global News Wire
│   └── calendar.php        # Economic Events
├── /public
│   └── index.php           # Main Dashboard
└── README.md               # Documentation
