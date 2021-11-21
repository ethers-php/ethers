#!/usr/bin/env bash

set -e
set -x

CURRENT_BRANCH="master"

function split()
{
    SHA1=`./bin/splitsh-lite-darwin --prefix=$1`
    git push $2 "$SHA1:refs/heads/$CURRENT_BRANCH" -f
}

function remote()
{
    git remote add $1 $2 || true
}

git pull origin $CURRENT_BRANCH

remote bytes git@github.com:ethers-php/bytes.git
remote keccak256 git@github.com:ethers-php/keccak256.git

split 'src/EthersPHP/Bytes' bytes
split 'src/EthersPHP/Keccak256' keccak256