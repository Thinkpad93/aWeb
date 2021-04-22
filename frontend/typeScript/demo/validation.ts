export interface StringValidator {
  inAcceptable(s: string): boolean;
}

const lettersRegexp = /^[A-Za-z]+$/;

export class LettersOnlyVaalidator implements StringValidator {
  inAcceptable(s: string) {
    return lettersRegexp.test(s);
  }
}
