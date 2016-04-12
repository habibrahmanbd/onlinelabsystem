#include<stdio.h>
#include<math.h>
int main()
{
    long int a[100],n,i,sum,b,k;
    scanf("%d",&n);
    k=n;
    i=0;
    while (n>0){
    a[i]=n%10;
    n/=10;
    i++;
   }
   b=i;
   sum=0;
   for(i=0; i<b; i++){
    sum+=a[i]*a[i]*a[i];
   }
   if(sum==k)
    printf("this is armostrong number.");
   else
    printf("This is not armostrong number");
   return 0;
}
