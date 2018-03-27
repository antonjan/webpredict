#!/bin/bash
############################################################################
#
# Download TLE files and upload into mysql db 
#
# mysql db satellites  
#
############################################################################
# Edit the url to download the TLE files
TLEURL="www.celestrak.com/NORAD/elements/"

# Add each file name you wish to download, separated with a comma ie: amateur.txt,weather.txt,visual.txt
TLEFILES="amateur.txt,weather.txt"

# Edit the path to save the TLE files
TLEDIR="$HOME/predict/tle/"

############################################################################
# DO not edit below this line
############################################################################
OIFS=$IFS
IFS="',' || ' '"

if [ ! -d "$TLEDIR" ]; then
	 mkdir -p "$TLEDIR"
 fi

 for index in ${TLEFILES}
	     do
		         wget -qr "$TLEURL""$index" -O "$TLEDIR""$index"
#			     command -v "predict -u '$TLEDIR$index'"

		     done
		     printf '%s' "$(date)" > /tmp/predict-updated
		     printf '\n' >> /tmp/predict-updated

		     IFS=$OIFS
