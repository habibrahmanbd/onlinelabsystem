//! Bismillahi-Rahamanirahim.
/** ========================================**
 ** @Author: A Asif Khan Chowdhury
/** ========================================**/


/**................ Headers ................**/
#include <bits/stdc++.h>

using namespace std;

/**................ Macros ................**/
#define Set(N, j) (N|(1<<j))
#define reset(N, j) (N&~(1<<j))
#define Check(N, j) (bool)(N&(1<<j))
#define toggle(N, j) (N^(1<<j))
#define turnOff(N, j) (N & ~(1<<j))
#define CLEAR(A, x) ( memset(A,x,sizeof(A)) )
#define pii pair <int, int>
#define pb push_back
#define open freopen("D:/a.txt", "r", stdin);
#define write freopen("D:/b.txt","w", stdout);
#define inf (1<<28)
#define ll long long
#define mod 1000000007
#define debug cout<<"ok"<<endl;
#define gc getchar
#define ls(n) (n<<1)
#define rs(n) ls(n)|1
#define MID(a,b) ((a+b)>>1)
#define fs first
#define sc second
#define mx 1010

//Fast Reader
template<class T>inline bool read(T &x) {
    int c=getchar();
    int sgn=1;
    while(~c&&c<'0'||c>'9') {
        if(c=='-')sgn=-1;
        c=getchar();
    }
    for(x=0; ~c&&'0'<=c&&c<='9'; c=getchar())x=x*10+c-'0';
    x*=sgn;
    return ~c;
}
int X[]= {-1, -1, -1, 0, 1, 1, 1, 0};   //x 8 direction
int Y[]= {-1, 0, +1, 1, 1, 0, -1, -1};  //y 8 direction
// int X[]= {-1, 0, 1, 0};   //x 4 direction
// int Y[]= { 0, 1, 0, -1};  //y 4 direction


int a1[mx],a2[mx],n;
string s1,s2;

int main() {
#ifdef LOCAL
    open
    write
#endif // LOCAL

    int test;
    read(test);
    for(int C=1; C<=test; C++) {
        read(n);
        cin>>s1>>s2;
        CLEAR(a1,0);
        CLEAR(a2,0);

        int cnt=0;
        for(int i=0; i<n; i++) {
            if(s1[i]=='.')
                a1[i]=++cnt;
            else cnt=0;
        }
        cnt=0;
        for(int i=0; i<n; i++) {
            if(s2[i]=='.')
                a2[i]=++cnt;
            else cnt=0;
        }
        for(int i=n-1; i>=0; i--) {
            if(a1[i]!=0)a1[i]=max(a1[i],a1[i+1]);
            if(a2[i]!=0)a2[i]=max(a2[i],a2[i+1]);
        }
        int ans=0;
        bool used=false;
        for(int i=0; i<n; i++) {
            if(a1[i]==1) {
                ans++;
                a1[i]=0;
                if(a2[i]!=0) {
                    int j=i+1;
                    while(a2[j]!=0 and j<n) {
                        a2[j]=0;
                        j++;
                    }
                    j=i;
                    while(a2[j]!=0 and j>=0) {
                        a2[j]=0;
                        j--;
                    }
                }
            }

            if(a2[i]==1) {
                ans++;
                a2[i]=0;
                if(a1[i]!=0) {
                    int j=i+1;
                    while(a1[j]!=0 and j<n) {
                        a1[j]=0;
                        j++;
                    }
                    j=i;
                    while(a1[j]!=0 and j>=0) {
                        a1[j]=0;
                        j--;
                    }
                }
            }

        }
        for(int i=0; i<n; i++) {
            if(i==0) {
                if(a1[i]!=0)ans++;
                if(a2[i]!=0)ans++;
            } else {
                if(a1[i]!=0 and a1[i-1]==0)
                    ans++;
                if(a2[i]!=0 and a2[i-1]==0)
                    ans++;
            }
        }
        printf("Case #%d: ", C);
        printf("%d\n",ans);
    }
    return 0;
}




