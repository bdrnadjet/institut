@echo off
title Configuration XAMPP - Institut
cd /d "%~dp0"

set PROJET=%~dp0
set PUBLIC=%PROJET%public
set HTDOCS=C:\xampp\htdocs\institut
set PHP=C:\php8.4\php.exe
set INI=C:\php8.4\php.ini

echo ============================================
echo   Configurer Institut avec XAMPP
echo ============================================
echo.

if not exist "C:\xampp\apache\bin\httpd.exe" (
    echo ERREUR: XAMPP non trouve dans C:\xampp
    echo Installez XAMPP ou modifiez le chemin dans ce fichier.
    pause
    exit /b 1
)

if not exist "%PUBLIC%\index.php" (
    echo ERREUR: dossier public introuvable
    pause
    exit /b 1
)

echo Liaison vers htdocs...
if exist "%HTDOCS%" rmdir "%HTDOCS%" 2>nul
mklink /J "%HTDOCS%" "%PUBLIC%" >nul 2>&1
if errorlevel 1 (
    echo Creation du lien impossible. Utilisation du fichier Apache...
    call "%~dp0configurer_apache_alias.bat"
    if errorlevel 1 (
        echo Echec. Lancez ce fichier en tant qu administrateur.
        pause
        exit /b 1
    )
) else (
    echo OK: http://localhost/institut
)

echo.
echo Mise a jour APP_URL...
powershell -NoProfile -Command "(Get-Content '.env') -replace 'APP_URL=.*','APP_URL=http://localhost/institut' | Set-Content '.env'"

echo.
echo Nettoyage cache Laravel...
"%PHP%" -c "%INI%" artisan config:clear >nul 2>&1
"%PHP%" -c "%INI%" artisan route:clear >nul 2>&1

echo.
echo ============================================
echo   TERMINE
echo ============================================
echo.
echo Utilisation normale avec XAMPP:
echo   1. Ouvrez "XAMPP Control Panel" depuis le menu Demarrer
echo   2. Cliquez Start sur Apache
echo   3. Ouvrez le navigateur: http://localhost/institut
echo.
echo Ou double-cliquez: INSTITUT - XAMPP.vbs sur le Bureau
echo.
pause
