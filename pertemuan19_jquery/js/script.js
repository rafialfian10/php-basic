//Ambil elemen-elemen yang dibutuhkan dengan DOM
var keyword = document.getElementById('keyword');
var search = document.getElementById('search');
var container = document.getElementById('container');

//beri suatu event ketika keyword ditulis
keyword.addEventListener('keyup', function() { //ketika keyword input sedang diketik diklik, maka jalankan function

	//Buat object ajax
	var xhr = new XMLHttpRequest(); // buat variable dengan nama bebas, dan buat instansiasi objek ajax new XMLHttpRequest()

	//Cek kesiapan ajax dengan memanggil method dengan xhr.onreadystatechange, jika siap maka jalankan function
	xhr.onreadystatechange = function() {
		if(xhr.readyState == 4 && xhr.status == 200) {/*jika kesiapan ajax untuk menerima request. 4 artinya (kesiapan sumber untuk menerima data antara 
		 0 - 4. 4 artinya sumber sudah ready) dan status = 200 (sumbernyajuga sudah ready jika sumbernya tidak ditemukan maka angkanya 404) */
		 	container.innerHTML = xhr.responseText; /* untuk menampilkan apapun isi file dari eksekusi ajax. panggil container dengan isi yaitu innerHTmL,
		 	jadi apapun yang ada di (div dengan id container), akan diganti tidak peduli apapun isinya dengan responseText (ajax/players.php). */
		}
	}

	//eksekusi ajax
	xhr.open('GET', 'ajax/players.php?keyword=' + keyword.value, true); /* P1 = methodnya bisa GET/POST, P2 = sumbernya dari mana, P3= jika true(asyncronous), 
	jika false (syncronous). 
	Pada saat data players.php diambil dengan GET, maka juga bisa sambil mengirimkan data keyword dengan ?keyword=. 
	Akses sumber data dari players.php. pada ?keyword= berfungsi untuk mengirimkan data dan +(digabung) dengan keyword.value yang 
	berfungsi untuk mengambil apapun yang diketikkan dkolom pencarian */
	xhr.send(); // untuk menjalankan ajaxnya
});