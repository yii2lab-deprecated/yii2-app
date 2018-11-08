@echo off
cd ..\..
php yii_test migrate/down 1111
php yii_test migrate
pause