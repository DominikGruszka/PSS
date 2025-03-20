<?php
/* Smarty version 4.3.4, created on 2025-01-16 20:20:27
  from 'C:\xampp\htdocs\aplikacja1\app\views\HelloView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67895bfbc5eda3_63754505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3aa9ad24ac608442a211d811041706f47c5179d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\HelloView.tpl',
      1 => 1737051004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67895bfbc5eda3_63754505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_99394833167895bfbc37ca2_18543532', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_129233564067895bfbc4b526_56164964', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_99394833167895bfbc37ca2_18543532 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_99394833167895bfbc37ca2_18543532',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Strona główna<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_129233564067895bfbc4b526_56164964 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_129233564067895bfbc4b526_56164964',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <!-- Pierwsza sekcja - HOME -->
    <section id="home" class="hero">
        <div class="container">
            <h1>Witamy w naszym serwisie samochodowym</h1>
                <p>Zadbaj o swoje auto z pomocą najlepszych specjalistów w branży.</p>
            <?php if ((isset($_smarty_tpl->tpl_vars['user_logged_in']->value)) && $_smarty_tpl->tpl_vars['user_logged_in']->value) {?>
                <p>Witaj, <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
! Cieszymy się, że jesteś z nami.</p>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
services" class="btn-primary">Sprawdź Usługi</a>
        </div>
    </section>

    <!-- Druga sekcja - O NAS -->
    <section id="about" class="about">
        <div class="container">
            <h2>O nas</h2>
            <p>Jesteśmy zespołem profesjonalistów z wieloletnim doświadczeniem w naprawie i serwisie samochodów. Naszym celem jest zapewnienie najwyższej jakości usług.</p>
        </div>
    </section>
    
    <!-- Trzecia sekcja - USŁUGI -->
    <section id="services" class="services">
        <div class="container">
            <h2>Nasze Usługi</h2>
            <div class="grid">
                
                <div class="service-item">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehicles" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-oil-can"></i>
                    <h3>Naprawy mechaniczne</h3>
                        <p>Zgłoś swój samochód do warsztatu.</p>
                    </a>
                </div>

                <div class="service-item">
                    <i class="fas fa-tools"></i>
                    <h3>Naprawy blacharskie</h3>
                        <p>Profesjonalne usługi blacharsko-lakiernicze.</p>
                </div>

                <div class="service-item">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
rentals" style="text-decoration: none; color: inherit;">
                        <i class="fas fa-car-crash"></i>
                    <h3>Wynajem samochodu</h3>
                        <p>Oferujemy krótki oraz długi wynajem samochodów.</p>
                    </a>
                </div>

            </div>
        </div>
    </section>
                        
    <!-- Czwarta sekcja - KONTAKT -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Kontakt</h2>
                <h3>Adres</h3>
                    <p>Chorzów ul. Powstańców 123</p>
        </div>
    </section>
<?php
}
}
/* {/block "content"} */
}
