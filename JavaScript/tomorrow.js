// 返回明天日期的字符串表示形式

const tomorrow = () => {
    let d = new Date();
    d.setDate(d.getDate() + 1);
    return d.toISOString().split('T')[0];
};