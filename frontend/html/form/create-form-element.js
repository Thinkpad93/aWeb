const element = [
  {
    type: 'hidden',
    name: 'targetUid',
    value: 90293691,
  },
  {
    type: 'hidden',
    name: 'startTime',
    value: new Date().getTime(),
  },
  {
    type: 'hidden',
    name: 'endTime',
    value: new Date().getTime(),
  },
  {
    type: 'hidden',
    name: 'uid',
    value: 90293691,
  },
  {
    type: 'hidden',
    name: 'token',
    value: '031d09e1-a999-454a-8ea0-371d8149381b',
  },
  {
    type: 'hidden',
    name: 'roomUid',
    value: 90293691,
  },
];

let form = document.createElement('form');
form.method = 'get';
form.enctype = 'enctype="multipart/form-data';

element.forEach((item) => {
  let input = document.createElement('input');
  input.name = item.name;
  input.type = item.type;
  input.value = item.value;
  form.append(input);
});

document.body.appendChild(form);
