@echo off
cd ..\..
php yii vendor/git/pull
php yii vendor/git/push
pause