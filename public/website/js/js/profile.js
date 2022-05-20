$('#inputfile').change(function(){
    const [file] = inputfile.files
    if(file){
        $('#img').attr('src',URL.createObjectURL(file))
    }
})