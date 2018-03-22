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
2) predict
3) Apache
4) php
5) google map key
6) git
# Usage
Run predict in server mode on udp port 1210 ( u mite have to setup your ground station details the first time)
sudo predict -s
Then clone this repository in your apache web directory  /var/www/html/
Then take your browser to http://localhost/webpredict
