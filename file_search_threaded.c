#define _GNU_SOURCE
#include <stdio.h>
#include <stdlib.h>
#include <sys/types.h>
#include <dirent.h>
#include <string.h>
#include <sys/time.h>
#include <errno.h>
#include <pthread.h>

//takes a file/dir as argument, recurses,
// prints name if empty dir or not a dir (leaves)
//void recur_file_search(char *file);
void *recur_file_search(void *arg);
void find_Files(char *file);
void *display();

//share search term globally (rather than passing recursively)
const char *search_term;

char **all_files = NULL;
//char * all_files[350];
int size = 0;
int ct = 0;
#define N 4

struct str_info {
        char *str; //pointer to starting point in string
        //int num; //how many characters to print
        //int len; //length of string for bounds checking
};

int main(int argc, char **argv)
{
	if(argc != 3)
	{
		printf("Usage: my_file_search <search_term> <dir>\n");
		printf("Performs recursive file search for files/dirs matching\
				<search_term> starting at <dir>\n");
		exit(1);
	}
	
	pthread_t threads[N];
	
	//don't need to bother checking if term/directory are swapped, since we can't
	// know for sure which is which anyway
	search_term = argv[1];

	//open the top-level directory
	DIR *dir = opendir(argv[2]);

	//make sure top-level dir is openable (i.e., exists and is a directory)
	
	if(dir == NULL)
	{
		perror("opendir failed");
		exit(1);
	}
	
	find_Files(argv[2]);
	int k;
	
	//printf("\n********Display************\n");
	//printf("\nSIZE: %d\n", size);
	/*
	for(k = 0; k < size; k++)
	{
		printf("\n%s", all_files[k]);
	}
	*/
	//start timer for recursive search
	struct timeval start, end;
	gettimeofday(&start, NULL);
	int i;
	
	struct str_info *p1_info = malloc(sizeof(struct str_info));;
    p1_info->str = argv[2];
	
	//pthread_create(&p1, NULL, printstr, p1_info);
	/**********************************************************/
	
	
	/*********************************************************/
	//printf("\nHere 1\n");
	
	for(i = 0; i < N; i++)
	{
		//printf("\nHere 2\n");
		pthread_create(threads + i, NULL, display, (void*)NULL);
		//recur_file_search(argv[2]);
		//pthread_join(p1, NULL);
		//pthread_join(threads[i], NULL);
	}
	
	for(i = 0; i < N; i++)
	{
		//printf("\nHere 2.0\n");
		//pthread_create(threads + i, NULL, recur_file_search, p1_info);
		//recur_file_search(argv[2]);
		//pthread_join(p1, NULL);
		pthread_join(threads[i], NULL);
		//pthread_tryjoin_np(threads[i], NULL);
	}
	/*
	for(i = 0; i < N; i++)
	{
		printf("\nHere 2\n");
		pthread_create(threads + i, NULL, recur_file_search, p1_info);
		//recur_file_search(argv[2]);
		//pthread_join(p1, NULL);
		//pthread_join(threads[i], NULL);
	}
	
	for(i = 0; i < N; i++)
	{
		printf("\nHere 2.0\n");
		//pthread_create(threads + i, NULL, recur_file_search, p1_info);
		//recur_file_search(argv[2]);
		//pthread_join(p1, NULL);
		pthread_join(threads[i], NULL);
		//pthread_tryjoin_np(threads[i], NULL);
	}
	
	*/
	gettimeofday(&end, NULL);
	printf("Time: %ld\n", (end.tv_sec * 1000000 + end.tv_usec)
			- (start.tv_sec * 1000000 + start.tv_usec));
	
	free(p1_info);
	return 0;
}


//This function takes a path to recurse on, searching for mathes to the
// (global) search_term.  The base case for recursion is when *file is
// not a directory.
//Parameters: the starting path for recursion (char *), which could be a
// directory or a regular file (or something else, but we don't need to
// worry about anything else for this assignment).
//Returns: nothing
//Effects: prints the filename if the base case is reached *and* search_term
// is found in the filename; otherwise, prints the directory name if the directory
// matches search_term.

//char *file
void *recur_file_search(void *arg)
{
	struct str_info *s = arg;
    char *file = s->str;
	
	//printf("\nIn recur file Search\n");
	//check if directory is actually a file
	
	DIR *d = opendir(file);

	//NULL means not a directory (or another, unlikely error)
	if(d == NULL)
	{
		//opendir SHOULD error with ENOTDIR, but if it did something else,
		// we have a problem (e.g., forgot to close open files, got
		// EMFILE or ENFILE)
		if(errno != ENOTDIR)
		{	
			perror("Something weird happened!");
			fprintf(stderr, "While looking at: %s\n", file);
			exit(1);
		}

		//nothing weird happened, check if the file contains the search term
		// and if so print the file to the screen (with full path)
		//printf("\nHere 3\n");
		if(strstr(file, search_term) != NULL)
			printf("%s\n", file);

		//no need to close d (we can't, it is NULL!)
		return NULL;
	}

	//we have a directory, not a file, so check if its name
	// matches the search term
	//printf("\nHere 4\n");
	if(strstr(file, search_term) != NULL)
		printf("%s/\n", file);

	//call recur_file_search for each file in d
	//readdir "discovers" all the files in d, one by one and we
	// recurse on those until we run out (readdir will return NULL)
	struct dirent *cur_file;
	while((cur_file = readdir(d)) != NULL)
	{
		//make sure we don't recurse on . or ..
		if(strcmp(cur_file->d_name, "..") != 0 &&\
				strcmp(cur_file->d_name, ".") != 0)
		{
			//we need to pass a full path to the recursive function, 
			// so here we append the discovered filename (cur_file->d_name)
			// to the current path (file -- we know file is a directory at
			// this point)
			//printf("\nHere 5\n");
			char *next_file_str = malloc(sizeof(char) * \
					strlen(cur_file->d_name) + \
					strlen(file) + 2);

			strncpy(next_file_str, file, strlen(file));
			strncpy(next_file_str + strlen(file), \
					"/", 1);
			strncpy(next_file_str + strlen(file) + 1, \
					cur_file->d_name, \
					strlen(cur_file->d_name) + 1);

			//recurse on the file
			
			//struct str_info *s = arg;
			//char *file = s->str;
			struct str_info *p1_info = malloc(sizeof(struct str_info));;
			p1_info->str = next_file_str;
			
			recur_file_search(p1_info);
			//recur_file_search(next_file_str);

			//free the dynamically-allocated string
			free(next_file_str);
		}
	}

	//close the directory, or we will have too many files opened (bad times)
	closedir(d);
	
	return NULL;
}

void find_Files(char *file)
{
	//struct str_info *s = arg;
    //char *file = s->str;
	
	//printf("\nIn recur file Search\n");
	//check if directory is actually a file
	
	//printf("\nIn find files\n");
	DIR *d = opendir(file);

	//NULL means not a directory (or another, unlikely error)
	if(d == NULL)
	{
		//opendir SHOULD error with ENOTDIR, but if it did something else,
		// we have a problem (e.g., forgot to close open files, got
		// EMFILE or ENFILE)
		if(errno != ENOTDIR)
		{	
			perror("Something weird happened!");
			fprintf(stderr, "While looking at: %s\n", file);
			exit(1);
		}

		//nothing weird happened, check if the file contains the search term
		// and if so print the file to the screen (with full path)
		//printf("\nHere 3\n");
		/*
		if(strstr(file, search_term) != NULL)
			printf("%s\n", file);
		*/
		
		//printf("\nAdding Files\n");
		//Line is file
		//size = num_lines
		all_files = realloc(all_files, sizeof(char *) * (size + 1));
		all_files[size] = malloc(sizeof(char) * strlen(file) + 1);
		
		int j;
		for(j = 0; j < strlen(file); j++)
		{
			all_files[size][j] = file[j];
		}
		all_files[size][j] = '\0';
		
		size++;
		//all_files[size] = file;
		//size++;
		//no need to close d (we can't, it is NULL!)
		return;
	}

	//we have a directory, not a file, so check if its name
	// matches the search term
	//printf("\nHere 4\n");
	if(strstr(file, search_term) != NULL)
		printf("%s/\n", file);

	//call recur_file_search for each file in d
	//readdir "discovers" all the files in d, one by one and we
	// recurse on those until we run out (readdir will return NULL)
	struct dirent *cur_file;
	while((cur_file = readdir(d)) != NULL)
	{
		//make sure we don't recurse on . or ..
		if(strcmp(cur_file->d_name, "..") != 0 &&\
				strcmp(cur_file->d_name, ".") != 0)
		{
			//we need to pass a full path to the recursive function, 
			// so here we append the discovered filename (cur_file->d_name)
			// to the current path (file -- we know file is a directory at
			// this point)
			//printf("\nHere 5\n");
			char *next_file_str = malloc(sizeof(char) * \
					strlen(cur_file->d_name) + \
					strlen(file) + 2);

			strncpy(next_file_str, file, strlen(file));
			strncpy(next_file_str + strlen(file), \
					"/", 1);
			strncpy(next_file_str + strlen(file) + 1, \
					cur_file->d_name, \
					strlen(cur_file->d_name) + 1);

			//recurse on the file
			
			//struct str_info *s = arg;
			//char *file = s->str;
			//struct str_info *p1_info = malloc(sizeof(struct str_info));;
			//p1_info->str = next_file_str;
			
			//recur_file_search(p1_info);
			find_Files(next_file_str);

			//free the dynamically-allocated string
			free(next_file_str);
		}
	}

	//close the directory, or we will have too many files opened (bad times)
	closedir(d);
	
}

void *display(void *args)
{
	int num = ct++;
	int i;
	for(i = num * (size / N); i < ((num + 1) * (size / N)); i++)
	{
		if(strstr(all_files[i], search_term) != NULL)
			printf("%s\n", all_files[i]);
	}
}