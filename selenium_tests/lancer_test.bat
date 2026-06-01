@echo off
title Test Selenium - Institut
cd /d "%~dp0"

echo ============================================
echo   Test Selenium - Connexion admin
echo ============================================
echo.
echo Assurez-vous que:
echo   1. Apache est demarre (XAMPP)
echo   2. http://localhost/institut fonctionne dans Chrome
echo.
pause

py test_login.py
echo.
pause
