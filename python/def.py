import math

def move(x,y,step,angle = 0):
	nx = x + step * math.cos(angle)
	ny = y - step * math.sin(angle)
	return nx,ny

def my_abs(x):
	if not isinstance(x,(int,float)):
		print(x)
	elif:
	 	pass	
	else:
		print(-x)
	
my_abs(10)			