// type IsNumber<T> = T extends number ? 'number' : 'other';

// type WithNumber = IsNumber<number>; // 布尔类型

// type WithOther = IsNumber<string>; // 文字类型


export type typeName<T> =
    T extends string ? 'string' :
    T extends number ? 'number' :
    T extends boolean ? 'boolean' :
    T extends undefined ? 'undefined' :
    T extends Function ? 'function' :
    'object';

function typeName<T>(t: T): typeName<T> {
    return typeof t as typeName<T>;
}


const str = typeName('Hello world');
const num = typeName(123);
const boolean = typeName(true);
const undef = typeName(undefined);
const func = typeName(function () { });
const obj = typeName(null);