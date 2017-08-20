#pragma warning(disable:4786)
#pragma warning(disable:4996)
#include<list>
#include<bitset>
#include<iostream>
#include<cstdio>
#include<algorithm>
#include<vector>
#include<set>
#include<map>
#include<functional>
#include<string>
#include<cstring>
#include<cstdlib>
#include<queue>
#include<utility>
#include<fstream>
#include<sstream>
#include<cmath>
#include<stack>
#include<assert.h>
using namespace std;

#define MEM(a, b) memset(a, (b), sizeof(a))
#define CLR(a) memset(a, 0, sizeof(a))
#define MAX(a, b) ((a) > (b) ? (a) : (b))
#define MIN(a, b) ((a) < (b) ? (a) : (b))
#define ABS(X) ( (X) > 0 ? (X) : ( -(X) ) )
#define S(X) ( (X) * (X) )
#define SZ(V) (int )V.size()
#define FORN(i, n) for(i = 0; i < n; i++)
#define FORAB(i, a, b) for(i = a; i <= b; i++)
#define ALL(V) V.begin(), V.end()
#define IN(A, B, C)  ((B) <= (A) && (A) <= (C))

typedef pair<int,int> PII;
typedef pair<double, double> PDD;
typedef vector<int> VI;
typedef vector<PII > VP;

#define AIN(A, B, C) assert(IN(A, B, C))

//typedef int LL;
//typedef long long int LL;
//typedef __int64 LL;

char word[303][100005];
int len[303];
int lcp[303][303];
int N, K;

int cmp(int a, int b) {
	return strcmp(word[a], word[b]) < 0;
}

int dp[303][303];

int DP(int at, int rem) {
	if (rem == 0) return 2 * len[at];
	if (at == N) return 1000000000;
	int &ret = dp[at][rem];
	if (ret != -1) return ret;
	ret = 1000000000;
	for (int ne = at + 1; ne < N; ne++) {
		int now = DP(ne, rem - 1) - 2 * lcp[at][ne];
		ret = MIN(now, ret);
	}
	return ret += 2 * len[at];
}

int main()
{
	int T;
	scanf("%d", &T);
	for (int ks = 1; ks <= T; ks++) {
		scanf("%d %d", &N, &K);
		VI V;
		for (int i = 0; i < N; i++) {
			V.push_back(i);
			scanf("%s", word[i]);
		}

		sort(ALL(V), cmp);
		for (int i = 0; i < N; i++) {
			len[i] = strlen(word[V[i]]);
		}

		for (int i = 1; i < N; i++) {
			int &z = lcp[i - 1][i];
			z = 0;
			while (z < MIN(len[i - 1], len[i]) && word[V[i - 1]][z] == word[V[i]][z]) z++;
		}
		for (int l = 3; l <= N; l++) {
			for (int i = 0; i + l - 1 < N; i++) {
				lcp[i][i + l - 1] = MIN(lcp[i][i + 1], lcp[i + 1][i + l - 1]);
			}
		}
		int ans = 1000000000;
		MEM(dp, -1);
		for (int i = 0; i < N; i++) {
			int now = DP(i, K - 1);
			ans = MIN(ans, now);
		}
		printf("Case #%d: %d\n", ks, ans + K);
	}
	return 0;
}
