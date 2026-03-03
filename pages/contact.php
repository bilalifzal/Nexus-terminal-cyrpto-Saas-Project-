<?php
// pages/contact.php
// ❌ REMOVED: require_once '../core/db.php'; 
require_once '../core/functions.php'; 
require_once '../includes/header.php'; 

// ==========================================
// 1. DIRECT DATABASE CONNECTION
// ==========================================
$host = 'localhost';
$dbname = 'nexus_terminal_db'; // ✅ Keep this as is
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("<h3 style='color:red'>❌ DATABASE CONNECTION FAILED: " . $e->getMessage() . "</h3>");
}

// ==========================================
// 2. HANDLE FORM SUBMISSION
// ==========================================
$status_msg = "";
$status_type = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $ip = $_SERVER['REMOTE_ADDR'];

    // SQL: Insert Data
    $sql = "INSERT INTO contact_uplinks (sender_name, sender_email, subject_protocol, message_packet, ip_address) 
            VALUES (:name, :email, :subj, :msg, :ip)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subj' => $subject,
            ':msg' => $message,
            ':ip' => $ip
        ]);

        if ($result) {
            $status_msg = "TRANSMISSION SUCCESSFUL. PACKET SECURED.";
            $status_type = "success";
        }
    } catch (PDOException $e) {
        $status_msg = "DATABASE ERROR: " . $e->getMessage();
        $status_type = "error";
    }
}
?>

<script>document.title = "Nexus Terminal | Secure Uplink";</script>

<style>
    body { background-color: #000; }

    /* --- LAYOUT --- */
    .contact-grid {
        display: grid; grid-template-columns: 1fr 1.5fr; gap: 40px;
        min-height: 80vh; align-items: stretch;
    }

    /* --- LEFT: INFO CARD --- */
    .info-card {
        background: #050505; border: 1px solid #222; border-radius: 16px; padding: 40px;
        position: relative; overflow: hidden; height: 100%;
        display: flex; flex-direction: column;
    }
    .info-card::before {
        content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%;
        background: linear-gradient(180deg, #ffd700, #ff8800);
        box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);
    }

    .dev-avatar {
        width: 110px; height: 110px; border-radius: 50%; border: 3px solid #ffd700;
        padding: 5px; margin-bottom: 25px;
        box-shadow: 0 0 40px rgba(255, 215, 0, 0.25); object-fit: cover;
    }
    
    .status-badge {
        background: rgba(0, 255, 136, 0.1); border: 1px solid #00ff88; color: #00ff88;
        padding: 6px 18px; border-radius: 50px; font-size: 0.75rem; font-weight: 700;
        display: inline-flex; align-items: center; gap: 8px; text-transform: uppercase;
        letter-spacing: 1.5px; margin-bottom: 25px;
    }
    .blink { animation: blink 1.5s infinite; }
    @keyframes blink { 0% { opacity: 1; } 50% { opacity: 0.4; } 100% { opacity: 1; } }

    /* --- RIGHT: TRANSMISSION FORM --- */
    .form-panel {
        background: #080808; border: 1px solid #222; border-radius: 16px; padding: 50px;
        position: relative; box-shadow: 0 0 80px rgba(0,0,0,0.5);
    }
    .form-header {
        border-bottom: 1px solid #222; padding-bottom: 25px; margin-bottom: 35px;
        display: flex; justify-content: space-between; align-items: center;
    }
    
    .input-group-tech { margin-bottom: 30px; position: relative; }
    .input-label {
        position: absolute; top: -12px; left: 20px; background: #080808; padding: 0 10px;
        color: #00f3ff; font-size: 0.7rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
    }
    
    .form-control-tech {
        background: #000; border: 1px solid #333; color: #fff; padding: 18px;
        border-radius: 10px; width: 100%; font-family: 'Space Grotesk', sans-serif;
        transition: 0.3s; font-size: 1rem;
    }
    .form-control-tech:focus {
        border-color: #00f3ff; outline: none; box-shadow: 0 0 25px rgba(0, 243, 255, 0.15);
    }

    .btn-transmit {
        background: transparent; border: 1px solid #00f3ff; color: #00f3ff;
        width: 100%; padding: 18px; font-weight: 700; text-transform: uppercase;
        letter-spacing: 2px; transition: 0.3s; position: relative; overflow: hidden;
        border-radius: 8px; font-size: 0.9rem;
    }
    .btn-transmit:hover {
        background: #00f3ff; color: #000; box-shadow: 0 0 40px rgba(0, 243, 255, 0.4);
    }

    /* --- PROJECT DISCLAIMER BOX --- */
    .project-disclaimer {
        margin-top: auto; 
        background: rgba(255, 255, 255, 0.03); 
        border: 1px dashed #444; border-radius: 12px; padding: 20px;
    }

    /* --- ALERT STYLES --- */
    .alert-tech {
        background: rgba(0, 255, 136, 0.1); border: 1px solid #00ff88; color: #00ff88;
        font-family: 'Courier New', monospace; font-weight: bold; margin-bottom: 30px; padding: 15px;
    }
    .alert-tech-error {
        background: rgba(255, 77, 77, 0.1); border: 1px solid #ff4d4d; color: #ff4d4d;
        font-family: 'Courier New', monospace; font-weight: bold; margin-bottom: 30px; padding: 15px;
    }

    @media (max-width: 992px) { .contact-grid { grid-template-columns: 1fr; } }
</style>

<div class="container py-5">
    <div class="contact-grid">
        
        <div data-aos="fade-right">
            <div class="info-card">
                <div class="text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" class="dev-avatar">
                    <h3 class="fw-bold text-white mb-1">MUHAMMAD BILAL IFZAL</h3>
                    <p class="text-secondary small text-uppercase letter-spacing-1 mb-4">Lead Developer & Architect</p>
                    
                    <div class="status-badge">
                        <span class="dot bg-success blink"></span> System Online
                    </div>
                </div>

                <div class="project-disclaimer">
                    <h6 class="text-white fw-bold small text-uppercase mb-2"><i class="fas fa-info-circle text-info me-2"></i>Mission Protocol</h6>
                    <p class="text-secondary small mb-0" style="font-size: 0.8rem; line-height: 1.6;">
                        This terminal is an <strong>Educational Project</strong> designed to demonstrate real-time data handling, API integration, and full-stack architecture. It provides live currency rates and crypto market analysis for academic & portfolio purposes.
                    </p>
                </div>

                <div class="mt-4">
                    <h6 class="text-white fw-bold mb-3 small text-uppercase"><i class="fas fa-link text-warning me-2"></i>Direct Links</h6>
                    
                    <a href="https://www.linkedin.com/in/muhammad-bilal-ifzal-a82649375" target="_blank" class="d-flex align-items-center text-decoration-none text-secondary mb-3 hover-text-white transition">
                        <i class="fab fa-linkedin fa-lg me-3 text-primary"></i>
                        <span class="small">LinkedIn Profile</span>
                    </a>
                    
                    <a href="mailto:mbilalifzal@gmail.com" class="d-flex align-items-center text-decoration-none text-secondary mb-3 hover-text-white transition">
                        <i class="fas fa-envelope fa-lg me-3 text-danger"></i>
                        <span class="small">mbilalifzal@gmail.com</span>
                    </a>

                    <a href="https://wa.me/923260102121" target="_blank" class="d-flex align-items-center text-decoration-none text-secondary hover-text-white transition">
                        <i class="fab fa-whatsapp fa-lg me-3 text-success"></i>
                        <span class="small">0326 0102121</span>
                    </a>
                </div>

            </div>
        </div>

        <div data-aos="fade-left">
            <div class="form-panel">
                <div class="form-header">
                    <div>
                        <h4 class="text-white fw-bold m-0">SECURE UPLINK</h4>
                        <small class="text-secondary" style="font-family:'Courier New'">Encryption: TLS 1.3 | Node: ACTIVE</small>
                    </div>
                    <i class="fas fa-satellite-dish fa-2x text-neon-blue opacity-50"></i>
                </div>

                <?php if($status_msg != ""): ?>
                    <div class="alert <?php echo ($status_type == 'success') ? 'alert-tech' : 'alert-tech-error'; ?> rounded-0 border-0 border-start border-4">
                        <i class="fas <?php echo ($status_type == 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> me-2"></i>
                        <?php echo $status_msg; ?>
                    </div>
                <?php endif; ?>

                <form action="contact.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group-tech">
                                <span class="input-label">Identity / Name</span>
                                <input type="text" name="name" class="form-control-tech" placeholder="Enter identification..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-tech">
                                <span class="input-label">Return Address / Email</span>
                                <input type="email" name="email" class="form-control-tech" placeholder="name@domain.com" required>
                            </div>
                        </div>
                    </div>

                    <div class="input-group-tech">
                        <span class="input-label">Subject Protocol</span>
                        <select name="subject" class="form-control-tech" style="appearance: none; cursor: pointer;">
                            <option value="Project Inquiry">Project Inquiry</option>
                            <option value="Job Opportunity">Job Opportunity</option>
                            <option value="Technical Consultation">Technical Consultation</option>
                            <option value="Bug Report">Bug Report</option>
                            <option value="Partnership Proposal">Partnership Proposal</option>
                            <option value="General Feedback">General Feedback</option>
                            <option value="Prefer not to say">Prefer not to say</option>
                        </select>
                        <i class="fas fa-chevron-down text-secondary position-absolute" style="right: 20px; top: 22px;"></i>
                    </div>

                    <div class="input-group-tech">
                        <span class="input-label">Message Packet</span>
                        <textarea name="message" class="form-control-tech" rows="5" placeholder="Initialize message sequence..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input bg-dark border-secondary" type="checkbox" id="encrypt" checked disabled>
                            <label class="form-check-label text-secondary small" for="encrypt">
                                Encrypt payload
                            </label>
                        </div>
                        <span class="text-secondary small" style="font-family:'Courier New'">LATENCY: 12ms</span>
                    </div>

                    <button type="submit" class="btn btn-transmit">
                        <i class="fas fa-paper-plane me-2"></i> INITIATE UPLINK
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

<?php require_once '../includes/footer.php'; ?>