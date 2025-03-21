<?php
/* Smarty version 4.3.4, created on 2025-01-16 19:10:34
  from 'C:\xampp\htdocs\aplikacja1\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67894b9abddc04_63147471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69902a65aa55dfb6a4f2ff65a780a98c53834d40' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacja1\\app\\views\\templates\\main.tpl',
      1 => 1737050865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67894b9abddc04_63147471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150956403567894b9a673078_37110460', "title");
?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css"> 
</head>
<body>
    <!-- Menu -->
   <header>
        <nav class="navbar">
            <!-- Nazwa firmy -->
            <div class="logo">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home"><span class="ride">Ride</span><span class="flow">FLOW</span></a></li>
            </div>


            <!-- Centralne menu -->
            <ul class="center-menu">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
home">Home</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
#about">O nas</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
#services">Usługi</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
#contact">Kontakt</a></li>
            </ul>

            <!-- Menu użytkownika (rozwijane) -->
           <ul class="user-menu">
    <?php if ((isset($_smarty_tpl->tpl_vars['user_logged_in']->value)) && $_smarty_tpl->tpl_vars['user_logged_in']->value) {?>
        <li class="user-menu">
            <a href="#"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</a>
            <ul class="dropdown">
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
profile">Profil</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehicles">Zgłoś pojazd</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
vehiclesList">Mój pojazd</a></li>
                <?php if ((isset($_smarty_tpl->tpl_vars['user_is_admin']->value)) && $_smarty_tpl->tpl_vars['user_is_admin']->value) {?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel">Panel Administratora</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
roles">Dodaj role</a></li>
                <?php }?>
                <?php if ((isset($_smarty_tpl->tpl_vars['user_is_office_worker']->value)) && $_smarty_tpl->tpl_vars['user_is_office_worker']->value) {?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
officePanel">Panel Biurowy</a></li>
                <?php }?>
                <?php if ((isset($_smarty_tpl->tpl_vars['user_is_workshop_worker']->value)) && $_smarty_tpl->tpl_vars['user_is_workshop_worker']->value) {?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
workshopPanel">Panel Warsztatowy</a></li>
                <?php }?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj się</a></li>
            </ul>
        </li>
        <?php } else { ?>
            <li class="login"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj się</a></li>
         <?php }?>
        </ul>
      </nav>
    </header>

    <!-- Dynamiczna struktura  -->
    <main class="content">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105631007667894b9aa7e300_07465258', "content");
?>

    </main>

    <!-- Błędy i komunikaty -->
    <section class="notifications">
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <div class="notification-box 
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>notification-info<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>notification-warning<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>notification-error<?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    </section>

    <!-- Footer (stopka) -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 RideFlow. Wszystkie prawa zastrzeżone.</p>
        </div>
    </footer>
    
    <!-- JS, obsługuje rozwijane menu w panelu użytkownika -->
    <?php echo '<script'; ?>
>
        document.addEventListener("DOMContentLoaded", function () {
            const userMenuToggle = document.querySelector(".user-menu > a");
            const dropdown = document.querySelector(".user-menu .dropdown");

            if (userMenuToggle) {
                userMenuToggle.addEventListener("mouseover", function () {
                    dropdown.classList.add("show");
                });

                userMenuToggle.addEventListener("mouseout", function () {
                    dropdown.classList.remove("show");
                });

                document.addEventListener("click", function (e) {
                    if (!userMenuToggle.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.remove("show");
                    }
                });
            }
        });
    <?php echo '</script'; ?>
>
</body>
</html>
<?php }
/* {block "title"} */
class Block_150956403567894b9a673078_37110460 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_150956403567894b9a673078_37110460',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
RideFlow<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_105631007667894b9aa7e300_07465258 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_105631007667894b9aa7e300_07465258',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
