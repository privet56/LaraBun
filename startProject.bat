set "PATH=%~dp0.\devenv\git;%~dp0.\devenv\git\bin;%PATH%"
set "PATH=%~dp0.\devenv\nodejs;%~dp0.\devenv\nodejs\node_modules\npm;%PATH%"
set "PATH=%~dp0.\devenv\php;%PATH%"

set APPDATA=%~dp0./devenv/MsVSCode
set USERPROFILE=%~dp0./devenv/MsVSCode

start "" %~dp0./devenv/MsVSCode/Code.exe %~dp0
rem start "" cmd /c "timeout 9 & start http://localhost:4200/"
rem ./node_modules/.bin/ng serve
