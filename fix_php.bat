@echo off
title Fix PHP
echo ============================================
echo   Reparation PHP pour Institut
echo ============================================
echo.

if not exist "C:\php8.4\php.exe" (
    echo ERREUR: C:\php8.4\php.exe introuvable
    pause
    exit /b 1
)

echo Configuration PHPRC=C:\php8.4 ...
setx PHPRC "C:\php8.4" >nul
set PHPRC=C:\php8.4

echo.
echo Test des extensions:
"C:\php8.4\php.exe" -c "C:\php8.4\php.ini" -m | findstr /i "mbstring pdo_sqlite sqlite3"

echo.
echo Si vous voyez mbstring et pdo_sqlite ci-dessus: OK
echo.
echo Fermez toutes les fenetres CMD puis lancez: demarrer.bat
echo.
pause
