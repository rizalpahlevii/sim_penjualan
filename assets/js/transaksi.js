function plgn(){
	plh = $('#kategori').val();
	if(plh=="Pelanggan"){
		$('#id_plgn').show("slow");
		$('#nm_plgn').show("slow");
		$('#id_pelanggan').show("slow");
		$('#nama_pelanggan').show("slow");
	}else if(plh=="--Pilih--"){
		$('#id_plgn').show("slow");
		$('#nm_plgn').show("slow");
		$('#id_pelanggan').show("slow");
		$('#nama_pelanggan').show("slow");
	}else{
		$('#id_plgn').hide("slow");
		$('#nm_plgn').hide("slow");
		$('#id_pelanggan').hide("slow");
		$('#nama_pelanggan').hide("slow");
	}
}


// Pelanggan Otomatis
function idp(){

	$.ajax({
		url:"content/cari_plg.php",
		type:"POST",
		dataType:"json",
		data:{
			id_pelanggan:$('#id_pelanggan').val()
		},
		success:function(hasil){
			$('#nama_pelanggan').val(hasil.nama_pelanggan);
		}

	});
}

// Barang Otomatis
function idb(){
	$.ajax({
		url:"content/cari_brg.php",
		type:"POST",
		dataType:"json",
		data:{
			id_barang:$('#id_barang').val()
		},
		success:function(hasil){
			$('#nama_barang').val(hasil.nama_barang);
			$('#harga').val(hasil.harga);
		}

	});
}



function hapus_detail(h){

	$.ajax({
		url:"crud/hapus_detail.php",
		type:"POST",
		data:{
			id_detail_transaksi:h
		},
		success:function(hasil){
			alert(hasil);
			buka_tab();
		}

	});
}


// Total
function t(){
	hrg = $('#harga').val();
	jml = $('#jumlah').val();
	tot = hrg * jml;
	$('#total').val(tot);
}


// Simpan Detail
function simpan_detail(){
	$.ajax({
		url:"crud/simpan_detail.php",
		type:"POST",
		data:{
			id_transaksi:$('#id_transaksi').val(),
			id_barang:$('#id_barang').val(),
			jumlah_beli:$('#jumlah').val(),
			total:$('#total').val()
		},
		success:function(hasil){
			alert(hasil);
			buka_tab();
		
		}

	});
}


function buka_tab(){
	id = $('#id_transaksi').val();
	$('#kotak-detail').load('content/detail_trans.php?idt='+id);

}


function byr(){
	b = $('#bayar').val();
	tb = $('#totalbayar').val();
	rsl = b-tb;
	$('#kembali').val(rsl);
}
$(document).ready(function(){
	$('#lpr1').hide();
	$('#lpr2').hide();
	$('#lpr3').hide();
	$('#lpr').click(function(){
		$('#lpr1').slideToggle("slow");
		$('#lpr2').slideToggle("slow");
		$('#lpr3').slideToggle("slow");
	});
});



