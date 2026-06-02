@echo off
chcp 65001 >nul
title Institut - Site + Tests Selenium
cd /d "C:\Users\moi\Downloads\institut"

echo ============================================
echo   Demarrage automatique (site + tests)
echo ============================================
echo.

where php >nul 2>&1
if errorlevel 1 (
    echo [ERREUR] PHP introuvable. Installez PHP ou XAMPP.
    pause
    exit /b 1
)

where py >nul 2>&1
if errorlevel 1 (
    echo [ERREUR] Python introuvable. Installez Python avec "Add to PATH".
    pause
    exit /b 1
)

echo Verification du site...
curl.exe -s -o NUL -w "%%{http_code}" --max-time 3 http://127.0.0.1:8000/login > "%TEMP%\institut_status.txt" 2>nul
set /p HTTP_CODE=<"%TEMP%\institut_status.txt"

if not "%HTTP_CODE%"=="200" (
    echo Demarrage du serveur Laravel...
    start "Institut - Serveur" cmd /k "cd /d C:\Users\moi\Downloads\institut && php artisan serve"
    echo Attente 10 secondes...
    timeout /t 10 /nobreak >nul
) else (
    echo Le site est deja en ligne.
)

echo.
echo Reparation des mots de passe de test...
php fix_passwords.php

echo.
echo Lancement des tests Selenium...
cd selenium_tests
py -m pip install -q selenium 2>nul

py test_login.py
if errorlevel 1 goto :fail
timeout /t 3 /nobreak >nul

py test_student.py
if errorlevel 1 goto :fail
timeout /t 3 /nobreak >nul

py test_teacher.py
if errorlevel 1 goto :fail

echo.
echo ============================================
echo   Tous les tests sont OK !
echo ============================================
pause
exit /b 0

:fail
echo.
echo ============================================
echo   Un test a echoue. Verifiez:
echo   - Chrome est installe
echo   - http://127.0.0.1:8000/login s ouvre dans le navigateur
echo ============================================
pause
exit /b 1
