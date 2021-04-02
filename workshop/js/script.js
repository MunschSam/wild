console.log("HelloWorld");
/*
let operand = prompt('Operand');
let firstValue = parseInt(prompt('first value'));
let secondValue = parseInt(prompt('second value'));

 switch (operand) {
    case "+":
        console.log(firstValue + secondValue);
        break;
    case "-":
        console.log(firstValue - secondValue);
        break;
    case "*":
        console.log(firstValue * secondValue);
        break;
    case "/":
        console.log(firstValue / secondValue);
        break;
    default:
        console.log("invalid opperator");
}

/*const random = Math.floor(Math.random() * 100) + 1;
let reponse = parseInt(prompt('reponse'));
while (reponse != random) {
    if (reponse === random) {
        console.log("player win");
    } else if (reponse < random) {
        console.log("it's more");
    } else if (reponse > random) {
        console.log("it's less");
    } else { console.log(reponse); }

}*/





let button = document.getElementById('button')
button.addEventListener('click', function(event) {
    let firstValue = parseInt(document.getElementById('fValue').value);
    let secondValue = parseInt(document.getElementById('sValue').value);
    let select = document.getElementById('select').value;
    switch (select) {
        case "+":
            console.log(firstValue + secondValue);
            break;
        case "-":
            console.log(firstValue - secondValue);
            break;
        case "*":
            console.log(firstValue * secondValue);
            break;
        case "/":
            console.log(firstValue / secondValue);
            break;

    }

});