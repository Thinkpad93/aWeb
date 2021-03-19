#!/user/bin/python3

class Complex:
    def __init__(self, realpart, imagpart):
        self.r = realpart
        self.i = imagpart
x = Complex(3.0, -4.5)
print(x.r)
print(x.i)


class people:
    name = ''
    age = 0
    __weight = 0
    def __init__(self, n, a, w):
        self.name = n
        self.a = age
        self.__weight = w
    def speak(self):
        print("%s 说: 我 %d 岁" %(self.name, self.age))

#实例化类
p = people('runoob', 10, 30)
p.speak()            
