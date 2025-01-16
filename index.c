#include <stdio.h>
#include <string.h>
#include <ctype.h>

void highlightMotamem(const char *text) {
    char word[100];
    const char *delimiters = " \n";
    char *token = strtok((char *)text, delimiters); //  برای تقسیم متن

    while (token != NULL) {
        // بررسی متمم‌ها
        if (strcmp(token, "به") == 0 || strcmp(token, "از") == 0 || 
            strcmp(token, "در") == 0 || strcmp(token, "با") == 0) {
            printf("%s ", token); // چاپ حرف اضافه
            token = strtok(NULL, delimiters); // کلمه بعدی
            if (token != NULL) {
                printf("\033[1;33m%s\033[0m ", token); // هایلایت متمم با رنگ زرد
            }
        } else {
            printf("%s ", token); // چاپ کلمات دیگر
        }
        token = strtok(NULL, delimiters); // ادامه تقسیم متن
    }
}

int main() {
    char text[500];

    printf("متن خود را وارد کنید: ");
    fgets(text, sizeof(text), stdin); // خواندن متن از ورودی

    printf("خروجی:\n");
    highlightMotamem(text); // فراخوانی تابع

    return 0;
}