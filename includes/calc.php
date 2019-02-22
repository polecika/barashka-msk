  <!-- Отдел "Калькулятор цены" -->

    <div class="calc" id="calc">
        <div class="row">
            <div class="col-12 calc_headline">
                <h1>Калькулятор цены</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 calc_about">
                <h3>Нет возможности сейчас пообщаться с нами по телефону, но хочется узнать стоимость праздника? <br>
Посчитайте цену самостоятельно с помощью онлайн калькулятора!</h3>
            </div>
        </div>
		<form class="form-horizontal" role="form">
			<div class="calc_questions">
				<div class="row calc_date justify-content-center">
				
				</div>
				<div class="row calc_check justify-content-center">
					<div class="form-group col-11 col-md-10 col-lg-8">
							<label for="checkbox">Вы бы хотели заказать анимационную програму? </label>
							<input type="checkbox" id="animationCheck" name="html5"/>
					</div>
				</div>
				<div class="row calc_time justify-content-center">
					<div class="form-group col-11 col-md-10 col-lg-6">
						<label for="age">Сколько часов будет длиться анимация? </label>
						<input type="number" readonly step="1" min="0" max="100" value="0" id="animationTime" name="time"/>
					</div>
				</div>
				<div class="row calc_show justify-content-center">
					<div class="form-group col-11 col-md-10">
						<h3>Отметьте те шоу, которые Вы бы хотели включить в программу </h3>
						<br>
						<?
						$sql_calc = "SELECT `name`, `price` FROM `servises` WHERE `type` = 'программа'";
						$res_calc = $link->query($sql_calc); 
						while($calc = $res_calc->fetch_array(MYSQLI_ASSOC))
						{
							echo '<label for="checkbox">'.$calc["name"].'</label>
							<input type="checkbox" name="showprice" value="'.$calc["price"].'"/>
							<br>';
						}
						$res_calc->close();
						?>
						
						
					</div>
				</div>
			</div> 
			<div class="row ">
				<div class="col-12 pers_call">
					<a href="#" class="button-5d" onclick="Calculate()" data-toggle="collapse" data-target="#hide-me">Посчитать</a>
				</div>
			</div>
		</form>
    </div>

     <!-- Отдел "Заказать звонок 3" -->

     <div class="call_box call_box_3 collapse" id="hide-me">
            <div class="row">
                <div class="col-12 call_box_text">
                    <h2 id="calcResult" >≈12 000 Рублей<h2>
                    <h3>
						Позвоните нам сейчас и получите скидку в 10% по промокоду "Барашка 2018"<br>
                    </h3>
                    <h3>Код действует 24 часа</h3>
                </div>
                <div class="col-12">
                    <a href="#" class="button-3d" data-toggle="modal" data-target="#call">Заказать звонок</a>
                </div>
            </div>
    </div>