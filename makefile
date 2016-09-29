
CC = g++
CFLAGS = -Wall -Wextra -g -Werror -I
LFLAGS = 

RM = rm 
RMFLAGS = -rf 

SRCS = src/

SRCS_COMPILE = src/cpp/compile.cpp
SRCS_EXECUTE = src
SRCS_COMPARE = src/


INCLUDES = include/

LIBS = -lm

all: Controller Compile Execute Compare

clean:	
	$(RM) $(RMFLAGS) bin/* tmp/*

clean_temp:
	$(RM) $(RMFLAGS) tmp/*

clean_objects:
	&(RM) $(RMFLAGS) bin/*

Controller:	

Compile:	$(SRCS_COMPILE)
	$(CC) $(CFLAGS) $(INCLUDES) -o bin/Compile $(SRCS_COMPILE) $(LIBS)

Execute:

Compare: 