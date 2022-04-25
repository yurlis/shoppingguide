
// var!!! webSiteUrl = "http://shopping-guide.local/";

// функция обработки нажатия на кнопку выгрузить
// $('#upload-btn').on('click', 

function onClickUploadBtn() {
    // если файл не выбран - ничего не делаем
    if ( !$('#picture').prop('files')[0] ) {
      return;
    }
    var file_data = $('#picture').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);
    // alert(form_data);
    $.ajax({
                url: webSiteUrl + 'modules/upload/upload.php',
                dataType: 'text',
                cache: false,
                contentType: false,           
                processData: false,
                data: form_data,
                type: 'post',
                success: function( php_script_response ) {
                  data = JSON.parse( php_script_response ); //  { file : "имя файла который загружен" }
                  var image = '<div id="selected-image" class="img-item"><img src="' + webSiteUrl + 'images/upload/' + data.file + '" width="200"></div>';
                  var photoContent = $("#photo-content"); // для вывода картинки в форму
                 
                  photoContent.html(''); // лоадер был там
                  photoContent.append(image);

                  // сохранение в базе данных
                  var url = webSiteUrl + 'modules/upload/save-picture.php?name=' + data.file;

                  var ajax = new XMLHttpRequest();
                    ajax.open("GET", url , false);
                    ajax.send();
                  data = JSON.parse(ajax.response); // { status : true , id : "id файла в БД" , name : "Имя файла в БД"}

                  if ( data.status ) {

                    // спрятать что-то и показать статус сохранения
                    // вывести инфу что добавлено
                    var infoContainer = document.querySelector("#info-container");
                    var pictureContainer = document.querySelector("#photo-content");

                    infoContainer.style.transition = "all 1s";
                    infoContainer.style.opacity = "0";
                    infoContainer.innerHTML = "<h3>Изображение удачно сохранено</h3>";
                    infoContainer.style.display = "block";

                    // 
                    setTimeout(function() {  
                        infoContainer.style.opacity = "1";
                    }, 100);

                     
                    // через 3 секунды убираем
                    setTimeout(function() {   
                        infoContainer.style.opacity = "0";
                        setTimeout(function() {   
                          infoContainer.style.display = "none";
                          pictureContainer.style.display = "block"; 
                        }, 1000);
                    }, 3000);

                    // // refresh списка фото после добавления
                    // var listImagesContainer = document.querySelector("#list-images-container");
                    // var url = webSiteUrl + 'modules/show-list-images.php';
                    // var ajax = new XMLHttpRequest();
                    //   ajax.open("GET", url , false);
                    //   ajax.send();
                    // listImagesContainer.innerHTML = ajax.response;

                    var pictureId = document.querySelector("#picture-id");
                    // задаем значение id картинки для дальнейщей записи товара
                    pictureId.value = data.id;
                    console.log( pictureId.value ); 


                    // выключаем блок выбора картинки
                    var addContainer = document.querySelector("#add-container");
                    addContainer.style.display = "none";

                    // скроллинг в начало документа/формы
                    scrollTo(0, 0);

                  }

                }
     }); /* ajax */
}

// скроллинг к началу блока картинок
function btnToStart() {
    smoothScroll( 'add-container', 1000 );
}


// кнопка закрыть блок выбора картинок, если пользователь передумал выбирать картинку
function btnToForm() {
    // выключение блока выбора магазинаы
    var addContainer = document.querySelector("#add-container");
        addContainer.style.display = "none";

    // smoothScroll('add-container');
}

// поиск картинок по условию, что они используются для товаров имеющих входжение шаблона поиска
function btnSearchPicture() {
    var searchPictureName = document.querySelector("#search-picture-name");
    searchPattern = searchPictureName.value;

    // if ( searchPattern == '' ) {
    //   return;
    // }

    var form_data = new FormData();
    form_data.append( 'search_pattern', searchPattern );
    // alert(form_data);
    $.ajax({
                url: webSiteUrl + 'modules/show-list-images.php',
                dataType: 'text',
                cache: false,
                contentType: false,           
                processData: false,
                data: form_data,
                type: 'post',
                success: function( php_script_response ) {
                  var listImagesContainer = document.querySelector("#list-images-container");
                  listImagesContainer.innerHTML = php_script_response;
                }
    }); /* ajax */





}
