# Makefile
# 
# by Christopher Crouch
#
DESTDIR = /export/home/hughes72/public_html/db/

TARGETS = Connect.php test.php start.php load.php a.php viewA.php addA.php deleteA.php modifyA.php \
          b.php viewB.php addB.php modifyB.php deleteB.php \
          c.php viewC.php addC.php modifyC.php deleteC.php \
          d.php viewD.php m.php n.php o.php p.php q.php viewQ.php r.php s.php viewS.php l.php \
	k.php viewK.php viewI.php j.php addRate.php

SOURCES = Connect.php test.php start.php load.php a.php viewA.php addA.php deleteA.php modifyA.php \
          b.php viewB.php addB.php modifyB.php deleteB.php \
          c.php viewC.php addC.php modifyC.php deleteC.php \
          d.php viewD.php m.php n.php o.php p.php q.php viewQ.php r.php s.php viewS.php l.php \		k.php viewK.php viewI.php j.php addRate.php


# This target is just here to be the top target in the Makefile.
# There's nothing to compile for this one.
all: $(TARGETS)

# You might want to look up mkdir(1) to see about that -p flag.
install: $(TARGETS)
	@if [ ! -d $(DESTDIR) ] ; then mkdir -p $(DESTDIR); fi
	@for f in $(TARGETS)                 ; \
	do                                     \
		/usr/bin/install -v -t $(DESTDIR) -m 444 $$f ; \
	done

# Note that here we don't blow away the directory, and so we
# be sure and tell the user.  The reason not to delete the
# directory is that it may have other files in it.  Checking
# for, and deleting, any such files will have to be done manually.
# (How could this be improved?)
#
# Note also that the @ sign keeps the echo lines from being echoed
# before they are run.  (That could be confusing.)  This little
# trick (and many more) can be discovered by consulting make(1S).
deinstall:
	cd $(DESTDIR) ; /bin/rm -f $(TARGETS)
@echo "   ==>   removed file(s): $(TARGETS)"
@echo "   ==>   left directory : $(DESTDIR)"

redo: deinstall install

clean:
	/bin/rm -f core $(TARGETS)
