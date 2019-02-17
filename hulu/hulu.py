# -*- coding: UTF-8 -*-
# © Translated by @SerCom_KC project

# A Hulu caption ripper.

import os
import requests
import re
import sys
import base64
from lxml import etree
from pycaption import WebVTTReader, SRTWriter

api_url = 'http://www.hulu.com/captions.xml'
head = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36'}

def get(content_id, lang):
        args = {
                'content_id': content_id
        }
        CClist = requests.get(api_url, params = args)
        CClink = etree.HTML(CClist.content).xpath('//transcripts/' + lang + '/text()')[0].replace('captions','captions_webvtt').replace('smi','vtt')
        origCC = requests.get(CClink)
        srtCC = SRTWriter().write(WebVTTReader().read(origCC.text))
        srt_file = open(content_id + '.' + lang + '.srt', 'w')
        srt_file.write(srtCC.replace('\n', '\r\n').encode('utf-8'))
        srt_file.close()
        return 0

def parse(link):
        video_id = re.search(r'//www\.hulu\.com/watch/\d+', link).group(0).replace("//www.hulu.com/watch/", "")
        args = {
                "video_id": video_id,
                "dp_id": "hulu",
                "package_id": "2"
        }
        video_info = requests.get("http://m.hulu.com/menu/11675", params=args)
        content_id = etree.HTML(video_info.content).xpath('//items/data/content_id/text()')[0]
        return content_id

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
                        content_id = parse(link)
                        print(content_id)
                        if os.path.isfile(content_id + '.' + lang + '.srt'):
                                print('CACHE')
                        else:
                                get(parse(link), lang)
                                print('SUCCESS')
                except IndexError: # API probably didn't return any captions matched to the specified language; the video might be hardsubbed
                        print('CAPTION_NOT_FOUND')
                except Exception as e: # Unexpected errors
                        print('UNKNOWN_ERROR')
