// var webSiteUrl = "http://shopping-guide.local/";
// let webSiteUrl = fullPath(location.href) + "/";
let webSiteUrl = "http://yurylisovsky.colocall.com/portfolio/shoppingguide/";

// Юра ===================
// функция вывода информации для добавления и выбора фото под формой
function btnChooseImage() {

	var url = webSiteUrl + "modules/images-list.php";
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, false);
	ajax.send();

	// вывести инфу 
	var addContainer = document.querySelector("#add-container");

	addContainer.innerHTML = ajax.response;
	addContainer.style.display = "block";

	// перемещение на контейнер попытка сделать на jquery
	// var id  = $("#add-container");
	//     top = $(id).offset().top;
	// $('body,html').animate({scrollTop: top}, 1500);

	smoothScroll('images-list-container', 2000);

}



//  ***** блок скроллинга к позиции

// определяет текущее положение скрола страницы
function currentYPosition() {

	// Firefox, Chrome, Opera, Safari
	if (self.pageYOffset)
		return self.pageYOffset;

	// Internet Explorer 6 - standards mode
	if (document.documentElement && document.documentElement.scrollTop)
		return document.documentElement.scrollTop;

	// Internet Explorer 6, 7 and 8
	if (document.body.scrollTop)
		return document.body.scrollTop;

	return 0;
}

// определяет положение элемента
function elmYPosition(eID) {
	var elm = document.getElementById(eID);
	var y = elm.offsetTop;
	var node = elm;
	// проходим по всем родителям до body, в которых есть относительные позиционирования относительно родителя
	// таким образом находим реальное смещение нашего элемента относительно начала страницы
	while (node.offsetParent && node.offsetParent != document.body) {
		node = node.offsetParent;
		y += node.offsetTop; // как только находим body - заканчиваем цикл
	}
	return y;
}

// функция плавного скролла к элементу
function smoothScroll(eID, timeScroll) {
	var startY = currentYPosition(); // текущее положение скролла
	var stopY = elmYPosition(eID); // куда скролируем

	// определяем дистанцию учитывая скролл вверх или вниз
	var distance = stopY > startY ? stopY - startY : startY - stopY;

	// если дистанция меньше 100px - просто делаем скрол без плавности
	if (distance < 100) {
		scrollTo(0, stopY);
		return;
	}

	// const timeScroll = 2000; // время скроллинга 2000 ms 
	const maxDistance = 2000; // для расстояния 2000 px и больше
	var delay = 20; // чтобы было 50 кадров в сек
	var countSteps = timeScroll / delay; // количество шагов скроллинга 


	// скорость скроллинга px/ms
	if (distance <= maxDistance) {
		delay = Math.round(distance * timeScroll / maxDistance / countSteps);
	}

	// определяем шаг скроллинга
	var step = Math.round(distance / countSteps); // пикселей на шаг

	// определяем значение Y первого шага в зависимости от направления
	var leapY = stopY > startY ? startY + step : startY - step;

	// скролл вниз
	if (stopY > startY) {
		var scrollInterval = setInterval(() => {
			window.scrollTo(0, leapY);
			leapY += step;
			if (leapY > stopY) {
				window.scrollTo(0, stopY);
				clearInterval(scrollInterval);
				return;
			}
		}, delay);
	} else {
		// скролл вверх
		var scrollInterval = setInterval(() => {
			window.scrollTo(0, leapY);
			leapY -= step;
			if (leapY < stopY) {
				window.scrollTo(0, stopY);
				clearInterval(scrollInterval);
				return;
			}
		}, delay);
	}


}

/* ***** версия 1.0 через Таймауты

	  var speed = Math.round(distance / 100);
	 if (speed >= 20) speed = 20;
	 var step = Math.round(distance / 25);


		 // стандартная/максимальная скорость шаг за 20 мс
	 if ( delay >= 20 ) 
		  speed = 20;

	 var timer = 0;
	if (stopY > startY) {
		 while ( leapY <= stopY ) {
			  setTimeout("window.scrollTo(0, "+ leapY + ")", timer * speed); // запускается 25 тайм-аутов
			  leapY += step; // получаем новую позицию для следующего шага
			  timer++;
		 } 
		 scrollTo(0, stopY); // если приращение вышло за границы (доводим до точного)
		 return;
	}

	// иначе скороллинг вверх 
	 while ( leapY >= stopY ) {
		  setTimeout("window.scrollTo(0, "+ leapY + ")", timer * speed); // запускается 25 тайм-аутов
		  leapY -= step; // получаем новую позицию для следующего шага
		  timer++;
	 } 
	 scrollTo(0, stopY); // если приращение вышло за границы (доводим до точного)
	 return;

*/


/* пример из интернета
	  var speed = Math.round(distance / 100);
	 if (speed >= 20) speed = 20;
	 var step = Math.round(distance / 25);


	 // скроллинг вниз
	 if (stopY > startY) {
		  for ( var i=startY; i<stopY; i+=step ) {
				setTimeout("window.scrollTo(0, "+ leapY + ")", timer * speed);
				leapY += step; // получаем новую позицию для следующего шага
				if ( leapY > stopY ) { // проверка если кратность не позволит выйти точно на конечную точку
				  leapY = stopY; // и мы перескочим ее
				}
				timer++;
		  } 
		  return;
	 }

	 // иначе скороллинг вверх
	 for ( var i=startY; i>stopY; i-=step ) {
		  setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
		  leapY -= step; 
		  if (leapY < stopY) 
				 leapY = stopY; 
		  timer++;
	 }
} */

// ***** конец блока скроллинга 


function btnImageSelect(btn) {

	var pictureId = document.querySelector("#picture-id");
	// задаем значение id картинки для дальнейщей записи товара
	pictureId.value = btn.dataset.id;

	console.log(pictureId.value);

	var image = '<img id="selected-image" src="' + webSiteUrl + 'images/upload/' + btn.dataset.name + '" width="200">';
	var photoContent = document.querySelector("#photo-content");

	imgDiv = document.createElement('div');
	imgDiv.innerHTML = image;

	var selectedImage = document.querySelector("#selected-image");
	if (selectedImage) {
		selectedImage.remove();
	}

	// добавляем кнопку в photoContent
	photoContent.appendChild(imgDiv);
	photoContent.style.display = "block";

	var addContainer = document.querySelector("#add-container");
	addContainer.style.display = "none";

}

// нужно делать когда не нужен переход на новую страницу (перерисовка документа)
// var addProductForm = document.querySelector("#add-product-form");
// if (addProductForm) { 
// 	addProductForm.onsubmit = function(event) {
// 		event.preventDefault();
// 	}
// }


function saveProduct(id) {
	// если приходит id  - значит товар есть уже

	var addProductForm = document.querySelector("#add-product-form");
	var shopId = addProductForm.querySelector("#shop-id");
	var price = addProductForm.querySelector("input[name='price']");
	var quantity = addProductForm.querySelector("input[name='quantity']");

	if (!id) {
		// товара в базе нет, создаем новый


		var name = addProductForm.querySelector("input[name='name']");
		var categoryId = addProductForm.querySelector("select[name='category_id']");
		var measureId = addProductForm.querySelector("select[name='measure_id']");
		var pictureId = addProductForm.querySelector("#picture-id");



		var sendData =
			"&name=" + name.value +
			"&category_id=" + categoryId.value +
			"&measure_id=" + measureId.value +
			"&picture_id=" + pictureId.value +
			"&shop_id=" + shopId.value +
			"&price=" + price.value +
			"&quantity=" + quantity.value;
		// проверка все ли поля введены - лучше сделать здесь

		console.log(sendData);
		var ajax = new XMLHttpRequest();
		ajax.open("POST", webSiteUrl + 'modules/save-product.php', false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(sendData);

		data = JSON.parse(ajax.response);
		// { status : true , id : "id продукта в БД", info_message : "Информация успешно сохранена" }  - если создали новый и записали запись о цене
		// { status : false , id : "id продукта в БД", info_message : "Такой продукт существует" }  - если такой продукт в базе уже есть
		// { status : false, info_message : "Не заполнены необходимые поля" } - не все поля введены
	} else {
		var sendData =
			"&id=" + id +
			"&shop_id=" + shopId.value +
			"&price=" + price.value +
			"&quantity=" + quantity.value;
		// проверка все ли поля введены - лучше сделать здесь

		console.log(sendData);
		var ajax = new XMLHttpRequest();
		ajax.open("POST", webSiteUrl + 'modules/save-new-price.php', false);
		ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		ajax.send(sendData);

		data = JSON.parse(ajax.response);

	}

	if (data.status && !id) {
		// вариант добавления нового товара
		// очистка всех значений формы
		name.value = '';
		categoryId.value = 0;
		measureId.value = 0;
		pictureId.value = 0;
		// удаление блока с картинкой
		imageItem = document.querySelector("#selected-image");
		if (imageItem) {
			imageItem.remove();
		}
		imageItem.remove();

		chosenShop = document.querySelector("#chosenShop");
		chosenAddress = document.querySelector("#chosenAddress");

		chosenShop.value = "";
		chosenAddress.value = "";

		shopId.value = 0;
		price.value = '';
		quantity.value = '';
	} else {
		showInfoMessage(data.info_message);
		if (data.status) {
			setTimeout(() => {
				document.location.href = webSiteUrl;
			}, 3000);

		}
	}

	// вывод информационного сообщения
	showInfoMessage(data.info_message);


}

//******Иван******//

// вывести список магазов
function btnShowShops() {

	var url = webSiteUrl + "modules/shops-list.php";
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, false);
	ajax.send();


	// включение блока выбора магазина
	var addContainer = document.querySelector("#add-container");
	addContainer.innerHTML = ajax.response;
	addContainer.style.display = "block";

	smoothScroll('shop-list', 2000);

}

//при выборе магазина в списке
function btnSelectShop(btn) {

	var chosenShop = document.querySelector("#chosenShop");
	chosenShop.innerText = btn.dataset.name; /* сделать на текст вместо инпута */
	chosenShop.style.display = "block";

	var chosenAddres = document.querySelector("#chosenAddress");
	chosenAddres.innerText = btn.dataset.address; /* сделать на текст вместо инпута */
	chosenAddress.style.display = "block";

	var shopId = document.querySelector("#shop-id");
	// задаем значение id магазина для дальнешей записи товара
	shopId.value = btn.dataset.id;

	// var shopList = document.querySelector("#shopList");
	// 	shopList.style.display = "none";

	// выключение блока выбора магазина
	var addContainer = document.querySelector("#add-container");
	addContainer.style.display = "none";

}

//открыть форму добавления магазина
function btnOpnFormAddShop() {

	var addForm = document.querySelector("#add-form");
	addForm.style.display = "block";
}

//добавить новый магазин
function btnAddNewShop() {
	var newShopName = document.querySelector("#newShopName");
	var newShopAddress = document.querySelector("#newShopAddress");

	var url = webSiteUrl + "modules/add-shop-form.php?" +
		"name=" + newShopName.value +
		"&address=" + newShopAddress.value;
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, false);
	ajax.send();

	// здесь нужно сделать Инфо блок о удачном добавлении магазина
	// скрыть форму выбрать магазин 
	data = JSON.parse(ajax.response);

	var chosenShop = document.querySelector("#chosenShop");
	chosenShop.innerText = dataset.name; /* сделать на текст вместо инпута */
	chosenShop.style.display = "block";

	var chosenAddres = document.querySelector("#chosenAddress");
	chosenAddres.innerText = dataset.address; /* сделать на текст вместо инпута */
	chosenAddress.style.display = "block";

	var shopId = document.querySelector("#shop-id");
	// задаем значение id магазина для дальнешей записи товара
	shopId.value = data.id;

	// выключение блока выбора магазинаы
	var addContainer = document.querySelector("#add-container");
	addContainer.style.display = "none";

	// вывод информационного сообщения
	showInfoMessage(data.info_message);

}





// ***** функция вывода информационного сообщения

function showInfoMessage(dataInfoMessage) {

	// вывод информационного сообщения
	var infoContainer = document.querySelector("#info-container");
	infoContainer.style.transition = "all 1s";
	infoContainer.style.opacity = "0";
	infoContainer.innerHTML = "<h3>" + dataInfoMessage + "</h3>";
	infoContainer.style.display = "block";

	// включаем проявление через 100мс
	setTimeout(function () {
		infoContainer.style.opacity = "1";
	}, 100);

	// ждем 1с пока проявится и через 3 секунды убираем
	setTimeout(function () {
		infoContainer.style.opacity = "0";
		setTimeout(function () {
			infoContainer.style.display = "none";
		}, 1000);
	}, 3000);

}


function btnShowMoreOnClick() {
	var currentPageInput = document.querySelector("#current-page");
	var url = webSiteUrl + "modules/get_more.php?page=" + currentPageInput.value;
	console.log(url);
	var ajax = new XMLHttpRequest();
	ajax.open("GET", url, false);
	ajax.send();

	currentPageInput.value = +currentPageInput.value + 1;

	if (ajax.response == "") {
		btnShowMore.style.display = "none";
	}

	var productsBlock = document.querySelector("#cards");
	productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;
	/*BtnClickAddToBasket()*/ /*это тоже относится к первому варианту*/
}