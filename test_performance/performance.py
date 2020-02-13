import requests
import _thread
import datetime
import time

n_thread = 1000
URL = "http://teambanana/api/poi"

def speedtest(id):
	tstart = datetime.datetime.now()
	r = requests.get(URL).status_code
	tend = datetime.datetime.now()
	s = str(id) +","+ str(tstart) +","+ str(tend) +","+ str(tend-tstart) +","+ str(r)
	print(s)

for i in range(n_thread):
	try:
		_thread.start_new_thread( speedtest, (i,) )
		time.sleep(0.03)
	except:
		print("Error: unable to start thread")

while True:
	pass