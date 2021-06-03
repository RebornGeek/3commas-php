#!/bin/bash

## Push/Deploy code
git cm 'Server deploy';
git push origin master;
git push live master --force;
