function pilih_kota(prop)
{
    $.ajax({
        url: 'admin/daerah/kota.php',
        data : 'prop='+prop,
        type: "post", 
        dataType: "html",
        timeout: 10000,
        success: function(response){
            $('#dom_kota').html(response);
        }
    });
}
function pilih_kec(kota)
{
    $.ajax({
        url: 'admin/daerah/kecamatan.php',
        data : 'kota='+kota,
        type: "post", 
        dataType: "html",
        timeout: 10000,
        success: function(response){
            $('#dom_kec').html(response);
        }
    });
}
function pilih_kel(kec)
{
    $.ajax({
        url: 'admin/daerah/kelurahan.php',
        data : 'kec='+kec,
        type: "post", 
        dataType: "html",
        timeout: 10000,
        success: function(response){
            $('#dom_kel').html(response);
        }
    });
}