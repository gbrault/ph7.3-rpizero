Special compile for Raspberry PI Zero
=====================================

I have compiled PHP7.3 for raspberry pi zero, on the RPZ, which takes hours!, here are the steps

## prepare for compile

```
// swap increase for compile

sudo nano /etc/dphys-swapfile

CONF_SWAPSIZE=100 to CONF_SWAPSIZE=1024

sudo /etc/init.d/dphys-swapfile stop
sudo /etc/init.d/dphys-swapfile start

free -m to monitor status
reset it back after compiling
```

## compile php

```
// install php source latest version (takes hours on PI ZERO... but works)
sudo apt-get install build-essential  // already there
sudo apt-get install bison
sudo apt-get install libreadline6 libreadline6-dev liblirc-dev
sudo apt-get install re2c

wget http://fr2.php.net/get/php-7.3.0.tar.gz/from/this/mirror
mv mirror php-7.3.0.tar.gz

tar -zxvf php-7.3.0.tar.gz
cd php-7.3.0

./configure

make

sudo make install
// takes very long time ... should investigate cross compiling
// file upload
memory_limit = 32M
upload_max_filesize = 24M
post_max_size = 32M
max_execution_time = 60
```

## install the standalone server as a systemd service

```
/etc/systemd/system/phpserver.service
sudo systemctl enable --now phpserver.service
sudo systemctl start phpserver
[Unit]
Description=php serveur

[Service]
Type=oneshot
ExecStart=/bin/sh -c "echo 'Start php Server' && cd /var/www/html && php -S 0.0.0.0:80 &"
ExecStop=/bin/sh -c "echo 'Stop php Server'"
RemainAfterExit=yes

[Install]
WantedBy=multi-user.target
```

The PHP Interpreter
===================

This is a github mirror of the official PHP repository located at
https://git.php.net.

[![Build Status](https://secure.travis-ci.org/php/php-src.svg?branch=master)](http://travis-ci.org/php/php-src)
[![Build status](https://ci.appveyor.com/api/projects/status/meyur6fviaxgdwdy?svg=true)](https://ci.appveyor.com/project/php/php-src)

Pull Requests
=============
PHP accepts pull requests via github. Discussions are done on github, but
depending on the topic can also be relayed to the official PHP developer
mailing list internals@lists.php.net.

New features require an RFC and must be accepted by the developers.
See https://wiki.php.net/rfc and https://wiki.php.net/rfc/voting for more
information on the process.

Bug fixes **do not** require an RFC, but require a bugtracker ticket. Always
open a ticket at https://bugs.php.net and reference the bug id using #NNNNNN.

    Fix #55371: get_magic_quotes_gpc() throws deprecation warning

    After removing magic quotes, the get_magic_quotes_gpc function caused
    a deprecate warning. get_magic_quotes_gpc can be used to detected
    the magic_quotes behavior and therefore should not raise a warning at any
    time. The patch removes this warning

We do not merge pull requests directly on github. All PRs will be
pulled and pushed through https://git.php.net.


Guidelines for contributors
===========================
- [CODING_STANDARDS](/CODING_STANDARDS)
- [README.GIT-RULES](/README.GIT-RULES)
- [README.MAILINGLIST_RULES](/README.MAILINGLIST_RULES)
- [README.RELEASE_PROCESS](/README.RELEASE_PROCESS)
