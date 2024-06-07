function sumOfSquareNumbers(numbers){
  let result=0;
  numbers.forEach((n) =>{
    result=result+(parseInt(n)*parseInt(n))
  });
  return result;
}

function sumOfSquareNumbers2(numbers){
  return numbers.map(n=>parseInt(n)*parseInt(n)).reduce((total,n)=>total+n);
}

console.log(
  sumOfSquareNumbers([5,3,6,2,'7']), //123
  sumOfSquareNumbers2([5,3,6,2,'7']) //123
);
