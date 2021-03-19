for i in range(0, 10, 3):
    print(i)
# 0 3 6 9


a = ['Google', 'Baidu', 'Runoob', 'Taobao', 'QQ']
for i in range(len(a)):
    print(i, a[i])


for letter in 'Runoob':
    if letter == 'b':
        break
    print('当前字母为:', leeter)

var = 10
while var > 0:
    print('当前变量值为:', var)
    var = var - 1
    if var == 5:
        break
print("Good bye!")            