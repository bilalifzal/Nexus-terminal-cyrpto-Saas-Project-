<?php
// core/functions.php
// "require_once" ensures the database is only connected once
require_once 'db.php'; 

/* ====================================================
   SAFE FUNCTION DEFINITIONS (Bulletproof Code)
   We wrap functions in "if" blocks to stop fatal errors.
   ==================================================== */

if (!function_exists('fetchData')) {
    function fetchData($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'CryptoPro_Student_Project');
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($result, true);
    }
}

if (!function_exists('predictTrend')) {
    function predictTrend($current_price, $past_prices_array) {
        if (empty($past_prices_array)) return "neutral";

        $sum = array_sum($past_prices_array);
        $count = count($past_prices_array);
        $average = $sum / $count;

        if ($current_price > ($average * 1.01)) { 
            return "up"; 
        } elseif ($current_price < ($average * 0.99)) {
            return "down"; 
        } else {
            return "neutral";
        }
    }
}

if (!function_exists('formatMoney')) {
    function formatMoney($amount, $currency = 'USD') {
        if ($currency == 'PKR') {
            return 'Rs ' . number_format($amount, 2);
        }
        return '$' . number_format($amount, 2);
    }
}
?>
<?php
// core/functions.php

// Start Session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper: Check if user is logged in (Simulated)
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Helper: Active Page Class
function active_page($page_name) {
    $current = basename($_SERVER['PHP_SELF']);
    return $current === $page_name ? 'text-info fw-bold' : 'text-secondary';
}
?>