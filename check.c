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

void main()
{
	struct tabl tab,arr[100];
	int len,wl,i,j,k,flag;
	FILE *ptr,*ptr2;
	char words[50][20],new[300],str[1000];
	ptr=fopen("rtab.dat","r");
	ptr2=fopen("tmpp","r");
	len=0;
	while(fread(&tab,sizeof(tab),1,ptr))
		arr[len++]=tab;
	fclose(ptr);
	fgets(str,1000,ptr2);
	str[strlen(str)]='\0';
	fclose(ptr2);
	for(i=0,wl=0,j=0;str[i]!='\0';i++)
	{
		if(str[i]!=' ')
			words[wl][i-j]=str[i];
		else
		{
			words[wl++][i-j]='\0';
			while(str[i+1]==' ')
				i++;
			j=i+1;
		}
	}
	words[wl++][i-j]='\0';
	flag=1;
	for(i=0;i<wl;i++)
	{
		for(j=0;j<len;j++)
			if(stricmp(words[i],arr[j].orig)==0)
				flag=0;
	}
	for(i=0,k=0;i<wl;i++)
	{
		for(j=0;words[i][j]!='\0';j++)
			new[k++]=words[i][j];
		new[k++]=' ';
	}
	new[k-1]='\0';
	if(flag==1)
		printf("%s",new);
	else
		printf("sqlinjection");
}
