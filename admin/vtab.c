#include<stdio.h>
#include<string.h>

struct tabl
{
	char orig[100];
	char repl[100];
};

void main()
{
	struct tabl tab;
	FILE *ptr,*ptr2;
	char org[100],rep[100];
	ptr=fopen("rtab.dat","r");
	ptr2=fopen("tmpp","wa");
	int i;
	while(fread(&tab,sizeof(tab),1,ptr))
	{
		strcpy(org,tab.orig);
		strcpy(rep,tab.repl);
		fprintf(ptr2,"%s ----> %s\n",org,rep);
	}
	fclose(ptr);
	fclose(ptr2);
}
