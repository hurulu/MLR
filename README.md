A Multiple Linear Regression tool written in Python

Prerequisites:
1, python and numpy needed
2, a web server needed to use web interface index.php

The tool is based on a equation like y=a1*x1+a2*x2+a3*x3+...+b. When given an array of x1,x2...xn and y,the tool can work out the a1,a2,...an,b and R2 as well.
For example,the sample input data is stored in a text file sampledata.txt with its content as:
2310 2 2 20 142000 
2333 2 2 12 144000 
2356 3 1.5 33 151000 
2379 3 2 43 150000 
2402 2 3 53 139000 
2425 4 2 23 169000 
2448 2 1.5 99 126000 
2471 2 2 34 142900 
2494 3 3 23 163000 
2517 4 4 55 169000 
2540 2 3 22 149000 
run ./mlr.py sampledata.txt and its output will be:
y=27.641387366*x1+12529.7681671*x2+2553.21066039*x3+-234.237164471*x4+52317.8305073
R2=0.996748

