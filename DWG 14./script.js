// Variablen für die Rückgabewerte und deren Datentypen
let allElementsQuerySelector = document.body.querySelectorAll('*');
let allElementsTagName = document.body.getElementsByTagName('*');

let paragraph = document.querySelector('p');
let previousSiblingParagraph = paragraph.previousSibling;

let concatString = '1' + 1;
let multiplyString = 3 * '1';
let mathOperation = 42 * 6 / 7;
let stringDivideTrue = '42' / true;
let stringDivideFalse = '42' / false;
let stringDivideFloat = '42' / '1.5';
let stringDivideLetter = '42' / 'a';
let multiplyLetter = 42 * 'a';
let strangeConcat = 'b' + 'a' + + 'a' + 'a';
let looseInequality = 1 != '1';
let strictInequality = 1 !== '1';
let nullValue = null;
let arrayValue = [1, 2];
let objectValue = { name: 'Doe', age: 22 };

// Versuch, auf eine nicht deklarierte Variable zuzugreifen
let undeclaredVariable;
try {
    undeclaredVariable = c;
} catch (error) {
    undeclaredVariable = error.message;
}

// Ausgabe in der Konsole
console.log('document.body.querySelectorAll("*"): ', allElementsQuerySelector, typeof allElementsQuerySelector);
console.log('document.body.getElementsByTagName("*"): ', allElementsTagName, typeof allElementsTagName);
console.log('paragraph.previousSibling: ', previousSiblingParagraph, typeof previousSiblingParagraph);
console.log('"1" + 1: ', concatString, typeof concatString);
console.log('3 * "1": ', multiplyString, typeof multiplyString);
console.log('42 * 6 / 7: ', mathOperation, typeof mathOperation);
console.log('"42" / true: ', stringDivideTrue, typeof stringDivideTrue);
console.log('"42" / false: ', stringDivideFalse, typeof stringDivideFalse);
console.log('"42" / "1.5": ', stringDivideFloat, typeof stringDivideFloat);
console.log('"42" / "a": ', stringDivideLetter, typeof stringDivideLetter);
console.log('42 * "a": ', multiplyLetter, typeof multiplyLetter);
console.log('"b" + "a" + + "a" + "a": ', strangeConcat, typeof strangeConcat);
console.log('1 != "1": ', looseInequality, typeof looseInequality);
console.log('1 !== "1": ', strictInequality, typeof strictInequality);
console.log('null: ', nullValue, typeof nullValue);
console.log('[1, 2]: ', arrayValue, typeof arrayValue);
console.log('{"name": "Doe", "age": 22}: ', objectValue, typeof objectValue);
console.log('Undeklarierte Variable c: ', undeclaredVariable, typeof undeclaredVariable);
