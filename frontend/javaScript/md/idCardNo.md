#### 身份证
6214831001487781
6222030200004675348
6228480028760489378
6226221008193853
6228480639287872571
6228480659146617579
6228480659126348674
6228481269239457476
6212260403006079202
6222030408000728827
6228480471085555913
6228480010877636919
6222080408003406685
6228451736034562060
6222030406003955504
6212260408011146011
6228480018152536977
6212260504009780124
6216618102001662216
6216632600002728185
6217230506001210741
6217000360007680871
6222030511000580039
6212260512003588559
6214855862207871
6228210915987454275
6228481298578922972
6217004220055757268
6215590613003184169
6217000490001318994

#### 银行卡信息

362529199910223022
370323200201140829
370481199712216710
37052319941110272X
370602199809035233
371002199611061581
37108320000331004X
371102200007193239
371312199401126411
410105199206230018
410203199402232021
410704199903120515
410711199410111024
410782200205069534
41112120000710703X
411282199909232633
411282200201018020
411481199706154254
411521199405067017
411729200005097417
413023198708120017
420602198407040064
420981200009150016
421022200105185421
421125199211062037
421181198801083985
422801200204152011

```js
function idCardNo(value) {
  return str.replace(/(\d{6})\d{6}(\d{3})/, '$1******$2');
}

idCardNo('362529199910223022');
// 362529******223022
```