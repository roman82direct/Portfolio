<?phprequire_once $_SERVER['DOCUMENT_ROOT'] .'/config/DB.php';//require_once '../controllers/C_Catalog.php';//        $show = new C_Catalog();//        $show->showNext();//$data = db::getRow('SELECT * FROM `goods` order by `id_good` LIMIT 1');$minId = $data['id_good'];// Узнаем наименьший Id в БДif (isset($_GET['next'])) {    if ($_GET['next'] > $minId) {        $req = "SELECT * FROM `goods` WHERE `id_good`>" . $_GET['next'] . " order by `id_good` LIMIT 4";        $goods = db::getRows($req, []);        foreach ($goods as $val){            if ($_GET['user']) {                echo                    "<div class='galitem'>" .                    "<img src=" . "public/catalogImg/" . $val['catalogImg'] . ">" .                    "<div class='overlay' id=over_".$val['id_good']."></div>".                    "<h3>" . $val['name'] . "</h3>" .                    "<p class='itemId'>" . $val['id_good'] . "</p>" .                    "<p class='itemprice'>" . $val['price'] . "$" . "</p>" .                    "<form class='itemForm' action='index.php?act=buy&c=catalog' method='post'>" .                        "<input type='hidden' name='add' value='" . $val['id_good'] . "'>" .                        "<input type='submit' value='В корзину' class='btn btn-primary'>" .                    "</form>" .                        "<div class='modalGood' style='display: none' id='modalGood_".$val['id_good'] ."'>".                            "<div class='modalGood_content' id='modalGoodContent_".$val['id_good'] . "'>".                                "<span class='close_modal_order' id='closeModalGood_".$val['id_good'] . "'>X</span><br>".                                "<h4 class='orderTitle'>Наименование: ". $val['name']."</h4>".                                "<h4 class='orderTitle'>Цена: ". $val['price']."$</h4>".                                "<div class='modalInfo'>".                                    "<img src='public/catalogImg/" . $val['catalogImg'] ."'>".                                    "<p>".$val['discription'] ."</p>".                                "</div>".                                "<div class='yesNo'>".                                    "<span class='ok' id='ok_".$val['id_good'] . "'>OK</span>".//                                    "<span class='cancel' id='cancel".$val['id_good'] ."'>ОТМЕНА</span>".                                "</div>".                            "</div>".                        "</div>".                    "</div>";            } else {                echo                    "<div class='galitem'>" .                    "<img src=" . "public/catalogImg/" . $val['catalogImg'] . ">" .                    "<div class='overlay' id=over_".$val['id_good']."></div>".                    "<h3>" . $val['name'] . "</h3>" .                    "<p class='itemId'>" . $val['id_good'] . "</p>" .                    "<p class='itemprice'>" . $val['price'] . "$" . "</p>" .                    "<div class='modalGood' style='display: none' id='modalGood_".$val['id_good'] ."'>".                        "<div class='modalGood_content' id='modalGoodContent_".$val['id_good'] . "'>".                            "<span class='close_modal_order' id='closeModalGood_".$val['id_good'] . "'>X</span><br>".                                "<h4 class='orderTitle'>Наименование: ". $val['name']."</h4>".                                "<h4 class='orderTitle'>Цена: ". $val['price']."$</h4>".                                "<div class='modalInfo'>".                                    "<img src='public/catalogImg/" . $val['catalogImg'] ."'>".                                    "<p>".$val['discription'] ."</p>".                                "</div>".                                "<div class='yesNo'>".                                    "<span class='ok' id='ok_".$val['id_good'] . "'>OK</span>".//                              "<span class='cancel' id='cancel".$val['id_good'] ."'>ОТМЕНА</span>".                                "</div>".                             "</div>".                        "</div>".                    "</div>";            }        }    } return false;} else echo "ID не передан";