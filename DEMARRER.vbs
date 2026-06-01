Set sh = CreateObject("WScript.Shell")
dir = "C:\Users\moi\Downloads\institut"
php = "C:\php8.4\php.exe"
ini = "C:\php8.4\php.ini"

If Not CreateObject("Scripting.FileSystemObject").FileExists(php) Then
    sh.Popup "PHP introuvable dans C:\php8.4" & vbCrLf & "Contactez le support.", 0, "Erreur Institut", 16
    WScript.Quit 1
End If

sh.Popup "Demarrage en cours..." & vbCrLf & vbCrLf & "1. Une fenetre NOIRE va s ouvrir" & vbCrLf & "2. NE LA FERMEZ PAS" & vbCrLf & "3. Le navigateur s ouvrira apres", 8, "Institut", 64

cmdLine = "cmd /k cd /d """ & dir & """ && title INSTITUT && echo. && echo ===== INSTITUT - SERVEUR ===== && echo. && """ & php & """ -c """ & ini & """ artisan serve --host=127.0.0.1 --port=8000"

sh.Run cmdLine, 1, False

WScript.Sleep 6000
sh.Run "http://127.0.0.1:8000", 1, False
