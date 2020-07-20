#include<stdio.h>
#include<string.h>
#include<time.h>

struct tabl
{
	char orig[100];
	char repl[100];
};

void hash(char *word,char *key)
{
	int i,j,l,res;
	char interm[100];
	for(i=0,j=0,l=time(NULL);word[i]!='\0' && key[j]!='\0';i++,j++)
	{
		res=(int)(word[i]+key[j]+l)%26+65;
		interm[i]=(char)res;
	}
	while(word[i]!='\0')
	{
		if(key[j]=='\0')
		j=0;
		res=(int)(word[i]+key[j++]+l)%26+65;
		interm[i++]=(char)res;
	}
	while(key[j]!='\0')
	{
		if(word[i]=='\0')
		i=0;
		res=(int)(word[i++]+key[j]+l)%26+65;
		interm[j++]=(char)res;
	}
	l=(i>j)?i:j;
	interm[l]='\0';
	strcat(word,interm);
}

void main(int argc,char **argv)
{
	struct tabl tmp;
	FILE *ptr;
	int i;
	char key[100];

	char arr[][50]={
	"ADD",
	"CONSTRAINT",
	"ALTER",
	"COLUMN",
	"TABLE",
	"ALL",
	"AND",
	"ANY",
	"AS",
	"ASC",
	"BACKUP",
	"DATABASE",
	"BETWEEN",
	"CASE",
	"CHECK",
	"CREATE",
	"INDEX",
	"OR",
	"REPLACE",
	"VIEW",
	"PROCEDURE",
	"UNIQUE",
	"DEFAULT",
	"DELETE",
	"DESC",
	"DISTINCT",
	"DROP",
	"EXEC",
	"EXISTS",
	"FOREIGN",
	"KEY",
	"FROM",
	"FULL",
	"OUTER",
	"JOIN",
	"GROUP",
	"BY",
	"HAVING",
	"IN",
	"INNER",
	"INSERT",
	"INTO",
	"SELECT",
	"IS",
	"NULL",
	"NOT",
	"LEFT",
	"LIKE",
	"LIMIT",
	"ORDER",
	"OUTER",
	"PRIMARY",
	"RIGHT",
	"ROWNUM",
	"TOP",
	"SET",
	"TRUNCATE",
	"UNION",
	"ALL",
	"UNIQUE",
	"UPDATE",
	"VALUES",
	"VIEW",
	"WHERE"
	};

	strcpy(key,argv[1]);
	ptr=fopen("rtab.dat","w");
	for(i=0;i<64;i++)
	{
		strcpy(tmp.orig,arr[i]);
		hash(arr[i],key);
		strcpy(tmp.repl,arr[i]);
		fwrite(&tmp,sizeof(tmp),1,ptr);

	}
	fclose(ptr);
}
