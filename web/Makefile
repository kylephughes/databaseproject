# Top-Level Makefile for Web Programming students
# Nothing too fancy; should be mostly understandable
# (Remember that Makefile commands are interpreted by /bin/sh, not
# by the C-shell.)
#
# by Darren Provine, 14 September 2002

DIRS  = hw2 hw6 hw8


# This target is just here to be the top target in the Makefile.
# Thus, "make" will compile but not install the program.
# Subdirectories with plain HTML files won't have anything that
# needs doing for "make all", so those will be empty.
all:
	for d in $(DIRS) ; do (cd $$d ; make ) ; done

install:
	for d in $(DIRS) ; do (cd $$d ; make install ) ; done

deinstall:
	for d in $(DIRS) ; do (cd $$d ; make deinstall ) ; done

redo:
	for d in $(DIRS) ; do (cd $$d ; make redo ) ; done

clean:
	for d in $(DIRS) ; do (cd $$d ; make clean ) ; done
