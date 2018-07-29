# webpredict
This is Web based Satellite tracking System using predict as back end system.
I wanted to have a online satellite tracking system that could controle my websdr and openwebrx.
# Project Status
This project just started and is not complete yet.

# What will this project deliver?
1) Google map with moving Satellites.
2) Websdr Dopler tracking of Satelites.
3) OpenwebRX Dopler tracking of Satellites.
4) Automatic TLE update.
5) Possible Satellite Telemetry decoding.
6) Possible hosting of telemetry data

# Prerequisite.
1) Linux UBUNTU 16.04 +
2) predict from http://www.qsl.net/kd2bd/predict.html
3) Apache apt-get install apacahe2
4) php sudo apt-get install php
5) google map key (get it from googgle)
6) git sudo apt-get install git
7) Mysql  sudo apt-get mysql.
# Usage
Run predict in server mode on udp port 1210 ( u mite have to setup your ground station details the first time)


Run the following command to start predict server<br>
sudo predict -s
Testing jason satelite details<br>
http://localhost/webpredict/jason.php?satellite=OSCAR-7<br>
{"name":"OSCAR-7","long":"87.03 ","lat":"-22.87","az":"237.81 ","el":"-45.44","aollos":"1532901346","footprint":"7907.73","range":"10983.28","altitude":"1458.06","velocity":"7.13 ","orbitnr":"100006","visibility":"D","orbitalphase":"92.20 ","eclipsephase":"-67.15 ","squint":"360.00 "} <br>
Getting Doppler frequensy ofset for Satelite<br>
http://localhost/webpredict/jason_doppler.php?satellite=OSCAR-7<br>
Then clone this repository in your apache web directory  /var/www/html/<br>
Then take your browser to http://localhost/webpredict
