@echo off
title Site Institut - Laravel
cd /d "C:\Users\moi\Downloads\institut"

where php >nul 2>&1
if errorlevel 1 (
    echo ERREUR: PHP n est pas installe ou pas dans le PATH.
    echo Installez PHP ou XAMPP, puis reessayez.
    pause
    exit /b 1
)

if not exist "artisan" (
    echo ERREUR: dossier projet incorrect.
    pause
    exit /b 1
)

echo Demarrage du site sur http://127.0.0.1:8000
echo Ne fermez pas cette fenetre.
echo.
php artisan serve
pause
