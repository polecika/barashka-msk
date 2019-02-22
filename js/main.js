
$('.show_cards').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$(document).ready(function(){
	$("#userTel").mask("+7(999) 999-9999");
})

$(function(){

	$(document).one('click', '.like-review', function(e) {
		
		var name = document.getElementById('userName').value;
		var tel = document.getElementById('userTel').value;
		var review = document.getElementById('userReview').value;
		if(name!="" && tel!="" && review!="")
		{
			$.ajax({
			url: "includes/addreview.php",
			cash: false,
			data: {
				uname: name,
				utel: tel,
				ureview: review
			},
			type:"POST",
			success: function() {
				$('.like-review').html('<i class="fa fa-heart" aria-hidden="true"></i>спасибо за отзыв');
				$('.like-review').children('.fa-heart').addClass('animate-like');
				document.getElementById('userName').value = "";
				document.getElementById('userTel').value = "";
				document.getElementById('userReview').value = "";
			}
			});
		};
	});
});

document.getElementById('animationCheck').onclick = function() {
	if ( this.checked ) {
		document.getElementById('animationTime').readOnly = false;
	} else {
		document.getElementById('animationTime').readOnly = true;
	}
};

function Calculate(){
	if(document.getElementById('animationCheck').checked)
	{
		anim = 2500 * document.getElementById('animationTime').value;
	}
	else
	{
		anim = 0;
	}
	var checkboxes = document.getElementsByName('showprice');
	var checkboxesChecked = [];
	var sumshows = 0;
	for (var index = 0; index < checkboxes.length; index++) {
		 if (checkboxes[index].checked) {
			checkboxesChecked.push(checkboxes[index].value); // положим в массив выбранный
			sumshows = sumshows + Number(checkboxes[index].value); // делайте что нужно - это для наглядности
		 }
	}
	anim = anim + sumshows;
	document.getElementById('calcResult').innerHTML = '~ '+anim+' рублей';
};