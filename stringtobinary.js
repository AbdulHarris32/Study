var random = '00000000'

var name = 'Cipto'
var binary = []

for( var i = 0; i<name.length; i++){
  var input = name.charCodeAt(i).toString(2)
  var output = input.substring(0, random.length - input.length)+ input

  binary.push(output)
}

console.log(binary.join(' '));
