export function parseJSON(payload) {
  if (isObject(payload) || isArray(payload)) {
    return payload;
  }
  if (!isString(payload)) {
    throw new TypeError('payload is not a string');
  }
  try {
    return JSON.parse(payload);
  } catch (e) {
    throw new Error(`${payload} i not a valid JSON string`);
  }
}
