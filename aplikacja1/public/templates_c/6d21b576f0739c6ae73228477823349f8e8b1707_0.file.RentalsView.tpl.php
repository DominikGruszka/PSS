<?php
/* Smarty version 4.3.4, created on 2025-01-10 17:43:53
  from 'C:\xampp\htdocs\aplikacja1\app\views\RentalsView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67814e499e15d6_07726645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d21b576f0739c6ae73228477823349f8e8b1707' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\RentalsView.tpl',
      1 => 1736527431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67814e499e15d6_07726645 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_133022862367814e499ba4d5_37026908', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4737156367814e499cdd55_41605059', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_133022862367814e499ba4d5_37026908 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_133022862367814e499ba4d5_37026908',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Samochody do Wynajęcia - RideFlow<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_4737156367814e499cdd55_41605059 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4737156367814e499cdd55_41605059',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <section class="rental-cars">
    <div class="container">
        <h1>Samochody do wynajęcia</h1>
        <div class="cars">
            <!-- Pierwszy samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="camaro.jpg" alt="Chevrolet Camaro">
                </div>
                <div class="content10">
                    <h2>Chevrolet Camaro</h2>
                    <p>Rok produkcji 2022<br>Silnik 5.0l V8<br>5 miejsc<br>śr. spalanie 16 l.<br>cena od 500zł/dzień</p>
                </div>
            </div>
            
            <!-- Drugi samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="audi.jpg" alt="Audi 8A">
                </div>
                <div class="content10">
                    <h2>Audi A8</h2>
                    <p>Rok produkcji 2018<br>Silnik 4.0l V8<br>5 miejsc<br>śr. spalanie 8 l.<br>cena od 400zł/dzień</p>
                </div>
            </div>
            
            <!-- Trzeci samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="skoda.jpg" alt="Skoda Octavia">
                </div>
                <div class="content10">
                    <h2>Skoda Octavia</h2>
                    <p>Rok produkcji 2020<br>5 miejsc<br>śr. spalanie 7 l.<br>cena od 250zł/dzień</p>
                </div>
            </div>
            
            <!-- Czwarty samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="Toyota.jpg" alt="Toyota Land Cruiser">
                </div>
                <div class="content10">
                    <h2>Toyota Land Cruiser</h2>
                    <p>Rok produkcji 2021<br>7 miejsc<br>śr. spalanie 10 l.<br>cena od 450zł/dzień</p>
                </div>
            </div>
            
            <!-- Piąty samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="opel.jpg" alt="Opel Vivaro">
                </div>
                <div class="content10">
                    <h2>Opel Vivaro</h2>
                    <p>Rok produkcji 2017<br>3 miejsc<br>śr. spalanie 9 l.<br>cena od 300zł/dzień</p>
                </div>
            </div>
            
            <!-- Szósty samochód -->
            <div class="card">
                <div class="image-box">
                    <img src="renault.jpg" alt="Renault Traffic">
                </div>
                <div class="content10">
                    <h2>Renault Traffic</h2>
                    <p>Rok produkcji 2020<br>9 miejsc<br>śr. spalanie 10 l.<br>cena od 350zł/dzień</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
}
}
/* {/block "content"} */
}
