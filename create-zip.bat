@REM Create ZIP File Script - Run this batch file to create the submission ZIP
@REM This will create sia-2-activities-CRUD.zip

@echo off
setlocal enabledelayedexpansion

echo Creating Project ZIP File...
echo.

cd /d "c:\Users\ACER\Desktop\Website\Laravel Project Test"

REM Check if the source folder exists
if not exist "sia-2-activities" (
    echo ERROR: sia-2-activities folder not found!
    pause
    exit /b 1
)

REM Remove existing ZIP if present
if exist "sia-2-activities-CRUD.zip" (
    echo Removing existing ZIP file...
    del "sia-2-activities-CRUD.zip"
)

REM Create the ZIP using PowerShell
echo Creating sia-2-activities-CRUD.zip...
powershell -NoProfile -ExecutionPolicy Bypass -Command ^
    "$source = 'sia-2-activities'; $dest = 'sia-2-activities-CRUD.zip'; Add-Type -A 'System.IO.Compression.FileSystem'; [System.IO.Compression.ZipFile]::CreateFromDirectory($source, $dest); Write-Host 'ZIP creation completed!'; Get-Item $dest -ErrorAction SilentlyContinue | ForEach-Object { Write-Host \"Size: $([math]::Round($_.Length/1MB, 2)) MB\" }"

echo.
echo ZIP file creation complete!
if exist "sia-2-activities-CRUD.zip" (
    echo File: sia-2-activities-CRUD.zip
    echo Location: c:\Users\ACER\Desktop\Website\Laravel Project Test\sia-2-activities-CRUD.zip
    echo.
    echo Ready for submission!
) else (
    echo ERROR: ZIP file was not created
)

pause
