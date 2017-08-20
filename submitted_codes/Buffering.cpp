/**************************************
* Author: Habibur Rahman Habib	      *
* Description:Buffering.cpp           *
* Date: 24th October 2013	          *
***************************************/
#include<iostream>
using namespace std;
int main()
{
    char ch;
    while(cin>>ch)
    {
        if(ch=='x')
        {
            cout<<"The program ended.\n";
            break;
        }
    }
    return 0;
}
