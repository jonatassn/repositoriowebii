#include <stdio.h>
#include <stdlib.h>

int main() {
	system("composer install");
	system("npm install");
	system("sudo cp .env.example .env");
	system("php artisan key:generate");
	system("nano .env");



	return 0;
}