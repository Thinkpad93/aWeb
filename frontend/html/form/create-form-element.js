const element = [
  {
    type: 'text',
    name: 'userName',
    value: 'Jack'
  },
  {
    type: 'text',
    name: 'userAcc',
    value: 'lc15011977647@163.com'
  },
  {
    type: 'password',
    name: 'password',
    value: ''
  },
  {
    type: 'tel',
    name: 'tel',
    value: ''
  },
  {
    type: 'hidden',
    name: 'token',
    value: '031d09e1-a999-454a-8ea0-371d8149381b'
  },
  {
    type: 'file',
    name: 'file',
    value: ''
  },
  {
    type: 'url',
    name: 'url',
    value: ''
  },
  {
    type: 'tel',
    name: 'tel',
    value: ''
  },
  {
    type: 'search',
    name: 'search',
    value: ''
  },
  {
    type: 'number',
    name: 'number',
    value: ''
  },
  {
    type: 'range',
    name: 'range',
    value: ''
  },
  {
    type: 'datetime-local',
    name: 'datetimeLocal',
    value: ''
  },
  {
    type: 'date',
    name: 'date',
    value: ''
  },
  {
    type: 'time',
    name: 'time',
    value: ''
  },
  {
    type: 'week',
    name: 'week',
    value: ''
  },
  {
    type: 'month',
    name: 'month',
    value: ''
  }
];

let form = document.createElement('form');
form.method = 'get';
form.enctype = 'enctype="multipart/form-data';

element.forEach((item) => {
  let element = document.createElement('div');
  element.className = 'form-item';
  element.innerHTML = `
    <input type="${item.type}" name="${item.name}" value="${item.value}" />
  `;
  form.append(element);
});

document.body.appendChild(form);
