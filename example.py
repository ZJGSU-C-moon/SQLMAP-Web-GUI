#!/usr/bin/env python
import requests
import json

url = 'http://127.0.0.1:8888/sqli-labs/Less-1/?id=1'
r = requests.get('http://127.0.0.1:8775/task/new')
taskid = r.json()['taskid']
r = requests.post('http://127.0.0.1:8775/option/' + taskid + '/set', data=json.dumps({'url':'http://127.0.0.1:8888/sqli-labs/Less-1/?id=1'}), headers={'Content-Type':'application/json'})
print 'Set url =>', r.json()['success']
r = requests.post('http://127.0.0.1:8775/option/' + taskid + '/get', data=json.dumps({'url':''}), headers={'Content-Type':'application/json'})
print 'Get url =>', r.json()['options']['url']
r = requests.post('http://127.0.0.1:8775/scan/' + taskid + '/start', data=json.dumps({}), headers={'Content-Type':'application/json'})
if r.json()['success'] == True:
    print 'Start scan successfully!'
else:
    print 'Start scan error...'
    exit()
while True:
    r = requests.get('http://127.0.0.1:8775/scan/' + taskid + '/status')
    if r.json()['status'] == 'terminated':
        break
r = requests.get('http://127.0.0.1:8775/scan/' + taskid +'/data')
print '=== Here are the results ==='
print r.json()
r = requests.get('http://127.0.0.1:8775/task/' + taskid + '/delete')

