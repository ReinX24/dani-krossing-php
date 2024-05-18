<?php

// Creating our own password hashing method

// $sensitiveData = "Aldwin";
// Generate 16 bytes and convert to hexadecimal
// $salt = bin2hex(random_bytes(16)); // Generate random salt
// $pepper = "ASecretPepperString";

// echo "<p>$salt</p>";

// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash);

// echo "<p>$hash</p>";

// Checking if the password is correct
// $sensitiveData = "Aldwin";
// $storedSalt = $salt;
// $storedHash = $hash;
// $pepper = "ASecretPepperString";

// $dataToHash = $sensitiveData . $storedSalt . $pepper;

// $verificationHash = hash("sha256", $dataToHash);

// These have to be the same for both passwords
$salt = bin2hex(random_bytes(16));
$pepper = "ASecretPepperString";

/**
 * Hash plaintext
 * 
 * Hashes plaintext with a hashing algorithm, a salt, and a pepper
 * 
 * @param string $plainAlgo
 * @param string $hashAlgo
 * @param string $salt
 * @param string $pepper
 * 
 * @return string 
 */
function hashPassword(
    string $plainText,
    string $hashAlgo,
    string $salt,
    string $pepper
): string {
    return hash($hashAlgo, $plainText . $salt . $pepper);
}

$storedHash = hashPassword("Aldwin", "sha256", $salt, $pepper);
$verificationHash = hashPassword("Aldwin", "sha256", $salt, $pepper);

// Checking if the two hashed passwords are the same
if ($storedHash == $verificationHash) {
    echo "The data are the same!";
    echo "<br>";
    echo $storedHash;
    echo "<br>";
    echo $verificationHash;
} else {
    echo "The data are not the same!";
}
