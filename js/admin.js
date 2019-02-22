document.getElementById('other_prog').onclick = function() {
	if ( this.checked ) {
		document.getElementById('anknown_prog').readOnly = false;
	} else {
		document.getElementById('anknown_prog').readOnly = true;
	}
};
document.getElementById('standart_anim').onclick = function() {
	if ( this.checked ) {
		document.getElementById('hour_anim').readOnly = false;
	} else {
		document.getElementById('hour_anim').readOnly = true;
	}
};

function Addkod(){
	var randomNumber = Math.floor(1000 + Math.random() * 9000);
	document.getElementById("kod").value = "Barashka-" +randomNumber;
};

function changeVisible(x,y) {
	var but = $(this).attr('id');
	if(x==0)
	{
		var st = 1;
	};
	if(x==1)
	{
		var st = 0;
	};
	$.ajax({
		url: "includes/ajax.php",
		cash: false,
		data: {statu: st,
		id: y},
		type:"POST",
		beforeSend: function() {
			if(x==1){
			$('#CV'+y).replaceWith('<button class="btn btn-success form-control" id="CV'+y+'" onclick="changeVisible(0,'+y+')">Не показывать на сайте</button>');
			}
			if(x==0){
			$('#CV'+y).replaceWith('<button class="btn btn-primary form-control" id="CV'+y+'" onclick="changeVisible(1,'+y+' )">Показать на сайте</button>');
			}
		},
		success: function() {
			
		}
		
	});
	
};

function changeImg() {
	$("#divFile").replaceWith('<input type="file" id="file" required class="custom-file-input" multiple accept="image/*,image/jpeg" name="image">');
	$("#changeButton").visible = false;
};

function changeImg1() {
	$("#divFile1").replaceWith('<input type="file" id="file" required class="custom-file-input" multiple accept="image/*,image/jpeg" name="image">');
	$("#changeButton1").visible = false;
};

function SendTo1C(x) {
    var name = $('#name'+x).text();
    var telephone = $('#telephone'+x).text();
    var statu = $('#status'+x).text();
    	$.ajax({
		url: "includes/sendorder.php",
		cash: false,
		data: {
            name: name,
            telephone: telephone,
            id: x,
            status: statu
        },
		type:"POST",
		success: function() {
			
		}
		
	});
    
};

function func() {
    var td = document.getElementById('t');
    td.rows[0].className = "a";
}


