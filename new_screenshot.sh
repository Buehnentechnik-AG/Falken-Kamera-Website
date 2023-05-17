#!/bin/sh
valuefile="/value.dat"

# if we don't have a file, start at zero
if [ ! -f "$valuefile" ]; then
    value=0

# otherwise read the value from the file
else
    value=$(cat "$valuefile")
fi

# increment the value
value=$((value + 1))

mkdir -p /var/www/Falken-Kamera-Website/gallery/images/

# grab snapshot from RTSP-stream
ffmpeg -i 'rtsp://[USERNAME]:[PASSWORD]@[IP]:554/cam/realmonitor?channel=1&subtype=0' -f image2 -vframes 1 -pix_fmt yuvj420p /var/www/Falken-Kamera-Website/gallery/images/${value}.jpeg 

sleep 2s

# copy snapsphot to newest
cp /var/www/Falken-Kamera-Website/gallery/images/${value}.jpeg /var/www/Falken-Kamera-Website/latest/latest.jpeg

sleep 2s

# save value to file
echo "${value}" > "$valuefile"

# delete previous taken snapshots older than 3 days
find /var/www/Falken-Kamera-Website/gallery/images/ -name '*.jpeg' -mtime +3 -delete
