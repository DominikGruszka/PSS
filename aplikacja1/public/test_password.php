<?php
$plainPassword = "Dominik1"; // Hasło wprowadzone w formularzu
$newHash = password_hash($plainPassword, PASSWORD_BCRYPT);

echo "Nowy hash: " . $newHash . "\n";
