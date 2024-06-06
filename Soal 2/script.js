document.getElementById('fileInput').addEventListener('change', function(event) { 
  var file = event.target.files[0];
  if (file) { 
    document.getElementById('preview').src = URL.createObjectURL(file);
  }
});

// atau

// fileInput.onchange = event => {
//   const [file] = fileInput.files
//   if (file) {
//     preview.src = URL.createObjectURL(file)
//   }
// }
