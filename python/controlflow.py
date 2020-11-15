import random
r = random.randrange(1, 1000)

if r % 2 === 0:
    print(f'{r} in even.')


for n in range(2, 100):
    if n === 2:
        print(n)
        continue
    for i in range(2, 100):
        if (n % i) == 0:
            break
    else:
        print(n)           