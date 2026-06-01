Set sh = CreateObject("WScript.Shell")
Set fso = CreateObject("Scripting.FileSystemObject")
dir = "C:\Users\moi\Downloads\institut"

If Not fso.FolderExists("C:\xampp\htdocs\institut") And Not fso.FileExists("C:\xampp\apache\conf\extra\httpd-institut.conf") Then
    r = sh.Popup("Configuration XAMPP requise." & vbCrLf & vbCrLf & "Cliquez OK puis double-cliquez:" & vbCrLf & "configurer_xampp.bat" & vbCrLf & "dans le dossier institut", 0, "Institut", 48)
    sh.Run "explorer.exe """ & dir & """", 1, False
    WScript.Quit 0
End If

If fso.FileExists("C:\xampp\apache_start.bat") Then
    sh.Run """C:\xampp\apache_start.bat""", 0, False
    WScript.Sleep 4000
End If

sh.Popup "Ouverture de l'application..." & vbCrLf & vbCrLf & "Adresse: http://localhost/institut" & vbCrLf & vbCrLf & "Si la page ne s'ouvre pas:" & vbCrLf & "1. Ouvrez XAMPP Control Panel" & vbCrLf & "2. Demarrez Apache (Start)", 5, "Institut", 64

sh.Run "http://localhost/institut", 1, False
