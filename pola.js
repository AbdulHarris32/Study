
var input = prompt('Masukkan Angka:')
var i = input

while(i > 0){

    var j = 1
    while(j <= i - 1){
      document.write('&nbsp&nbsp')
      j++
    }

    var k = 1
  while(k <= input - i + 1){
    document.write('*')
    k++
  }

    var l = 1
  while(l <= input - i){
    document.write('*')
    l++
  }
  document.write('<br>')
  i--
}

    var i = 1
    while(i <= input){

      var j = 1
      while(j <= i ){
        document.write('&nbsp&nbsp')
        j++
      }

      var k = 1
    while(k <= input - i){
      document.write('*')
      k++
    }

      var l = 1
    while(l < input - i){
      document.write('*')
      l++
    }
    document.write('<br>')
    i++
    }
