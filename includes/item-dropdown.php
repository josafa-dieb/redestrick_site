<div class="content">
<div id="close-dropdown" onclick="closeDropdown()">X</div>
<?php 
require '../admin/model/itemdao.php';
require '../admin/model/conexao.php';
use \itemdao\ItemDAO;
$itens = new ItemDAO();
$itens = $itens->read();
$itemId = $_GET['id'];
foreach ($itens as $valor) {
    if($valor['id'] == $itemId){
        echo $valor['descricao'];
    break;
    }
}
?>
</div>