<?php
// process_contact.php - Gestione invio form contatti
$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$BASE_PATH = ($basePath === '/' || $basePath === '') ? '' : $basePath;

// Prevenzione XSS e pulizia input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Validazione email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// Inizializza variabili
$errors = [];
$success = false;

// Verifica che sia una richiesta POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Honeypot anti-bot: se il campo "website" è compilato, è un bot
    if (!empty($_POST['website'])) {
        // Bot rilevato, non fare nulla (silent fail)
        header('Location: ' . $BASE_PATH . '/contatti?sent=1');
        exit;
    }

    // Recupera e sanitizza i dati
    $name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
    $type = isset($_POST['type']) ? sanitizeInput($_POST['type']) : '';
    $message = isset($_POST['message']) ? sanitizeInput($_POST['message']) : '';
    $privacy = isset($_POST['privacy']) ? true : false;
    
    // Validazione campi obbligatori
    if (empty($name)) {
        $errors[] = 'Il nome è obbligatorio.';
    } elseif (strlen($name) > 80) {
        $errors[] = 'Il nome non può superare 80 caratteri.';
    }
    
    if (empty($email)) {
        $errors[] = 'L\'email è obbligatoria.';
    } elseif (!isValidEmail($email)) {
        $errors[] = 'L\'email non è valida.';
    } elseif (strlen($email) > 100) {
        $errors[] = 'L\'email non può superare 100 caratteri.';
    }
    
    if (empty($message)) {
        $errors[] = 'Il messaggio è obbligatorio.';
    } elseif (strlen($message) > 2000) {
        $errors[] = 'Il messaggio non può superare 2000 caratteri.';
    }
    
    if (strlen($phone) > 40) {
        $errors[] = 'Il telefono non può superare 40 caratteri.';
    }
    
    // Verifica consenso privacy
    if (!$privacy) {
        $errors[] = 'È necessario acconsentire al trattamento dei dati personali.';
    }
    
    // Se non ci sono errori, invia l'email
    if (empty($errors)) {
        $to = 'edilmia2016@gmail.com';
        $subject = 'Richiesta Sopralluogo - ' . $name;
        
        // Data e ora del consenso privacy
        $privacyConsentDate = date('d/m/Y H:i:s');
        
        // Costruisci il corpo dell'email
        $emailBody = "Nuova richiesta di sopralluogo\n\n";
        $emailBody .= "Nome e Cognome: " . $name . "\n";
        $emailBody .= "Email: " . $email . "\n";
        $emailBody .= "Telefono: " . (!empty($phone) ? $phone : 'Non fornito') . "\n";
        $emailBody .= "Tipo di Intervento: " . (!empty($type) ? $type : 'Non specificato') . "\n\n";
        $emailBody .= "Messaggio:\n" . $message . "\n\n";
        $emailBody .= "---\n";
        $emailBody .= "Consenso Privacy: Acconsentito il " . $privacyConsentDate . "\n";
        
        // Headers email
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Invio email
        if (mail($to, $subject, $emailBody, $headers)) {
            $success = true;
            header('Location: ' . $BASE_PATH . '/contatti?sent=1');
            exit;
        } else {
            $errors[] = 'Si è verificato un errore durante l\'invio. Riprova più tardi.';
        }
    }
}

// Se ci sono errori o non è POST, reindirizza al form con errori
if (!empty($errors)) {
    $errorQuery = '?error=' . urlencode(implode(' ', $errors));
    header('Location: ' . $BASE_PATH . '/contatti' . $errorQuery);
    exit;
}

// Fallback: reindirizza al form
header('Location: ' . $BASE_PATH . '/contatti');
exit;
?>
