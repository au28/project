#include<stdio.h>
#include<string.h>
#include<ctype.h>

struct tabl
{
	char orig[100];
	char repl[100];
};

int stricmp(char const *a, char const *b)
{
	int d;
	for(;*a!='\0' && *b!='\0';a++,b++)
	{
        	d=tolower((unsigned char)*a) - tolower((unsigned char)*b);
		if(d!=0)
			return d;
	}
	if(*a=='\0' && *b=='\0')
		return 0;
}

void main(int argc,char **argv)
{
	struct tabl tab,arr[100];
	int len,wl,i,j,k;
	FILE *ptr;
	char words[50][20],new[300];
	ptr=fopen("rtab.dat","r");
	len=0;
	while(fread(&tab,sizeof(tab),1,ptr))
		arr[len++]=tab;
	fclose(ptr);
	for(i=1;i<argc;i++)
	{
		strcpy(words[i-1],argv[i]);
	}
	wl=argc-1;
	for(i=0;i<wl;i++)
	{
		for(j=0;j<len;j++)
			if(stricmp(words[i],arr[j].orig)==0)
			{
				strcpy(words[i],arr[j].repl);
				break;
			}
	}
	for(i=0,k=0;i<wl;i++)
	{
		for(j=0;words[i][j]!='\0';j++)
			new[k++]=words[i][j];
		new[k++]=' ';
	}
	new[k-1]='\0';
	printf("%s",new);
}
