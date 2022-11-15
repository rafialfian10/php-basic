//Memanggil Ajax dengan JQuery

$(document).ready(function() { /* memanggil jquery / ambil document (apapun yan dituliskan didalam kurung). $ bisa menggunakan jquery(document). Dan
	jika ddocument tersebut siap maka jalankan function */

	//Hilangkan button search
	$('#search').hide();// carikan elemen search dan sembunyikan

	//Buat event ketika keyword ditulis
	$('#keyword').on('keyup', function() { //cara baca: $ carikan elemen (#) keyword. dan beri event (on), kemudian jalankan function.

		//Munculkan gambar loading
		$('.loading').show();// carikan elemen class loader kemudian munculkan. show = memunculkan yang hilang, hide menghilangkan yang muncul.

	//Ajax menggunakan load
	// $('#container').load('ajax/players.php?keyword=' + $('#keyword').val() );
	/* cara baca: $ carikan sebuah elemen (#) container lalu ubah (load) isinya dengan data yang diambil dari sumber (ajax/players.php) sambil
	mengirimkan data keyword (?keyword=), yang isinya apapun yang diketikkan oleh user ($(#keyword).val() ) */
	//Note : fungsi load hanya bisa menggunakan GET. # itu yang dipanggil itu elemen id dan .loader yang dipanggil elemen class loader.

	//Ajax menggunakan $.get()
	$.get('ajax/players.php?keyword=' + $('#keyword').val(), function(data) { /* $ lakukan GET dari (ajax/players.php) dan ambil data, setelah data 
	diambil maka lakukan sesuatu sambil mengirimkan data hasilnya functon(data) dari yang diketikan oleh user. function(data) sama saja dengan 
	responseText */

		$('#container').html(data); /* ketika data berhasil didapatkan, maka ganti isi container diganti dengan (data). hmml sama saja deengan innerHTML.
		jadi fungsi cara 2 ini sama dengan fungsi cara 1. */ 

		//lalu sembunyikan loader
		$('.loading').hide(); // $ carikan .loading dan sembunyikan. jadi begitu data yang diketikkan user ketemu maka sembunyikan loadernya
		
		}); 
	});
}); 
//Kedua cara diatas sama, tetapi cara kedua lebih fleksibel karena dapat melakukan sesuatu dengan menambahkan function.
