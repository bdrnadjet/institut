
Write-Host "Checking for running processes..."
Get-Process -Name "httpd", "php-cgi", "php" -ErrorAction SilentlyContinue

Write-Host "Checking for XAMPP services..."
Get-Service -Name "Apache2.4", "mysql" -ErrorAction SilentlyContinue

Write-Host "Checking file accessibility..."
try {
    $stream = [System.IO.File]::Open("C:\xampp\php\php.exe", "Open", "ReadWrite")
    if ($stream) {
        Write-Host "C:\xampp\php\php.exe is WRITABLE."
        $stream.Close()
    }
}
catch {
    Write-Host "C:\xampp\php\php.exe is LOCKED: $_"
}
