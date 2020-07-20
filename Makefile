PREFIX = /usr/local
SROOT = /srv/http

sqlsec: rand.c check.c derand.c
	gcc rand.c -o rand.bin
	gcc check.c -o check.bin
	gcc derand.c -o derand.bin
	gcc admin/wtab.c -o wtab.bin
	gcc admin/vtab.c -o vtab.bin

clean:
	rm -f rand.bin
	rm -f check.bin
	rm -f derand.bin
	rm -f wtab.bin
	rm -f vtab.bin

install: sqlsec rand.bin derand.bin check.bin wtab.bin vtab.bin
	cp -f rand.bin $(PREFIX)/bin/
	cp -f check.bin $(PREFIX)/bin/
	cp -f derand.bin $(PREFIX)/bin/
	cp -f wtab.bin $(PREFIX)/bin/
	cp -f vtab.bin $(PREFIX)/bin/
	cp -f sqlsec.start $(PREFIX)/bin/
	cp -f sqlsec.stop $(PREFIX)/bin/
	cp -f sqlsec.log $(PREFIX)/bin/
	chmod 755 $(PREFIX)/bin/rand.bin
	chmod 755 $(PREFIX)/bin/check.bin
	chmod 755 $(PREFIX)/bin/derand.bin
	chmod 755 $(PREFIX)/bin/sqlsec.start
	chmod 755 $(PREFIX)/bin/sqlsec.stop
	chmod 755 $(PREFIX)/bin/sqlsec.log
	cp -rf mysqlproxy/ $(PREFIX)/
	cp -f sqlsec_interface.php $(SROOT)/
	cp -f sqlsec.lua $(SROOT)/
	cp -f rtab.dat $(SROOT)/
	cp -f admin/a* $(SROOT)/

uninstall:
	rm -f $(PREFIX)/bin/rand.bin
	rm -f $(PREFIX)/bin/check.bin
	rm -f $(PREFIX)/bin/derand.bin
	rm -f $(PREFIX)/bin/wtab.bin
	rm -f $(PREFIX)/bin/vtab.bin
	rm -f $(PREFIX)/bin/sqlsec.start
	rm -f $(PREFIX)/bin/sqlsec.stop
	rm -f $(PREFIX)/bin/sqlsec.log 
	rm -rf $(PREFIX)/mysqlproxy/
	rm -f $(SROOT)/sqlsec_interface.php
	rm -f $(SROOT)/sqlsec.lua 
	rm -f $(SROOT)/rtab.dat
	rm -f $(SROOT)/alog.php
	rm -f $(SROOT)/alogin.html
	rm -f $(SROOT)/alogin.php
	rm -f $(SROOT)/alogout.php
	rm -f $(SROOT)/arand.php
	rm -f $(SROOT)/asession.php
	rm -f $(SROOT)/atable.html
	rm -f $(SROOT)/atable.php
	rm -f $(SROOT)/awelcome.php
	rm -f $(SROOT)/log.txt

.PHONY: clean install uninstall
