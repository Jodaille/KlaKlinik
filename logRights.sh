#!/bin/bash
USERGROUP="jody:www-data"
RIGHTS="g+rw"

chown $USERGROUP storage/logs
chmod $RIGHTS storage/logs

chown -R $USERGROUP storage/framework
chmod -R $RIGHTS storage/framework

chown $USERGROUP storage/logs/*.log
chmod $RIGHTS storage/logs/*.log

chown $USERGROUP storage/app/public/uploads
chmod $RIGHTS storage/app/public/uploads

chown $USERGROUP public/uploads
chmod $RIGHTS public/uploads

chown $USERGROUP public/img/icons
chmod $RIGHTS public/img/icons
