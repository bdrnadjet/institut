@echo off
title Institut
cd /d "%~dp0"
echo [%date% %time%] demarrer.bat >> demarrer_log.txt 2>&1

set PHP_EXE=C:\php8.4\php.exe
set PHP_INI=C:\php8.4\php.ini

echo ============================================
echo   INSTITUT - Demarrage du serveur
echo ============================================
echo.

if not exist "%PHP_EXE%" (
    echo ERREUR: PHP introuvable: %PHP_EXE%
    echo Installez PHP 8.4 dans C:\php8.4
    pause
    exit /b 1
)

if not exist "%PHP_INI%" (
    echo ERREUR: php.ini introuvable: %PHP_INI%
    pause
    exit /b 1
)

echo Verification PHP...
"%PHP_EXE%" -c "%PHP_INI%" -r "exit(extension_loaded('mbstring')&&extension_loaded('pdo_sqlite')?0:1);"
if errorlevel 1 (
    echo.
    echo ERREUR: extensions PHP manquantes.
    echo Lancez d abord: fix_php.bat
    echo.
    pause
    exit /b 1
)

echo PHP OK.
echo.
echo Le navigateur va s ouvrir dans 4 secondes...
echo Adresse: http://127.0.0.1:8000
echo.
echo Connexion admin:
echo   admin@institut.com
echo   password
echo.
echo NE FERMEZ PAS cette fenetre pendant l utilisation.
echo Ctrl+C pour arreter le serveur.
echo.

start "" cmd /c "ping -n 5 127.0.0.1 >nul && start http://127.0.0.1:8000"

"%PHP_EXE%" -c "%PHP_INI%" artisan serve --host=127.0.0.1 --port=8000

echo.
echo Serveur arrete.
pause
