<?php
/* Smarty version 4.3.4, created on 2025-01-05 16:22:16
  from 'C:\xampp\htdocs\aplikacja1\app\views\VehiclesView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_677aa3a8e84708_05794868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e89fb16c5a1e53aa80478e1f1f2e2c6fc5b6e95f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\VehiclesView.tpl',
      1 => 1736089328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_677aa3a8e84708_05794868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1885940189677aa3a8e5d604_59290407', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1328434214677aa3a8e70e83_95930661', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1885940189677aa3a8e5d604_59290407 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1885940189677aa3a8e5d604_59290407',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Dodaj Pojazd<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1328434214677aa3a8e70e83_95930661 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1328434214677aa3a8e70e83_95930661',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="vehicle" class="vehicle-section">
        <div class="container2">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehicles" method="post" class="pure-form pure-form-aligned">
            <h4>Dodaj swój pojazd</h4>
            
            <fieldset>
                <div class="pure-control-group">
                    <label for="id_brand">Marka pojazdu:</label>
                        <input id="id_brand" type="text" name="brand" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->brand, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_model">Model pojazdu:</label>
                        <input id="id_model" type="text" name="model" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->model, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_production_year">Rok produkcji:</label>
                        <input id="id_production_year" type="number" name="production_year" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->production_year, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-control-group">
                    <label for="id_vin">Numer VIN:</label>
                        <input id="id_vin" type="text" name="vin" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['form']->value->vin, ENT_QUOTES, 'UTF-8', true);?>
">
                </div>
                
                <div class="pure-controls">
                    <button type="submit" class="pure-button pure-button-primary">Zapisz pojazd</button>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehiclesList" class="pure-button pure-button-secondary">Lista zarejestrowanych pojazdów</a>
                </div>
            </fieldset>
        </form>
        </div>
    </section>
<?php
}
}
/* {/block "content"} */
}
