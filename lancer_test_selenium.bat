@echo off
title Test Selenium - Institut
cd /d "C:\Users\moi\Downloads\institut\selenium_tests"

where py >nul 2>&1
if errorlevel 1 (
    echo ERREUR: Python introuvable. Installez Python et cochez "Add to PATH".
    pause
    exit /b 1
)

if not exist "test_login.py" (
    echo ERREUR: fichiers de test introuvables.
    pause
    exit /b 1
)

echo ============================================
echo   Tests Selenium
echo ============================================
echo.
echo AVANT de continuer:
echo   1) Double-cliquez demarrer_site.bat
echo   2) Laissez cette fenetre ouverte
echo   3) Testez dans Chrome: http://127.0.0.1:8000/login
echo.
pause

echo --- Test admin ---
py test_login.py
if errorlevel 1 goto :fail
timeout /t 3 /nobreak >nul
echo.
echo --- Test student ---
py test_student.py
if errorlevel 1 goto :fail
timeout /t 3 /nobreak >nul
echo.
echo --- Test teacher ---
py test_teacher.py
if errorlevel 1 goto :fail
goto :done

:fail
echo.
echo Un test a echoue.
pause
exit /b 1

:done
echo.
echo Termine.
pause
