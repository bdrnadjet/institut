
Write-Host "Locating PHP..."
$phpCommand = Get-Command php -ErrorAction SilentlyContinue
if ($phpCommand) {
    Write-Host "PHP found at: $($phpCommand.Source)"
}
else {
    Write-Host "PHP command not found in PATH."
}

Write-Host "Killing httpd..."
$count = 0
while ((Get-Process httpd -ErrorAction SilentlyContinue) -and ($count -lt 5)) {
    Stop-Process -Name "httpd" -Force -ErrorAction SilentlyContinue
    Start-Sleep -Seconds 1
    $count++
}
if (Get-Process httpd -ErrorAction SilentlyContinue) {
    Write-Host "FAILED to kill httpd."
}
else {
    Write-Host "httpd killed."
}

Write-Host "Killing php..."
Stop-Process -Name "php", "php-cgi" -Force -ErrorAction SilentlyContinue
Start-Sleep -Seconds 1

Write-Host "Restoring PHP..."
Copy-Item -Path "C:\xampp\php\windowsXamppPhp\*" -Destination "C:\xampp\php" -Recurse -Force -ErrorAction Continue

Write-Host "Verifying..."
& "C:\xampp\php\php.exe" -v
