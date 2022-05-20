$('.btn-copy').click(function (){
        var text = document.getElementById('text-'+this.id)

        text.select();
        text.setSelectionRange(0, 99999)
        document.execCommand("copy")
})
