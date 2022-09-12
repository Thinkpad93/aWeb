type Length<T extends readonly any[]> = T['length'];

type tesal = ['model x', 'model y'];

type tesalLength = Length<tesal>;
