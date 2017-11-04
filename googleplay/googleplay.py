# -*- coding: UTF-8 -*-
# © Translated by @SerCom_KC project

# A Google Play caption ripper.

import os
import requests
import re
import sys
import base64
from lxml import etree
from pycaption import WebVTTReader, SRTWriter

api_url = 'https://video.google.com/timedtext'
head = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'}

# Fetch and convert caption
def get(videoID, lang):
	# Check whether requested video contains a caption track of the required language
	args = {
		'v': videoID,
		'type': 'list'
	}
	r = requests.get(api_url, params = args) 
	CClist = etree.XML(r.content)
	if CClist.find('.//track[@lang_code="' + lang + '"]') == None:
		print('CAPTION_NOT_FOUND')
		exit()
	# Try method 1
	args = {
		'v': videoID,
		'lang': lang,
		'fmt': 'vtt'
	}
	origCC = requests.get(api_url, params = args)
	# If failed try method 2
	if origCC.text == '':
		args = {
			'v': videoID,
			'lang': lang,
			'fmt': 'vtt',
			'at': '1'
		}
		origCC = requests.get(api_url, params = args)
		# If failed try method 3
		if origCC.text == '':
			args = {
				'v': videoID,
				'lang': lang,
				'fmt': 'vtt',
				'name': CClist.xpath('.//track[@lang_code="' + lang + '"]/@name')[0]
			}
			origCC = requests.get(api_url, params = args)
			# If failed return error
			if origCC.text == '':
				print('VIDEO_UNSUPPORTED')
				exit()
	# Convert caption from VTT to SRT
	srtCC = SRTWriter().write(WebVTTReader().read(origCC.text))
	# Save SRT file
	srt_file = open(videoID + '.' + lang + '.srt', 'w')
	srt_file.write(srtCC.replace('\n', '\r\n').encode('utf-8'))
	srt_file.close()
	return 0

# Check whether the link is vaild, then extract the videoID
def parse(link):
	# Remove unwanted leading and trailing whitespaces
	link = link.lstrip().rstrip()
	# If requested video is a TV episode
	if re.match(r'https://play.google.com/store/tv/show', link) != None:
		videoID = re.search(r'gdid=tvepisode-[^&]+', link).group(0).replace(r'gdid=tvepisode-', '')
	# If requested video is a movie
	elif re.match(r'https://play.google.com/store/movies/details/', link) != None:
		videoID = re.search(r'id=[^&]+', link).group(0).replace(r'id=', '')
	# Unexpected errors
	else:
		print('PARSE_UNKNOWN_ERROR')
		exit()
	# Check whether requested video available on Google Play
	args = {
		'v': videoID,
		'type': 'list'
	}
	r = requests.get(api_url, params = args) 
	if r.status_code == 404:
		print('VIDEO_NOT_FOUND')
		exit()
	return videoID

if __name__ == '__main__':
	if len(sys.argv) == 1: # If missing parameters
		print('INVALID_PARAMETERS')
	else:
		link = sys.argv[1]
		if len(sys.argv) == 2:
			lang = 'en'
		else:
			lang = sys.argv[2]
		try:
			videoID = parse(link)
			print(videoID)
			if os.path.isfile(videoID + '.' + lang + '.srt'):
				print('CACHE')
			else:
				get(parse(link), lang)
				print('SUCCESS')
		except Exception as e: # Unexpected errors
			print('UNKNOWN_ERROR')
