@echo off
set CONF=C:\xampp\apache\conf\extra\httpd-institut.conf
set PROJET=C:/Users/moi/Downloads/institut/public

(
echo Alias /institut "%PROJET%"
echo ^<Directory "%PROJET%"^>
echo     AllowOverride All
echo     Require all granted
echo ^</Directory^>
) > "%CONF%"

findstr /C:"httpd-institut.conf" C:\xampp\apache\conf\httpd.conf >nul
if errorlevel 1 (
    echo Include "conf/extra/httpd-institut.conf" >> C:\xampp\apache\conf\httpd.conf
)

echo OK Apache: http://localhost/institut
exit /b 0
