var confirmDelete = function(url){
    var x = window.confirm("Anda yakin ingin menghapus data ini ?. Data yang sudah dihapus tidak bisa dikembalikan dan mungkin akan mempengaruhi data lain.");
    if(x){
        window.location = url;
    }
}