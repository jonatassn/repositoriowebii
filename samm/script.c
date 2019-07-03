#include <stdio.h>
#include <stdlib.h>

int main() {
	system("composer install");
	system("npm install");
	system("cp .env.example .env");
	system("php artisan key:generate");
	system("php artisan migrate:fresh");
	system("php artisan db:seed");
	system("php artisan serve");
	//system("nano .env");



	return 0;
}