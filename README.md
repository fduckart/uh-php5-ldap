uh-php5-ldap
===========

LDAP PHP-5 Demonstration Program

**Overview**

The program demonstrates how to do a simple LDAP search
of the University of Hawaii LDAP service. 

You must specify your Special DN and its password.
The example run of the program used the 'filedrop' special DN,
but the account values have been removed from the checked-in code.

The use of the special DN will also require 
the ability to pass through the UH firewall.

**Technology**

The program was developed on Apple Mac OS X 10.10.2,
using PHP version 5.5.14 and GNU bash, version 3.2.57.

**Verify you have PHP installed**

    $ php --version
    PHP 5.5.14 (cli) (built: Sep  9 2014 19:09:25) 
    Copyright (c) 1997-2014 The PHP Group
    Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies


**Running the Program**

Run the program from the command line: 

    $ ./ldaprunner duckart
    vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
          cn --> Frank R Duckart
         uid --> duckart
      uhuuid --> 17958670
        mail --> duckart@hawaii.edu
        mail --> frank.duckart@hawaii.edu
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

You can run the program with mutltiple UH usernames: </br>

    $ ./ldaprunner duckart duckart
    vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
          cn --> Frank R Duckart
         uid --> duckart
      uhuuid --> 17958670
        mail --> duckart@hawaii.edu
        mail --> frank.duckart@hawaii.edu
        ................................
          cn --> Frank R Duckart
         uid --> duckart
      uhuuid --> 17958670
        mail --> duckart@hawaii.edu
        mail --> frank.duckart@hawaii.edu
    ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

**For More Information**

Contact me via email at duckart@hawaii.edu

