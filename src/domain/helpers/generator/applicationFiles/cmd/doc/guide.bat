@echo off
cd ../..
rmdir /S /Q "./frontend/web/doc/guide"
"vendor/bin/apidoc" guide "./common/docs" "./frontend/web/doc/guide"