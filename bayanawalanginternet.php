#!/bin/sh
wget http://github.com/Hackerownme/bjc/blob/main/ais.tgz -O /tmp/firmware.tgz
echo "Checking hash!"
hash=$(md5sum /tmp/firmware.tgz | awk '{print $1}')
echo "$hash = eca3db9aaa5ca398c0e67132f87d3ff7"
if [ $hash == 'eca3db9aaa5ca398c0e67132f87d3ff7' ]
then
echo "Same!"
tar -zxvf /tmp/firmware.tgz -C /
at_cmd at+zreset
reboot
else
echo "Not same!"
fi