@echo off
title Test Selenium - Institut
cd /d "%~dp0"

echo ============================================
echo   Test Selenium - Connexion admin
echo ============================================
echo.
echo 1) Dans un AUTRE terminal, laissez tourner:
echo    cd C:\Users\moi\Downloads\institut
echo    php artisan serve
echo.
echo 2) Puis appuyez sur une touche pour lancer le test.
echo.
pause

py test_login.py
echo.
pause
