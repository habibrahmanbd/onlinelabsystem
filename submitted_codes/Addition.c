#include <stdio.h>
int  main()
{
    int a,b,c,d,e;
    printf("PLEASE THE NUMBER YOU WANT:");
    scanf("%d", &a);
    printf("PLEASE THE NUMBER YOU WANT:");
    scanf("%d",&b);
    printf("PLEASE THE NUMBER YOU WANT:");
    scanf("%d",&c);
    printf("PLEASE THE NUMBER YOU WANT:");
    scanf("%d",&d);
    e=a+b+c+d;
    printf("%d+%d+%d+%d=%d\n", a,b,c,d,e);
    getchar();
}
