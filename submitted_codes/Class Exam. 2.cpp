#include<iostream>
using namespace std;
class myclass
{
//private
private: int a;
public: int aa;
};
int main()
{
    myclass obj_1,obj_2;
    obj_1.aa=123044;
    obj_2.aa=123025;
    cout<<obj_1.aa<<endl;
    cout<<obj_2.aa<<endl;
    return 0;
}
