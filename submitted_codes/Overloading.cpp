/**************************************
* Author: Habibur Rahman Habib	      *
* Description:    overloading         *
* Date: 3rd December, 2013	          *
***************************************/
#include<iostream>
using namespace std;
// overload abs() three ways
int abs(int n);
long abs(long n);
double abs(double n);
int main()
{
    cout<<"Absoulte value of -10: "<<abs(-10)<<endl;
    cout<<"Absoulte value of -10L: "<<abs(-10L)<<endl;
    cout<<"Absoulte value of -10.01: "<<abs(-10.01)<<endl;
    return 0;
}
//abs() for ints
int abs(int n)
{
    if(n<0)
    return n*-1;
    else return n;
}
long abs(long n)
{
    if(n<0)
    return n*-1;
    else return n;
}
double abs(double n)
{
    if(n<0.0)
    return n*-1.0;
    else return n;
}
