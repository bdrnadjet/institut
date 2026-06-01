Set sh = CreateObject("WScript.Shell")
Set fso = CreateObject("Scripting.FileSystemObject")

url = "http://localhost/institut"
chrome = sh.ExpandEnvironmentStrings("%ProgramFiles%\Google\Chrome\Application\chrome.exe")
chromeX86 = sh.ExpandEnvironmentStrings("%ProgramFiles(x86)%\Google\Chrome\Application\chrome.exe")
apacheStart = "C:\xampp\apache_start.bat"

If fso.FileExists(apacheStart) Then
    On Error Resume Next
    Set http = CreateObject("WinHttp.WinHttpRequest.5.1")
    http.Open "GET", url, False
    http.SetTimeouts 2000, 2000, 2000, 2000
    http.Send
    If Err.Number <> 0 Or http.Status <> 200 Then
        sh.Run """" & apacheStart & """", 0, False
        WScript.Sleep 5000
    End If
    On Error GoTo 0
End If

If fso.FileExists(chrome) Then
    sh.Run """" & chrome & """ """ & url & """", 1, False
ElseIf fso.FileExists(chromeX86) Then
    sh.Run """" & chromeX86 & """ """ & url & """", 1, False
Else
    sh.Run url, 1, False
End If
