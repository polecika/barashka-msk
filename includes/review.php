  <!-- Отдел "Отзывы" -->
    
    <div class="review" id="rev">
        <div class="row">
            <div class="col-12 review_headline">
                <h1>Отзывы наших клиентов</h1>
            </div>
        </div>
        <div class="row review_bar justify-content-center">
            <?
			$sql_review = "SELECT `name`, `text` FROM `reviews` WHERE `status` = '0'";
			$res_review = $link->query($sql_review); 
			while($review = $res_review->fetch_array(MYSQLI_ASSOC))
			{
				echo '<div class="col-10 rev_rev">
						<h1>'.$review["name"].'</h1>
						<h2>'.$review["text"].'</h2>
					</div>  '; 
			}
			$res_review->close();
            
		?>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 review_headline">
                <h1>Оставьте и вы свой отзыв</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-12 rev_form">
                 <form >
                     <label class="givereview">
                        Вам понравился наш праздник? Если да, то отправьте свой отзыв :)
                     </label>
					<div style="padding-left: 10%; padding-right: 10%;">
						 <div class="form-row">
							<div class="col-md-6">
								<input type="name" id="userName" placeholder="Представьтесь, пожауйста" class="name" required />
							</div>
							<div class="col-md-6">
								<input type="telephone" id="userTel" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" placeholder="+7-XXX-XXX-XX-XX" size="18" class="name" required />
							</div>
						</div>
						<div class="form-group">
							<input type="text" id="userReview" placeholder="Напишите отзыв о нашей работе"   class="rev_form_text" required />
						</div>
					</div>
					<p>
					<div class="like-content col-12 col-md-6 col-lg-4" id="like">  

					  <button class="btn btn-secondary like-review form-control" type="submit" href="#like">
					
						<i class="fa fa-heart" aria-hidden="true"></i> Отправить
					  </button>
					  
					</div>
                
                    </p>
                </form>
            </div>
        </div>
    </div>

   