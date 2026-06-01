
Write-Host "Aggressively stopping processes..."
taskkill /F /IM httpd.exe /T 2>$null
taskkill /F /IM php-cgi.exe /T 2>$null
taskkill /F /IM php.exe /T 2>$null
Start-Sleep -Seconds 2

$procs = Get-Process -Name "httpd", "php-cgi", "php" -ErrorAction SilentlyContinue
if ($procs) {
    Write-Host "Warning: Some processes are still running."
    $procs | Format-Table
}

Write-Host "Backing up/Moving locked files..."
# Try to rename php.exe if it exists, to allow replacement
if (Test-Path "C:\xampp\php\php.exe") {
    Move-Item -Path "C:\xampp\php\php.exe" -Destination "C:\xampp\php\php.exe.old" -Force -ErrorAction SilentlyContinue
}
if (Test-Path "C:\xampp\php\libpq.dll") {
    Move-Item -Path "C:\xampp\php\libpq.dll" -Destination "C:\xampp\php\libpq.dll.old" -Force -ErrorAction SilentlyContinue
}

Write-Host "Restoring PHP 8.2..."
Copy-Item -Path "C:\xampp\php\windowsXamppPhp\*" -Destination "C:\xampp\php" -Recurse -Force

Write-Host "Verifying PHP version..."
$version = & "C:\xampp\php\php.exe" -v
$version
if ($version -match "20240924") {
    Write-Error "CRITICAL: PHP still seems to be version 8.4!"
} else {
    Write-Host "PHP Version restored successfully."
    
    Write-Host "Running Migration..."
    cd "C:\Users\moi\Downloads\institut"
    php artisan migrate
}

Write-Host "Done. Please restart Apache."
