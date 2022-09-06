import sys
if(len(sys.argv) == 1):
    count = 1
else:
    count = int(sys.argv[1])
    
print(count)
for x in range(0, count):
  exec(open("create.py").read())

    
