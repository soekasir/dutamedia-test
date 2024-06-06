function squareNumbers(numbers){
  return numbers.reduce((prev,current)=>parseInt(prev,10)+(current*current))
}

console.log(
  squareNumbers([5,3,6,2,'7']) //103
)
