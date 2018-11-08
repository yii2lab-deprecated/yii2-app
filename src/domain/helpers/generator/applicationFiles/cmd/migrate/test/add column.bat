@echo off
cd ..\..\..
php yii_test migrate/create add_{column}_column_to_{table}_table --fields={column}:integer
pause