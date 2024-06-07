function sumOfSquareNumbers(numbers){
  let result=0;
  numbers.forEach((n) =>{
    result=result+(parseInt(n)*parseInt(n))
  });
  return result;
}

console.log(
  sumOfSquareNumbers([5,3,6,2,'7']) //123
);
