#!/usr/bin/env python

import sys,string
import numpy as np
import matplotlib.pyplot as plt

A = [] 
B = []
Y = []
PY = [] #Predicted Y 
result = []

file = open(sys.argv[1])
for line in file:
        line = line.rstrip("\n").split()
	if len(line) == 0:
		break
	Y.append(string.atof(line.pop()))
	tmparray = []
	for s in line:
		tmparray.append(string.atof(s))
	tmparray.append(1)
        A.append(tmparray)

result = np.linalg.lstsq(A,Y)
plt.plot(A,Y)
plt.savefig("/tmp/plot.png",dpi=75)
B = result[0]
ssresid = result[1][0]
PY = np.dot(A,B)
averageY = sum(Y)/len(Y)
ssreg=0
for i in range(0,len(PY)):
	ssreg += pow((PY[i]-averageY),2)
R2 = ssreg / ( ssreg + ssresid )

formula = "y="
k=1
for i in B:
	if k < len(B):
		formula = formula + str(i) + "*x" + str(k) + "+"
	else:
		formula = formula + str(i)
	k += 1

print formula
print "R2=%f" %(R2)
