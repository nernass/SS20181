#include <stdio.h>
#include<string.h>
void merge(char *s1, size_t L1, char *s2, size_t L2){    
    int flag = 100;
    char buff[10];
    if( L1 + L2 + 1 <= sizeof(buff)){
        strncpy(buff,s1,L1);
        strncat(buff,s2,L2);
        printf("String is : %s\n and falg is: %d\n",buff,flag);   
    }
    else printf("Long String ....\n");
}

int main(){    
    merge("0123456789",0xA,"ABCDE",0XFFFFFFFFFFFFFFFF);
    return 0;
}



