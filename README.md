# CryptoPro | Advanced Financial Terminal 🚀

**Architected by Muhammad Bilal Ifzal** *Full Stack Web Application for Real-Time Market Intelligence*

![Project Status](https://img.shields.io/badge/Status-Completed-success)
![Version](https://img.shields.io/badge/Version-2.0.0-blue)
![License](https://img.shields.io/badge/License-MIT-green)

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
