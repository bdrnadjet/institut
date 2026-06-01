@echo off
cd /d "%~dp0"
echo. > demarrer_log.txt
echo [%date% %time%] Demarrage >> demarrer_log.txt
cmd /k demarrer.bat
