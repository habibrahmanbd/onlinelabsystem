using namespace std;
#include<bits/stdc++.h>


int main()
{
    long long t;
    cin>>t;
    for(long long cs=1; cs<=t; cs++)
    {
        cout<<"Case "<<cs<<":\n";
        long long n;
        cin>>n;
        long long arr[n];
        for(long long i=0; i<n ; i++)
            cin>>arr[i];
        long long p;
        cin>>p;
        sort(arr,arr+n);
        if(p==1)
        {
            cout<<arr[0];
            for(long long i=1; i<n;  i++)
                cout<<" "<<arr[i];
        }
        else
        {
            reverse(arr, arr+n);
            cout<<arr[0];
            for(long long i=1; i<n;  i++)
                    cout<<" "<<arr[i];
        }
       cout<<"\n";
    }
    return 0;
}
