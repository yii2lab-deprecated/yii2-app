@echo off
cd ..\..\..
php yii migrate/create add_{column}_column_to_{table}_table --fields={column}:integer
pause