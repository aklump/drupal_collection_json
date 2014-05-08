#!/bin/bash
# 
# @file
# Renders loft_docs.
root="$7"
cd "$root/docs"
./core/compile.sh
cd "$root"
