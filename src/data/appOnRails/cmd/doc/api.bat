@echo off
cd ../..
rmdir /S /Q "./frontend/web/doc/api"
"vendor/bin/apidoc" api "." "./frontend/web/doc/api"
pause